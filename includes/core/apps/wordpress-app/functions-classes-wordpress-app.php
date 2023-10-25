<?php
/**
 * This file contains functions that spin up classes that manages post types for the WordPress app.
 *
 * @package wpcd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', 'wpcd_init_site_package', -10, 1 );
/**
 * Create a class var for WPCD_POSTS_Site_Package and
 * add it to the WPCD array of classes for management
 */
function wpcd_init_site_package() {
	if ( function_exists( 'WPCD' ) && class_exists( 'WPCD_WooCommerce_Init' ) ) {
		if ( empty( WPCD()->classes['WPCD_SITE_PACKAGE'] ) ) {
			WPCD()->classes['WPCD_SITE_PACKAGE'] = new WPCD_POSTS_Site_Package();
		}
	}
}

function WPCD_SITE_PACKAGE() {
	return WPCD()->classes['WPCD_SITE_PACKAGE'];
}

add_action( 'init', 'wpcd_init_app_update_plan', -10, 1 );
/**
 * Create a class var for WPCD_POSTS_App_Update_Plan and
 * add it to the WPCD array of classes for management
 *
 * Note that this is contingent on the WPCD_WooCommerce add-on being available.
 */
function wpcd_init_app_update_plan() {
	if ( function_exists( 'WPCD' ) && class_exists( 'WPCD_WooCommerce_Init' ) ) {
		if ( empty( WPCD()->classes['WPCD_APP_UPDATE_PLAN'] ) ) {
			WPCD()->classes['WPCD_APP_UPDATE_PLAN'] = new WPCD_POSTS_App_Update_Plan();
		}
	}

	if ( function_exists( 'WPCD' ) && class_exists( 'WPCD_WooCommerce_Init' ) ) {
		if ( empty( WPCD()->classes['WPCD_SITE_UPDATE_PLAN_LOG'] ) ) {
			WPCD()->classes['WPCD_SITE_UPDATE_PLAN_LOG'] = new WPCD_SITE_UPDATE_PLAN_LOG();
		}
	}
}

function WPCD_APP_UPDATE_PLAN() {
	return WPCD()->classes['WPCD_APP_UPDATE_PLAN'];
}

function WPCD_SITE_UPDATE_PLAN_LOG() {
	return WPCD()->classes['WPCD_SITE_UPDATE_PLAN_LOG'];
}
