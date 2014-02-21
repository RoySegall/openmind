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