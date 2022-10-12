<?php
/*
Plugin Name: EIG-SSO
Version: 1.0.3
Description: Securely log in to WordPress from Control Panel without needing a username and password.
Author: Endurance International Group
Author URI: http://endurance.com/
License: GPL2
*/

function eigsso_activate() {
    global $wpdb;

    $table = $wpdb->prefix . 'eig_sso';

    $q = "CREATE TABLE $table (
      offer VARCHAR(255) DEFAULT '' NOT NULL,
      expires int(11) DEFAULT 0 NOT NULL,
      UNIQUE KEY offer (offer)
    );";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $q );
}
register_activation_hook( __FILE__, 'eigsso_activate' );

function eigsso_deactivate() {
    eigsso_clear_offers();
}
register_deactivation_hook( __FILE__, 'eigsso_deactivate' );

function eigsso_detect_trigger() {
    if ( ! isset( $_GET['eigsso_nonce'] ) || ! isset( $_GET['eigsso_salt'] ) ) {
        return;
    }

    $nonce = $_GET['eigsso_nonce'];
    $salt = $_GET['eigsso_salt'];

    if ( eigsso_check_offer( $nonce, $salt ) ) {
        eigsso_accept_offer();
    }

    /* if the mysql user doesn't have privileges eigsso_accept_offer will not
       redirect and drop into this case. */
    wp_safe_redirect( wp_login_url() );
    exit;
}
add_action( 'init', 'eigsso_detect_trigger' );

function eigsso_check_offer($nonce, $salt) {
    if ( empty( $nonce ) || empty( $salt ) ) {
        eigsso_set_failed_attempts( eigsso_get_failed_attempts() + 1 );
        return false;
    }

    if ( eigsso_locked_out() ) {
        return false;
    }

    global $wpdb;

    $hash = base64_encode( hash( 'sha256', $nonce . $salt, true ) );

    $table = $wpdb->prefix . 'eig_sso';

    /* wp doesn't support SELECT 1, but 1=1 is an alias to TRUE */
    $res = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT 1=1 FROM $table
                WHERE offer = %s AND expires >= UNIX_TIMESTAMP()",
            $hash
        )
    );

    if ( null !== $res ) {
        return true;
    }

    eigsso_set_failed_attempts( eigsso_get_failed_attempts() + 1 );
    return false;
}

function eigsso_accept_offer() {
    if ( true === eigsso_clear_offers() ) {
        if ( is_user_logged_in() ) {
            wp_logout();
        }

        $args = array(
            'role'   => 'administrator',
            'fields' => 'all',
            'number' => 1, /* LIMIT 1 */
        );
        $admins = get_users( $args );

        if ( empty( $admins ) ) {
            return false;
        }

        $admin = $admins[0];

        wp_set_current_user( $admin->ID, $admin->user_login );
        wp_set_auth_cookie( $admin->ID );
        do_action( 'wp_login', $admin->user_login, $admin );
        
        wp_safe_redirect( admin_url() );
        exit;
    }

    return false;
}

function eigsso_clear_offers() {
    global $wpdb;

    $table = $wpdb->prefix . 'eig_sso';
    $res = $wpdb->query( "DELETE FROM $table WHERE expires < UNIX_TIMESTAMP()" );

    return false !== $res;
}

function eigsso_uninstall() {
    global $wpdb;

    $table = $wpdb->prefix . 'eig_sso';

    $wpdb->query( "DROP TABLE $table" );
}
register_uninstall_hook( __FILE__, 'eigsso_uninstall' );

function eigsso_user_identifier($prefix) {
    if ( null === $prefix ) {
        $prefix = '';
    }

    return 'eigsso_' . $prefix . '_' . $_SERVER['REMOTE_ADDR'];
}

function eigsso_get_failed_attempts() {
    $id = eigsso_user_identifier( 'failed_attempts' );

    $attempts_n = get_transient( $id, 0 );

    return $attempts_n;
}

function eigsso_set_failed_attempts($attempts_n) {
    if ( ! is_int($attempts_n) ) {
        return false;
    }

    $id = eigsso_user_identifier( 'failed_attempts' );

    return set_transient( $id, $attempts_n, 60 * 60 * 3 );
}

function eigsso_locked_out() {
    return 5 <= eigsso_get_failed_attempts();
}

/*
eig-sso.php - Defines SSO offer functionality and hooks into WordPress events.
Copyright (C) 2014 Endurance International Group

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
?>
