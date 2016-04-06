<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="wraps">
      <div class="title">
        <h1>
          <?php _e('Contact us', genieWIZARDS_THEME_FOLDER); ?>
        </h1>
      </div>
      <div class="resp-wrapper">
        <ul id="error_list">
        </ul>
        <form name="contact_form" action="<?php echo osc_base_url(true); ?>" method="post" >
          <input type="hidden" name="page" value="contact" />
          <input type="hidden" name="action" value="contact_post" />
          <div class="form-group">
            <label class="control-label" for="yourName">
              <?php _e('Your name', genieWIZARDS_THEME_FOLDER); ?>
              (
              <?php _e('optional', genieWIZARDS_THEME_FOLDER); ?>
              )</label>
            <div class="controls">
              <?php ContactForm::your_name(); ?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="yourEmail">
              <?php _e('Your email address', genieWIZARDS_THEME_FOLDER); ?>
            </label>
            <div class="controls">
              <?php ContactForm::your_email(); ?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="subject">
              <?php _e('Subject', genieWIZARDS_THEME_FOLDER); ?>
              (
              <?php _e('optional', genieWIZARDS_THEME_FOLDER); ?>
              )</label>
            <div class="controls">
              <?php ContactForm::the_subject(); ?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="message">
              <?php _e('Message', genieWIZARDS_THEME_FOLDER); ?>
            </label>
            <div class="controls textarea">
              <?php ContactForm::your_message(); ?>
            </div>
          </div>
		   <?php if( osc_recaptcha_items_enabled() ) { ?>
		  <div class="form-group">
            <div class="recap">
			<?php osc_show_recaptcha(); ?>
			</div>
		 </div>
		   <?php } ?>
          <div class="form-group">
            <div class="controls">
              <?php osc_run_hook('contact_form'); ?>
              
              <button type="submit" class="btn btn-success">
              <?php _e("Send", genieWIZARDS_THEME_FOLDER);?>
              </button>
              <?php osc_run_hook('admin_contact_form'); ?>
            </div>
          </div>
        </form>
        <?php ContactForm::js_validation(); ?>
      </div>
    </div>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>
