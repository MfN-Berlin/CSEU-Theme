<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * CSEU Theme theme.
 */

function cseu_theme_views_pre_render(&$view) {
  if ($view->name == 'cseu_wgs_list_view' || $view->name == 'cseu_wg_resources_list' || $view->name == 'cseu_wg_events_list') {
    if ($view->current_display == 'members_page' || $view->current_display == 'wg_page'
        || $view->current_display == 'resources_page' || $view->current_display == 'events_page') {
      if (!empty($view->result[0]->node_title) && !empty($view->result[0]->field_field_cseu_long_label)) {
        $view_title = $view->result[0]->field_field_cseu_long_label[0]['raw']['value'] . ' - ' . $view->result[0]->node_title;
        $view->build_info['title'] = $view_title;
      }
    }
  }
}

/**
 * Open PDF file in new window
 * See: https://www.drupal.org/node/301234
 */
function cseu_theme_file_link($variables) {
  $file = $variables['file'];
  $icon_directory = drupal_get_path('theme', 'cseu_theme') . '/images/icons';
  $url = file_create_url($file->uri);
  $file_size = format_size($file->filesize);
  $icon = theme('file_icon', array('file' => $file, 'icon_directory' => $icon_directory));

  // Set options as per anchor format described at
  // http://microformats.org/wiki/file-format-examples
  $options = array(
    'attributes' => array(
      'type' => $file->filemime . '; length=' . $file->filesize,
    ),
  );

  // Use the description as the link text if available.
  if (empty($file->description)) {
    $link_text = $file->filename;
  }
  else {
    $link_text = $file->description;
    $options['attributes']['title'] = check_plain($file->filename);
  }

  // Open files of particular mime types in new window
  $new_window_mimetypes = array('application/pdf','text/plain');
  if (in_array($file->filemime, $new_window_mimetypes)) {
    $options['attributes']['target'] = '_blank';
  }

  // File size
  $link_text .= '<br />'. $file_size;
  $options['html'] = TRUE;

    return '<div class="file"><div class="cseu-file-icon">' . $icon . '</div>'.
            '<div class="cseu-file-document"><div class="cseu-file-link">' . l($link_text, $url, $options) .'</div>'.
            '</div>';
}
