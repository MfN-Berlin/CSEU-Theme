<?php

/**
 * Implements hook_preprocess_node().
 */
function cseu_theme_preprocess_node(&$variables) {
  // You can use preprocess hooks to modify the variables before they are passed
  // to the theme function or template file.

  // Change string Submitted
  $date = format_date($variables['created'] , 'cseu_date_type_event_long');
  $variables['submitted'] = t('Created on')  .' '. $date;
}
