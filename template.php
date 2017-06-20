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