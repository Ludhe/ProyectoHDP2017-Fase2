<?php

/**
 * @file
 * Druppio Monopage theme settings file.
 */

use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function druppio_monopage_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {

  // 0. Vertical tabs.
  $form['druppiomonopage'] = array(
    '#type' => 'vertical_tabs',
    '#title' => 'Druppio Monopage Settings',
  );

  // 1. Style settings tab.
  $form['druppiomonopagestyle'] = array(
    '#type' => 'details',
    '#title' => t('Style'),
    '#description' => '<strong>' . t('Custom CSS Settings') . '</strong>',
    '#group' => 'druppiomonopage',
  );

  $form['druppiomonopagestyle']['druppio_monopage_custom_css_enable'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable custom CSS'),
    '#description' => t('Enable this option if you want to add custom CSS without
    modifying theme. When you enable it, a new text area will appear below, where
    you can enter CSS. Entire content of text area will be saved in the following file: "/sites/default/files/druppio-monopage-custom.css"
    after you click on the "Save configuration" button. If you disable this option you will
    not loose any of your existing custom CSS, but it will not be applied to pages.'),
    '#default_value' => theme_get_setting('druppio_monopage_custom_css_enable'),
    '#group' => 'druppiomonopagestyle',
  );

  // Load custom CSS from file.
  if (file_exists('public://druppio-monopage-custom.css')) {
    $custom_css = file_get_contents('public://druppio-monopage-custom.css');
  }
  else {
    $custom_css = '';
  }

  $form['druppiomonopagestyle']['druppio_monopage_custom_css'] = array(
    '#type' => 'textarea',
    '#title' => t('Custom CSS'),
    '#rows' => 10,
    '#resizable' => TRUE,
    '#default_value' => $custom_css,
    '#description' => t('Enter you custom CSS here or navigate to "/sites/default/files/druppio-monopage-custom.css" and edit the file directly.
    Note: remember not to change the file name.'),
    '#states' => array(
      "visible" => array(
        "input[name='druppio_monopage_custom_css_enable']" => array("checked" => TRUE),
      ),
    ),
    '#group' => 'druppiomonopagestyle',
  );

  $form['#validate'][] = 'druppio_monopage_form_system_theme_settings_submit';

}

/**
 * Save custom CSS to file on form submit.
 */
function druppio_monopage_form_system_theme_settings_submit(&$form, FormStateInterface $form_state) {

  $css = $form_state->getValue('druppio_monopage_custom_css');
  file_put_contents('public://druppio-monopage-custom.css', $css);

}
