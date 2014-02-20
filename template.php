<?php
/**
 * @file
 * template.php
 */

/**
 * Implements hook_theme().
 */
function bootstrap_openmind_theme() {
  return array(
    'bootstrap_openmind_user_login' => array(
      'render element' => 'form',
      'function' => 'theme_bootstrap_openmind_user_login',
    ),
  );
}

/**
 * Implements theme_breadcrumb().
 */
function bootstrap_openmind_breadcrumb($variables) {
  $output = '';
  $breadcrumb = $variables['breadcrumb'];

  // Determine if we are to display the breadcrumb.
  $bootstrap_breadcrumb = theme_get_setting('bootstrap_breadcrumb');
  if (($bootstrap_breadcrumb == 1 || ($bootstrap_breadcrumb == 2 && arg(0) == 'admin')) && !empty($breadcrumb)) {
    $output = theme('item_list', array(
      'attributes' => array(
        'class' => array('breadcrumb', 'hidden-xs'),
      ),
      'items' => $breadcrumb,
      'type' => 'ol',
    ));
  }

  return $output;
}

/**
 * Implements hook_form_FORM_ID_alter().
 */
function bootstrap_openmind_form_user_login_alter(&$form, $form_state) {
  $form['#after_build'] = array('bootsrap_openmind_user_login');

}

/**
 * After build handler; Return custom form with the open mind theme for the user
 * login page.
 */
function bootsrap_openmind_user_login($form, $form_state) {

  // The form wrapper.
  $form['#prefix'] = '<div class="center-block logig-form">';
  $form['#prefix'] .= '<div class="panel panel-default">';
  $form['#prefix'] .= '<div class="panel-heading">Login Form</div>';
  $form['#prefix'] .= '<div class="panel-body">';
  $form['#suffix'] = '</div></div></div></div>';

  // User element.
  $form['name']['#prefix'] = '<div class="input-group login-input">';
  $form['name']['#prefix'] .= '<span class="input-group-addon"><i class="fa fa-user"></i></span>';
  $form['name']['#suffix'] = '</div>';
  $form['name']['#title'] = '';
  $form['name']['#attributes'] = array(
    'class' => array('form-control'),
    'placeholder' => array(t('Username')),
  );

  // Password element.
  $form['pass']['#prefix'] = '<div class="input-group login-input">';
  $form['pass']['#prefix'] .= '<span class="input-group-addon"><i class="fa fa-lock"></i></span>';
  $form['pass']['#suffix'] = '</div>';
  $form['pass']['#title'] = '';
  $form['pass']['#attributes'] = array(
    'class' => array('form-control'),
    'placeholder' => array(t('Password')),
  );

  // Submit element.
  $form['actions']['submit']['#attributes'] = array('class' => array('btn','btn-primary','pull-right'));
  $form['actions']['submit']['#suffix'] = implode('', array(
    '<a href="#" class="social-icon soc-twitter animated fadeInDown animation-delay-2"><i class="fa fa-twitter"></i></a>',
    '<a href="#" class="social-icon soc-google-plus animated fadeInDown animation-delay-3"><i class="fa fa-google-plus"></i></a>',
    '<a href="#" class="social-icon soc-facebook animated fadeInDown animation-delay-4"><i class="fa fa-facebook"></i></a>',
    '<hr>',
  ));

  // Adding links for register and recover password.
  $form['recover'] = array(
    '#type' => 'item',
    '#markup' => l(t('Create account'), 'user/register', array('attributes' => array('class' => array('btn','btn-success','pull-right')))),
    '#weight' => 200,
  );

  $form['password'] = array(
    '#type' => 'item',
    '#markup' => l(t('Recover password'), 'user/password', array('attributes' => array('class' => array('btn','btn-warning')))),
    '#weight' => 201,
  );

  return $form;
}

/**
 * Implements theme_menu_local_task().
 */
function bootstrap_openmind_menu_local_task(&$variables)  {
  $link = $variables['element']['#link'];

  // Skipped on path we don't want to grant access via tabs.
  if (in_array($link['href'], array('user', 'user/register', 'user/password'))) {
    return;
  }

  $link_text = $link['title'];

  if (!empty($variables['element']['#active'])) {
    // Add text to indicate active tab for non-visual users.
    $active = '<span class="element-invisible">' . t('(active tab)') . '</span>';

    // If the link does not contain HTML already, check_plain() it now.
    // After we set 'html'=TRUE the link will not be sanitized by l().
    if (empty($link['localized_options']['html'])) {
      $link['title'] = check_plain($link['title']);
    }
    $link['localized_options']['html'] = TRUE;
    $link_text = t('!local-task-title!active', array('!local-task-title' => $link['title'], '!active' => $active));
  }

  return '<li' . (!empty($variables['element']['#active']) ? ' class="active"' : '') . '>' . l($link_text, $link['href'], $link['localized_options']) . "</li>\n";
}