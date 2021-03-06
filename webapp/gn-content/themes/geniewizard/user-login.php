<?php
    osc_add_hook('header','geniewizards_nofollow_construct');

    geniewizards_add_body_class('login');
	
    osc_current_web_theme_path('header.php');
?>

<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="wraps">
      <div class="title">
        <h1>
          <?php _e('Please Login', genieWIZARDS_THEME_FOLDER); ?>
        </h1>
      </div>
      <form action="<?php echo osc_base_url(true); ?>" method="post" >
        <input type="hidden" name="page" value="login" />
        <input type="hidden" name="action" value="login_post" />
        <div class="form-group">
          <label class="control-label" for="email">
            <?php _e('E-mail', genieWIZARDS_THEME_FOLDER); ?> <sup>*</sup>
          </label>
          <div class="controls">
            <?php UserForm::email_login_text(); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="password">
            <?php _e('Password', genieWIZARDS_THEME_FOLDER); ?> <sup>*</sup>
          </label>
          <div class="controls">
            <?php UserForm::password_login_text(); ?>
          </div>
        </div>
        <div class="form-group">
          <div class="controls checkbox">
            <?php UserForm::rememberme_login_checkbox();?>
            <label for="remember">
              <?php _e('Remember me', genieWIZARDS_THEME_FOLDER); ?>
            </label>
          </div>
        </div>
        <div class="form-group">
          <div class="controls">
            <button type="submit" class="btn btn-success">
            <?php _e("Log in", genieWIZARDS_THEME_FOLDER);?>
            </button>
<?php mdh_facebook_button_login(); // Facebook login button ?>
          </div>
        </div>
     
        <div class="actions"> <a href="<?php echo osc_register_account_url(); ?>">
          <?php _e("Register for a free account", genieWIZARDS_THEME_FOLDER); ?>
          </a><br />
          <a href="<?php echo osc_recover_user_password_url(); ?>">
          <?php _e("Forgot password?", genieWIZARDS_THEME_FOLDER); ?>
          </a> </div>
      </form>
     
      </div>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>
	