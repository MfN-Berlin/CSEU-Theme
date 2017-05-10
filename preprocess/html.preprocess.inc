<?php

/**
 * @file
 * Contains a pre-process hook for 'html'.
 */

/**
 * Implements hook_preprocess_html().
 */
function cseu_theme_preprocess_html(&$variables, $hook) {
  // Return early, so the maintenance page does not call any of the code below.
  if ($hook != 'html') {
    return;
  }

  // Text
  drupal_add_css('https://fonts.google.com/specimen/Source+Sans+Pro', array('type' => 'external', 'group' => CSS_THEME));
  // Headlines
  drupal_add_css('https://fonts.google.com/specimen/Roboto+Slab', array('type' => 'external', 'group' => CSS_THEME));
}
