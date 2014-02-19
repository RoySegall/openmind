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
//  $form['#prefix'] = '<div class="center-block logig-form"><div class="panel panel-default">';
//  $form['#prefix'] .= '<div class="panel-heading">' . t('Login Form') . '</div>';
//  $form['#prefix'] .= '<div class="panel-body">';
//  $form['#suffix'] = '</div></div></div>';

  $form['#after_build'] = array('bootsrap_openmind_user_login');
}

/**
 * After build handler; Return custom form with the open mind theme for the user
 * login page.
 */
function bootsrap_openmind_user_login() {
  return drupal_get_form('bootstrap_openmind_user_login');
}

function bootstrap_openmind_user_login($form, $form_state) {
  $form['#theme'] = 'bootstrap_openmind_user_login';

  $form['foo'] = array(
    '#type' => 'textfield',
    '#title' => 'sssfo',
  );
  return $form;
}

/**
 * Theme callback; Theme the user login form.
 */
function theme_bootstrap_openmind_user_login($variables) {

  // todo: Make it work!
  $form = $variables['form'];

  $foo = render($form['foo']);

  $output = '
  <div class="center-block logig-form">
                <div class="panel panel-default">
                    <div class="panel-heading">Login Form</div>
                    <div class="panel-body">
                        <form role="form">
                            <div class="form-group">
                                <div class="input-group login-input">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                                <br>
                                <div class="input-group login-input">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Login</button>
                                <a href="#" class="social-icon soc-twitter animated fadeInDown animation-delay-2"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="social-icon soc-google-plus animated fadeInDown animation-delay-3"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="social-icon soc-facebook animated fadeInDown animation-delay-4"><i class="fa fa-facebook"></i></a>
                                <hr>
                                <a href="#" class="btn btn-success pull-right">Create Account</a>
                                <a href="#" class="btn btn-warning">Password Recovery</a>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';
  return $output;
}