<?php
    osc_add_hook('header','geniewizards_nofollow_construct');

    osc_enqueue_script('jquery-validate');
    geniewizards_add_body_class('user user-change_email');
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }
    osc_add_filter('meta_title_filter','custom_meta_title');
    function custom_meta_title($data){
        return osc_esc_html(__('Change e-mail', genieWIZARDS_THEME_FOLDER));
    }
    osc_current_web_theme_path('header.php') ;
    $osc_user = osc_user();
?>

<div class="row">
  <?php
	        osc_current_web_theme_path('user-sidebar.php');

   ?>
  <div class="col-sm-8 col-md-9">
    <div class="title">
      <h1>
        <?php _e('Change e-mail', genieWIZARDS_THEME_FOLDER); ?>
      </h1>
    </div>
    <div class="dashboard_form">
      <ul id="error_list">
      </ul>
      <form id="change-email" action="<?php echo osc_base_url(true); ?>" method="post">
        <input type="hidden" name="page" value="user" />
        <input type="hidden" name="action" value="change_email_post" />
        <div class="form-group">
          <h3>
            <?php _e('Current e-mail', genieWIZARDS_THEME_FOLDER); ?>
          </h3>
          <div class="controls"> <?php echo osc_logged_user_email(); ?> </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="new_email">
            <?php _e('New e-mail', genieWIZARDS_THEME_FOLDER); ?>
            *</label>
          <div class="controls">
            <input type="text" name="new_email" id="new_email" value="" />
          </div>
        </div>
        <div class="form-group">
          <div class="controls">
            <button type="submit" class="btn btn-success">
            <?php _e("Update", genieWIZARDS_THEME_FOLDER);?>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('form#change-email').validate({
            rules: {
                new_email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                new_email: {
                    required: '<?php echo osc_esc_js(__("Email: this field is required", genieWIZARDS_THEME_FOLDER)); ?>.',
                    email: '<?php echo osc_esc_js(__("Invalid email address", genieWIZARDS_THEME_FOLDER)); ?>.'
                }
            },
            errorLabelContainer: "#error_list",
            wrapper: "li",
            invalidHandler: function(form, validator) {
                $('html,body').animate({ scrollTop: $('h1').offset().top }, { duration: 250, easing: 'swing'});
            },
            submitHandler: function(form){
                $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                form.submit();
            }
        });
    });
</script>
<?php osc_current_web_theme_path('footer.php') ; ?>
