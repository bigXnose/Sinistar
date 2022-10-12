<?php

if ( function_exists( 'add_action' ) ) {
	add_action( 'after_setup_theme', 'eig_module_spam_prevention_register' );
}

/**
 * Register the spam prevention module
 */
function eig_module_spam_prevention_register() {
	eig_register_module( array(
		'name'     => 'spam-prevention',
		'label'    => __( 'Spam Prevention', 'endurance' ),
		'callback' => 'eig_module_spam_prevention_load',
		'isActive' => true,
	) );
}

/**
 * Load the spam prevention module
 */
function eig_module_spam_prevention_load() {
	require dirname( __FILE__ ) . '/spam-prevention.php';
}
