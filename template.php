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
    'openmind_navs' => array(
      'variables' => array(
        'tabs' => array(),
        'content' => array(),
      ),
      'template' => 'openmind-navs',
      'path' => drupal_get_path('theme', 'bootstrap_openmind') . '/templates',
    ),

    'openmind_panels' => array(
      'variables' => array(
        'state' => '',
        'content' => '',
        'title' => '',
      ),
      'function' => 'theme_openmind_panels',
    ),

    'openmind_collapse' => array(
      'variables' => array(
        'id' => '',
        'elements' => array(),
      ),
      'template' => 'openmind-collapse',
      'path' => drupal_get_path('theme', 'bootstrap_openmind') . '/templates',
    ),

    'openmind_lists' => array(
      'variables' => array(
        'style' => '',
        'items' => array(),
      ),
      'function' => 'theme_openmind_lists',
    ),

    'openmind_wells' => array(
      'variables' => array(
        'content' => '',
        'size' => '',
      ),
      'function' => 'theme_openmind_wells',
    ),

    'openmind_alerts' => array(
      'function' => 'theme_openmind_alerts',
    ),

    'openmind_progress_bar' => array(
      'function' => 'theme_openmind_progress_bar',
    ),

    'openmind_feature_box' => array(
      'function' => 'theme_openmind_feature_box',
    ),

    'openmind_content_box' => array(
      'function' => 'theme_openmind_content_box',
    ),

    'openmind_caption' => array(
      'variables' => array(),
      'template' => '',
      'path' => drupal_get_path('theme', 'bootstrap_openmind') . '/templates',
    ),

    'openmind_lightbox' => array(
      'variables' => array(),
      'template' => '',
      'path' => drupal_get_path('theme', 'bootstrap_openmind') . '/templates',
    ),

    'openmind_slide_images' => array(
      'variables' => array(),
      'template' => '',
      'path' => drupal_get_path('theme', 'bootstrap_openmind') . '/templates',
    ),
  );
}

/**
 * Using the panels component.
 */
function theme_openmind_panels($variables) {
  $state = $variables['state'];
  $status = !empty($variables['status']) ? $variables['status'] : 'primary';
  $output = '<div class="panel panel-' . $status . '">';

  if ($state == 'basic') {
    $output .= '
      <div class="panel-body">
        ' . $variables['content'] . '
      </div>
    ';
  }
  else if ($state == 'with_heading') {
    $title = !empty($variables['title']) ? '<h3 class="panel-title">' . $variables['heading'] . '</h3>' : $variables['heading'];
    $output .= '
      <div class="panel-heading">' . $title . '</div>
      <div class="panel-body">
        ' . $variables['content'] . '
      </div>
    ';
  }
  else if ($state == 'footer') {
    $output .= '
        <div class="panel-body">
          ' . $variables['content'] . '
        </div>
        <div class="panel-footer">' . $variables['footer'] . '</div>
    ';
  }
  else if ($state == 'footer_and_header') {
    $title = !empty($variables['title']) ? '<h3 class="panel-title">' . $variables['heading'] . '</h3>' : $variables['heading'];
    $output .= '
      <div class="panel-heading">' . $title . '</div>
      <div class="panel-body">
        ' . $variables['content'] . '
      </div>
      <div class="panel-footer">' . $variables['footer'] . '</div>
    ';
  }

  $output .= '</div>';

  return $output;
}

/**
 * Constructing OpenMind lists.
 */
function theme_openmind_lists($variable) {
  $items = array();

  foreach ($variable['items'] as $item) {

    if (is_array($item)) {
      $markup = '';

      if (!empty($item['badge'])) {
        $markup .= '<span class="badge">' . $item['badge'] . '</span>';
      }

      $markup .= $item['data'];
    }
    else {
      $markup = $item;
    }

    $items[] = array(
      'data' => $markup,
      'class' => array('list-group-item'),
    );
  }

  $data = array(
    'attributes' => array('class' => 'list-group'),
    'items' => $items,
  );

  return theme('item_list', $data);
}

/**
 * OpenMind wells.
 */
function theme_openmind_wells($variables) {
  $size = '';

  if (!empty($variables['size'])) {
    $size = $variables['size'] == 'large' ? 'well-lg' : 'well-sm';
  }

  return '
    <div class="well ' . $size . '">
       ' . $variables['content'] . '
    </div>
  ';
}

