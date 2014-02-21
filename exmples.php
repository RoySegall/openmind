<?php

/**
 * @file
 * This file contain example on how to use the components of the OpenMind theme.
 *
 * Good luck.
 */

/**
 * Navigation with tabs.
 */
function examples_nav() {

  $variables = array(
    'tabs' => array(
      'profile' => t('Profile'),
      'likes' => t('Likes'),
      'followers' => t('Followers'),
    ),
    'content' => array(
      'profile' => 'This it the profile',
      'likes' => 'This it the likes',
      'followers' => 'This it the followers',
    ),
  );

  theme('openmind_navs', $variables);
}

/**
 * Panels.
 */
function example_panels() {

  // Basic panel.
  $variables = array(
    'state' => 'basic',
    'content' => t('Basic panel'),
  );

  // With heading without title.
  $variables = array(
    'state' => 'with_heading',
    'content' => t('Basic panel'),
    'heading' => t('Basic'),
  );

  // With heading with title.
  $variables = array(
    'state' => 'with_heading',
    'content' => t('Basic panel'),
    'heading' => t('Basic'),
    'title' => TRUE,
  );

  // Footer.
  $variables = array(
    'state' => 'footer',
    'content' => t('Basic panel'),
    'footer' => t('Footer'),
  );

  // Heading and footer.
  $variables = array(
    'state' => 'footer_and_header',
    'heading' => t('Heading'),
    'content' => t('Basic panel'),
    'footer' => t('Footer'),
  );

  // Heading as title and footer.
  $variables = array(
    'state' => 'footer_and_header',
    'heading' => t('Heading'),
    'content' => t('Basic panel'),
    'footer' => t('Footer'),
  );

  // You can also user status for different colors. Available colors:
  // primary, success, info, warning, danger.
  $variables['status'] = 'info';

  $output = theme('openmind_panels', $variables);

  theme('openmind_panels', $variables);
}

/**
 * Collapse.
 */
function example_collapse() {
  $variables = array(
    'id' => 'collapse_example',
    'elements' => array(
      'first' => array(
        'title' => 'First collapse',
        'content' => 'This is the first collapse.',
      ),
      'second' => array(
        'title' => 'Second collapse',
        'content' => 'This is the second collapse.',
      ),
      'third' => array(
        'title' => 'Third collapse',
        'content' => 'This is the third collapse.',
      ),
    ),
  );

  theme('openmind_collapse', $variables);
}

/**
 * Item lists.
 */
function example_lists() {
  // Simple item lists.
  $variables = array(
    'items' => array(
      'foo',
      'bar'
    ),
  );

  // With badge.
  $variables = array(
    'items' => array(
      array('data' => 'foo', 'badge' => 22),
      array('data' => 'bar', 'badge' => 40),
    ),
  );

  theme('openmind_lists', $variables);
}

/**
 * Wells.
 */
function example_wells() {

  // Regular size.
  $variables = array(
    'content' => 'foo',
  );

  // Large well.
  $variables = array(
    'content' => 'foo',
    'size' => 'large',
  );

  // Small well.
  $variables = array(
    'content' => 'foo',
    'size' => 'small',
  );

  theme('openmind_wells', $variables);
}

/**
 * Alerts.
 */
function example_alerts() {
  // Allowed types: success, info, warning, danger.
  $variables = array(
    'title' => 'Cheers',
    'content' => 'Look at me!',
    'type' => 'success',
  );

  theme('openmind_alerts', $variables);
}

/**
 * Progress bar.
 */
function example_progress_bar() {
  // Normal.
  $variables = array(
    'value' => 20,
  );

  // With size. Allowed sizes: large, small, very small
  $variables = array(
    'value' => 20,
    'size' => 'small',
  );

  // Striped bar. Please notice that when the striped is on the size will be set
  // to default.
  $variables = array(
    'value' => 90,
    'size' => 'small',
    'striped' => TRUE,
  );

  // With colors. Allowed values: success, info, warning, danger.
  $variables = array(
    'value' => 90,
    'size' => 'small',
    'striped' => TRUE,
    'status' => 'success',
  );

  theme('openmind_progress_bar', $variables);
}

/**
 * Feature box.
 */
function example_feature_box() {
  // The icon will be the name of the icon from Font awesome without the 'fa-'.
  // Look at http://fortawesome.github.io/Font-Awesome/icons/
  $variables = array(
    'icon' => 'shopping-cart',
    'title' => 'bar',
    'content' => 'fooo',
    'text' => t('Read more'),
    'url' => url('user/1'),
  );

  theme('openmind_feature_box', $variables);
}

/**
 * Content box.
 */
function example_content_box() {
  // Status allowed values: success, info, warning, danger.
  $variables = array(
    'icon' => 'shopping-cart',
    'title' => 'Title',
    'content' => 'Text',
    'status' => 'success',
  );

  theme('openmind_content_box', $variables);
}

/**
 * Icon box.
 */
function example_icon_box() {
  // Status allowed values: inverse, success, info, warning, danger.
  $variables = array(
    'icon' => 'cloud-download',
    'title' => 'Title',
    'content' => 'Text',
    'mode' => 'inverse',
  );

  theme('openmind_icon_box', $variables);
}