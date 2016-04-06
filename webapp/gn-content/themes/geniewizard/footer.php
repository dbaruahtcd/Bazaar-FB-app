<?php osc_run_hook('after-main'); ?>
</div>
<?php osc_show_widgets('footer');?>

<footer id="footer">
  <div class="container">
    <div class="footer">
      <?php ?>
      <?php if ( osc_count_web_enabled_locales() > 1) { ?>
      <?php osc_goto_first_locale(); ?>
      <strong>
      <?php _e('Language:', genieWIZARDS_THEME_FOLDER); ?>
      </strong>
      <ul>
        <?php $i = 0;  ?>
        <?php while ( osc_has_web_enabled_locales() ) { ?>
        <li><a id="<?php echo osc_locale_code(); ?>" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>"><?php echo osc_locale_name(); ?></a></li>
        <?php if( $i == 0 ) { echo ""; } ?>
        <?php $i++; ?>
        <?php } ?>
      </ul>
      <?php } ?>
      <ul>
        <?php if( osc_users_enabled() ) { ?>
        <?php if( osc_is_web_user_logged_in() ) { ?>
        <li> <?php echo sprintf(__('Hi %s', genieWIZARDS_THEME_FOLDER), osc_logged_user_name() . '!'); ?> &#10072; <strong><a href="<?php echo osc_user_dashboard_url(); ?>">
          <?php _e('My account', genieWIZARDS_THEME_FOLDER); ?>
          </a></strong> <a href="<?php echo osc_user_logout_url(); ?>">
          <?php _e('Logout', genieWIZARDS_THEME_FOLDER); ?>
          </a> </li>
        <?php } else { ?>
        <li> <a href="<?php echo osc_user_login_url(); ?>">
          <?php _e('Login', genieWIZARDS_THEME_FOLDER); ?>
          </a></li>
        <?php if(osc_user_registration_enabled()) { ?>
        <li> <a href="<?php echo osc_register_account_url(); ?>">
          <?php _e('Register for a free account', genieWIZARDS_THEME_FOLDER); ?>
          </a> </li>
        <?php } ?>
        <?php } ?>
        <?php } ?>
        <?php
        osc_reset_static_pages();
        while( osc_has_static_pages() ) { ?>
        <li> <a href="<?php echo osc_static_page_url(); ?>"><?php echo osc_static_page_title(); ?></a> </li>
        <?php
        }
        ?>
        <li> <a href="<?php echo osc_contact_url(); ?>">
          <?php _e('Contact', genieWIZARDS_THEME_FOLDER); ?>
          </a> </li>
        <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
        <li class="publish"> <a href="<?php echo osc_item_post_url_in_category(); ?>">
          <?php _e("Publish your ad for free", genieWIZARDS_THEME_FOLDER);?>
          </a> </li>
        <?php } ?>
      </ul>
      <?php
            echo '<div class="copyright">' . sprintf(__(' &copy 2016 Bazaar.  All rights reserved',genieWIZARDS_THEME_FOLDER), 'http://www.geniewizards.com/') . '</div>';
        ?>
    </div>
  </div>
</footer>
<?php osc_run_hook('footer'); ?>
<?php if(osc_is_ad_page() || osc_is_search_page()){ ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=498033263566934&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php } ?>
</body></html>