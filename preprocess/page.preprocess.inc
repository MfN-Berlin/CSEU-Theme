<?php

/**
 * Implements hook_preprocess_page().
 */
function cseu_theme_preprocess_page(&$variables) {
  $arg = arg();

  /**
   * Page: users/<usename>
   * Set page title to "Firstname Lastname"
   */
  if ($arg[0] == 'user' && !empty($arg[1])) {
    $uid = intval($arg[1]);
    if ($uid > 1) {
      $title = '';
      $profile = profile2_load_by_user($uid, 'cseu_profile_personal');
      if (!empty($profile->field_cseu_title)) {
        $title .= $profile->field_cseu_title[LANGUAGE_NONE][0]['value'] . ' ';
      }
      if (!empty($profile->field_cseu_first_name)) {
        $title .= $profile->field_cseu_first_name[LANGUAGE_NONE][0]['value'];
      }
      if (!empty($profile->field_cseu_last_name)) {
        $title .= ' '. $profile->field_cseu_last_name[LANGUAGE_NONE][0]['value'];
      }
      if (!empty($title)) {
        drupal_set_title($title);
      }
    }
  }//Page: users/<usename>

}
