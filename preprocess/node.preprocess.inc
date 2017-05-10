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

  // Content type " cseu_event"
  // Find url of referencing webform
  if($variables['type'] == 'cseu_event' && $variables['page']) {
    $variables['cseu_event_register_form'] = array();
    $nid = $variables['nid'];
    $entity_id = db_query("SELECT entity_id FROM {field_data_field_event}
        WHERE field_event_target_id = :nid AND bundle = 'webform' AND deleted = 0",
        array(':nid' => $nid))->fetchField();
    if (!empty($entity_id)) {
      $node_title = node_load($entity_id)->title;
      $node_alias = drupal_get_path_alias('node/'. $entity_id);
      if (!empty($node_title) && !empty($node_alias)) {
        $variables['cseu_event_register_form']['title'] =  $node_title;
        $variables['cseu_event_register_form']['alias'] =  $node_alias;
      }
    }
  } // if(cseu_event)

}
