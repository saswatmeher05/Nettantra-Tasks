<?php
/*
Plugin Name: Expense Manager
Plugin URI: https:/www.expensemanager.com
Description: A simple plugin that keeps track of monthly expenses 
Version: 1.0.0
Author: Nettantra User
Liscence: GPL2 
*/

//creating database on plugin activation
global $jal_db_version;
$jal_db_version = '1.0';
function jal_install() {
    global $wpdb;
    global $jal_db_version;
    $table_name = $wpdb->prefix . 'expense_manager';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
    id    INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    item        VARCHAR(30)   NOT NULL DEFAULT '',
    quantity     INT UNSIGNED  NOT NULL DEFAULT 0,
    price        DECIMAL(7,2)  NOT NULL DEFAULT 99999.99,
    date         DATE,
    PRIMARY KEY  (id)
 ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    add_option( 'jal_db_version', $jal_db_version );
}
register_activation_hook( __FILE__, 'jal_install' );

//adding menu item

add_action('admin_menu', 'at_try_menu');
function at_try_menu() {
    //adding plugin in menu
    //Expense Manager list
    add_menu_page('expense_manager', //page title
        'Expense_Manager', //menu title
        'manage_options', //capabilities
        'Expense_Manager', //menu slug
        'expense_manager' //function
    );
    //adding submenu to a menu
    //Add Expense
    add_submenu_page('Expense_Manager',//parent page slug
        'add_expense',//page title
        'Add Expense',//menu title
        'manage_options',//manage optios
        'Add_Expense',//slug
        'add_expense'//function
    );
    //Update Expense 
    add_submenu_page( null,//parent page slug
        'update_expense',//$page_title
        'Update Expense',// $menu_title
        'manage_options',// $capability
        'Update_Expense',// $menu_slug,
        'update_expense'// $function
    );
    //Delete Expense
    add_submenu_page( null,//parent page slug
        'delete_expense',//$page_title
        'Delete Expense',// $menu_title
        'manage_options',// $capability
        'Delete_Expense',// $menu_slug,
        'delete_expense'// $function
    );
}

// returns the root directory path of particular plugin
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'expense_manager.php');
require_once (ROOTDIR.'add_expense.php');
require_once (ROOTDIR.'update_expense.php');
require_once (ROOTDIR.'delete_expense.php');
?>