<?php
    osc_add_hook('header','geniewizards_follow_construct');
	
    if(geniewizards_show_as() == 'gallery'){
        $loop_template	=	'loop-user-public-grid.php';
    }else{
		$loop_template	=	'loop-user-public-list.php';
	}
	
    $address = '';
    if(osc_user_address()!='') {
        if(osc_user_city_area()!='') {
            $address = osc_user_address().", ".osc_user_city_area();
        } else {
            $address = osc_user_address();
        }
    } else {
        $address = osc_user_city_area();
    }
    $location_array = array();
    if(trim(osc_user_city()." ".osc_user_zip())!='') {
        $location_array[] = trim(osc_user_city()." ".osc_user_zip());
    }
    if(osc_user_region()!='') {
        $location_array[] = osc_user_region();
    }
    if(osc_user_country()!='') {
        $location_array[] = osc_user_country();
    }
    $location = implode(", ", $location_array);
    unset($location_array);

    osc_enqueue_script('jquery-validate');

    geniewizards_add_body_class('user-public-profile');
	
    osc_add_hook('before-main','sidebar');
	
    function sidebar(){
        osc_current_web_theme_path('user-public-sidebar.php');
    }

    osc_current_web_theme_path('header.php');
?>

<div class="row">
  <div class="col-sm-4 col-md-3">
    <div class="user-card">
      <figure><img class="img-responsive" src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( osc_user_email() ) ) ); ?>?s=400&d=<?php echo osc_current_web_theme_url('images/default.gif') ; ?>" /></figure>
      <ul id="user_data">
        <li class="name">
          <h3><i class="fa fa-user"></i> <?php echo osc_user_name(); ?></h3>
        </li>
        <?php if( osc_user_website() !== '' ) { ?>
        <li class="website"><i class="fa fa-link"></i> <strong><a target="_blank" href="<?php echo osc_user_website(); ?>"><?php echo osc_user_website(); ?></a></strong></li>
        <?php } ?>
        <?php if( $address !== '' ) { ?>
        <li class="adress"> <i class="fa fa-map-marker"></i> <strong><?php _e('Address', genieWIZARDS_THEME_FOLDER);?>:</strong><br><?php echo $address; ?></li>
        <?php } ?>
        <?php if( $location !== '' ) { ?>
        <li class="location"><i class="fa fa-location-arrow"></i> <strong><?php _e('Location', genieWIZARDS_THEME_FOLDER);?>:</strong><br><?php echo  $location; ?></li>
        <?php } ?>
      </ul>
    </div>
    <section class="user_detail_info">
      <?php if( osc_user_info() !== '' ) { ?>
      <div class="title">
        <h1>
          <?php _e('User description', genieWIZARDS_THEME_FOLDER); ?>
        </h1>
      </div>
      <?php } ?>
      <?php echo nl2br(osc_user_info()); ?> </section>
  </div>
  <div class="col-sm-8 col-md-9">
    <?php if( osc_count_items() > 0 ) { ?>
    <div class="similar_ad">
      <div class="title">
        <h1>
          <?php _e('Latest listings', genieWIZARDS_THEME_FOLDER); ?>
        </h1>
      </div>
      <?php osc_current_web_theme_path($loop_template); ?>
      <div class="pagination"><?php echo osc_pagination_items(); ?></div>
    </div>
    <?php } ?>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>
