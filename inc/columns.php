<?php

/**
 * Columns
 *
 * @package Bootscore 
 * @version 5.3.3
 */


// Exit if accessed directly
defined( 'ABSPATH' ) || exit;


/**
 * Make main content col dynamic if sidebar widgets exists
 * @return string
 */
if (!function_exists('bootscore_main_col_class')) {
  function bootscore_main_col_class() {
    if (!is_active_sidebar('sidebar-1')) {
      // Sidebar is empty
      return "col";
    } else {
      // Sidebar has widgets
      return "col-lg-9";
    }
  }
}


/**
 * Sidebar column width and breakpoints
 * @return string
 */
if (!function_exists('bootscore_sidebar_col_class')) {
  function bootscore_sidebar_col_class() {
    return "col-lg-3";
  }
}


/**
 * Sidebar responsive offcanvas toggler
 * @return string
 */
if (!function_exists('bootscore_sidebar_toggler_class')) {
  function bootscore_sidebar_toggler_class() {
    return "d-md-none btn btn-outline-primary w-100 mb-4 d-flex justify-content-between align-items-center";
  }
}


/**
 * Sidebar responsive offcanvas breakpoint and placement
 * @return string
 */
if (!function_exists('bootscore_sidebar_offcanvas_class')) {
  function bootscore_sidebar_offcanvas_class() {
    return "offcanvas-md offcanvas-end";
  }
}
