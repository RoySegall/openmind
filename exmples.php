<?php

/**
 * @file
 * This file contain example on how to use the components of the OpenMind theme.
 *
 * Good luck.
 */

/**
 * Navigation with tabs.
 *
 * The function will return the navigation component.
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
 *
 * Example on how to use the panels component.
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

  $output = theme('openmind_panels', $variables);

  theme('openmind_panels', $variables);
}