/**
 * OpenMedia alerts.
 */
function theme_openmind_alerts($variables) {
  return '
    <div class="alert alert-' . $variables['type'] . '">
        <strong>' . $variables['title'] . '</strong> ' . $variables['content'] . '.
    </div>
  ';
}

/**
 * OpenMind progress bar.
 */
function theme_openmind_progress_bar($variables) {
  $variables['content'] = empty($variables['content']) ? t('@number% Complete', array('@number' => $variables['value'])) : $variables['content'];
  $variables['size'] = empty($variables['size']) ? 'default' : $variables['size'];
  $variables['status'] = empty($variables['status']) ? '' : 'progress-bar-' . $variables['status'];

  $sizes = array(
    'default' => '',
    'small' => 'progress-sm',
    'very small' => 'progress-xs',
    'large' => 'progress-lg',
  );

  if (!empty($variables['striped'])) {
    $variables['size'] = 'default';
    $striped = 'progress-striped active';
  }
  else {
    $striped = '';
  }

  return '
    <div class="progress ' . $sizes[$variables['size']] . ' ' . $striped . '">
      <div class="progress-bar ' . $variables['status'] . '" role="progressbar" aria-valuenow="' . $variables['value'] . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $variables['value'] . '%;">
          <span class="sr-only">' . $variables['content'] . '</span>
      </div>
  </div>
  ';
}

/**
 * OpenMind feature box.
 */
function theme_openmind_feature_box($variables) {
  return '
    <div class="mind-features-item hover">
      <div class="item-icon"><i class="fa fa-' . $variables['icon'] . '"></i></div>
      <div class="item-content">
        <h3>' . $variables['title'] . '</h3>
        <p>' . $variables['content'] . '</p>
        <a href="' . $variables['url'] . '" class="btn btn-success pull-right">' . $variables['text'] . '</a>
      </div>
    </div>
  ';
}

/**
 * OpenMind content box.
 */
function theme_openmind_content_box($variables) {
  $status = empty($variables['status']) ? 'primary' : $variables['status'];

  return '
    <div class="mind-box mind-box-' . $status . '">
      <h4 class="mind-box-title clearfix">' . $variables['title'] . '</h4>
      <i class="fa fa-' . $variables['icon'] . '"></i>
      <p>' . $variables['content'] . '</p>
    </div>
  ';
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
  $form['create'] = array(
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
 * Implements hook_form_FORM_ID_alter().
 */
function bootstrap_openmind_form_user_register_form_alter(&$form, $form_state) {
  $form['#after_build'] = array('bootsrap_openmind_user_register');
}

/**
 * After build handler; Adding HTML styling tags for the form elements.
 */
function bootsrap_openmind_user_register($form, $form_state) {
  $login_form = drupal_get_form('user_login');

  // Remove the register button, we already in the register form.
  unset($login_form['create']);

  // The form wrapper.
  $form['#prefix'] = '<div class="col-md-7">';
  $form['#prefix'] .= '<h2 class="section-title">'. t('Create Account') . '</h2>';
  $form['#prefix'] .= '<div class="panel panel-primary animated fadeInDown">';
  $form['#prefix'] .= '<div class="panel-heading">'. t('Register Form') . '</div>';
  $form['#prefix'] .= '<div class="panel-body">';

  $form['#suffix'] = '</div></div></div>';
  $form['#suffix'] .= '<div class="col-lg-4 col-lg-offset-1 col-md-5">';
  $form['#suffix'] .= '<h2 class="section-title">'. t('Are you registered?') .'</h2>';
  $form['#suffix'] .= '<div class="panel panel-success animated fadeInDown animation-delay-2">';
  $form['#suffix'] .= render($login_form);
  $form['#suffix'] .= '</div></div>';

  // Work on the email element.
  $form['account']['mail']['#description'] = '';

  // Align the password elements.
  $form['account']['pass']['pass1']['#prefix'] = '<div class="row"><div class="col-md-6">';
  $form['account']['pass']['pass1']['#suffix'] = '</div>';

  $form['account']['pass']['pass2']['#prefix'] = '<div class="col-md-6">';
  $form['account']['pass']['pass2']['#suffix'] = '</div></div>';

  // Remove the JS validation process.
  $form['account']['pass']['#attached']['js'] = array();

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