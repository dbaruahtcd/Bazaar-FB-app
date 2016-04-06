<?php
    osc_add_hook('header','geniewizards_nofollow_construct');

    geniewizards_add_body_class('user user-items');
	
	
    //osc_add_hook('before-main','sidebar');
	
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }
	
	
    osc_current_web_theme_path('header.php') ;
	
	if(geniewizards_show_as() == 'gallery'){
        $loop_template	=	'loop-user-grid.php';
		$listClass = 'listing-grid';
        $buttonClass = 'active';
    }else{
		$loop_template	=	'loop-user-list.php';
		$listClass = '';
		$buttonClass = '';
	}

	?>

<div class="row">
  <?php
	        osc_current_web_theme_path('user-sidebar.php');

   ?>
  <div class="col-sm-8 col-md-9">
    <div class="list-header">
      <?php osc_run_hook('search_ads_listing_top'); ?>
      <h1 class="title">
        <?php _e('My listings', genieWIZARDS_THEME_FOLDER); ?>
      </h1>
      <?php if(osc_count_items() == 0) { ?>
      <p class="empty" >
        <?php _e('No listings have been added yet', genieWIZARDS_THEME_FOLDER); ?>
      </p>
      <?php } else { ?>
    </div>
    <?php
        View::newInstance()->_exportVariableToView("listClass",$listClass);
        View::newInstance()->_exportVariableToView("listAdmin", true);
        osc_current_web_theme_path($loop_template);
    ?>
    <?php
    if(osc_rewrite_enabled()){
        $footerLinks = osc_search_footer_links();
    ?>
    <ul class="footer-links">
      <?php foreach($footerLinks as $f) { View::newInstance()->_exportVariableToView('footer_link', $f); ?>
      <?php if($f['total'] < 3) continue; ?>
      <li><a href="<?php echo osc_footer_link_url(); ?>"><?php echo osc_footer_link_title(); ?></a></li>
      <?php } ?>
    </ul>
    <?php } ?>
    <div class="pagination"> <?php echo osc_pagination_items(); ?> </div>
    <?php } ?>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>
