=== EIG-SSO ===
Contributors: bcorey, eig
Tags: sso, single sign-on
Requires at least: 3.3
Tested up to: 5.6
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows customers of Endurance International Group to sign on to WordPress through the vDeck Control Panel.

== Description ==

EIG-SSO is a single sign on plugin that allows customers of Endurance International Group brands (FatCow, iPage, IPOWER, and others) to sign on to their WordPress installations without needing to remember an additional username and password.

When installed and activated, this plugin will detect single sign on (SSO) attempts when requested by an authenticated user. On the Control Panel side, the user need only click on the "Launch WordPress" button or 'Manage Site' link to be signed in to their WordPress installation.

== Installation ==

1. Upload `eig-sso.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently asked questions ==

= How do I configure single sign-on (SSO)? =

This plugin creates and drops its database table on install and uninstall, respectively. As it relies on data created by the vDeck Control Panel, no user configuration is necessary. If you wish to disable SSO functionality, you may deactivate the plugin. Standard sign on with username and password will still be available regardless of the state of the plugin.

= Who can use this plugin? =

Customers of the WP Starter and WP Essential plans can use this plugin to sign into their WordPress installations hosted with Endurance brands.

= How does this work? =

When a user signs into the vDeck Control Panel and requests to sign into WordPress, a nonce (number used once) and salt are generated and saved in the WordPress database as a secure hash. The user is redirected to their WordPress site with the nonce and salt. After the plugin verifies the credentials, the user is signed in.

= I'm having problems signing in. =

As a security precaution, each SSO attempt has a timeout of 20 seconds. If you are on a slow or spotty connection you may exceed this limit.

As an additional security measure, the plugin will refuse to authenticate users who have sent more than 5 failed attempts in three hours. You can still log in with a username and password normally or wait until this time expires.

== Screenshots ==

1. To log in to your WordPress installation, find the Launch WordPress button or 'Manage Site' link...

2. ...and you'll be logged in without needing another username and password.

== Changelog ==

1.0.3 - Fix for too few argument issue

1.0.2 - Fix timing issues.

1.0.1 - Fix uninstall bug.

1.0 - Initial release.

== Upgrade notice ==

Initial release.
