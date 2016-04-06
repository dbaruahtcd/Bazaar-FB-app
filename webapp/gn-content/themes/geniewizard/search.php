<?php
      if( osc_count_items() == 0 || stripos($_SERVER['REQUEST_URI'], 'search') ) {
        osc_add_hook('header','geniewizards_nofollow_construct');
    } else {
        osc_add_hook('header','geniewizards_follow_construct');
    }

    geniewizards_add_body_class('category');
	
	if(geniewizards_show_as() == 'gallery'){
        $loop_template	=	'loop-search-grid.php';
		$listClass = 'listing-grid';
        $buttonClass = 'active';
    }else{
		$loop_template	=	'loop-search-list.php';
		$listClass = '';
		$buttonClass = '';
	}
	
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('search-sidebar.php');
    }
    osc_add_hook('footer','autocompleteCity');
    function autocompleteCity(){ ?>
<script type="text/javascript">
    $(function() {
                    function log( message ) {
                        $( "<div/>" ).text( message ).prependTo( "#log" );
                        $( "#log" ).attr( "scrollTop", 0 );
                    }

                    $( "#sCity" ).autocomplete({
                        source: "<?php echo osc_base_url(true); ?>?page=ajax&action=location",
                        minLength: 2,
                        select: function( event, ui ) {
                            $("#sRegion").attr("value", ui.item.region);
                            log( ui.item ?
                                "<?php echo osc_esc_html( __('Selected', genieWIZARDS_THEME_FOLDER) ); ?>: " + ui.item.value + " aka " + ui.item.id :
                                "<?php echo osc_esc_html( __('Nothing selected, input was', genieWIZARDS_THEME_FOLDER) ); ?> " + this.value );
                        }
                    });
                });
    </script>
<?php
    }
?>
<?php osc_current_web_theme_path('header.php') ; ?>

<div class="row">
  <?php osc_current_web_theme_path('search-sidebar.php') ; ?>
  <div class="col-sm-8 col-md-9">
    <div class="title">
      <h1><?php echo (search_title() != "")? search_title() : '&nbsp;'; ?></h1>
    </div>
    <div class="toolbar">
      <div class="sorting"> <a href="<?php echo osc_esc_html(osc_update_search_url(array('sShowAs'=> 'list'))); ?>" class="list-button <?php if(geniewizards_show_as()=='list')echo "active"; ?>" data-class-toggle="listing-grid" data-destination="#listing-card-list"><span> <i class="fa fa-th-list"></i> </span></a> <a href="<?php echo osc_esc_html(osc_update_search_url(array('sShowAs'=> 'gallery'))); ?>" class="grid-button <?php if(geniewizards_show_as()=='gallery')echo "active"; ?>" data-class-toggle="listing-grid" data-destination="#listing-card-list"><span> <i class="fa fa-th-large"></i> </span></a> </div>
      <?php osc_run_hook('search_ads_listing_top'); ?>
      <?php if(osc_count_items() == 0) { ?>
      <p class="empty" ><?php printf(__('There are no results matching "%s"', genieWIZARDS_THEME_FOLDER), osc_search_pattern()) ; ?></p>
      <?php } else { ?>
      <span class="counter-search">
      <?php
                $search_number = geniewizards_search_number();
                printf(__('%1$d - %2$d of %3$d listings', genieWIZARDS_THEME_FOLDER), $search_number['from'], $search_number['to'], $search_number['of']);
            ?>
      </span>
      <div class="sort"> <span class="see_by">
        <?php
              $orders = osc_list_orders();
              $current = '';
              foreach($orders as $label => $params) {
                  $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1';
                  if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) {
                      $current = $label;
                  }
              }
              ?>
        <?php $i = 0; ?>
        <ul>
          <?php
                  foreach($orders as $label => $params) {
                      $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
          <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
          <li><a class="current" href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
          <?php } else { ?>
          <li><a href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
          <?php } ?>
          <?php $i++; ?>
          <?php } ?>
        </ul>
        </span> </div>
      <?php } ?>
    </div>
    <?php if( osc_get_preference('search-results-top-728x90', 'geniewizards_theme') != ""){ ?>
    <div class="ads_search_top"> <?php echo osc_get_preference('search-results-top-728x90', 'geniewizards_theme'); ?></div>
    <?php } ?>
    <?php
            $i = 0;
            osc_get_premiums(geniewizards_premium_listings_shown());
            if(osc_count_premiums() > 0) {
            echo '<h5 class="title">'.__('Premium listings',genieWIZARDS_THEME_FOLDER).'</h5>';
			?>
    <?php 
			
            View::newInstance()->_exportVariableToView("listType", 'premiums');
            View::newInstance()->_exportVariableToView("listClass",$listClass.' premium-list');
            osc_current_web_theme_path($loop_template);
            }
        ?>
    <?php if( osc_get_preference('search-results-top-728x90', 'geniewizards_theme') != ""){ ?>
    <div class="ads_search_top"> <?php echo osc_get_preference('search-results-top-728x90', 'geniewizards_theme'); ?></div>
    <?php } ?>
    <?php if(osc_count_items() > 0) {
        echo '<h5 class="title titles">'.__('Listings',genieWIZARDS_THEME_FOLDER).'</h5>';
		?>
    <?php 
		
        View::newInstance()->_exportVariableToView("listType", 'items');
        View::newInstance()->_exportVariableToView("listClass",$listClass);
            osc_current_web_theme_path($loop_template);
    ?>
    <?php
      if(osc_rewrite_enabled()){
      $footerLinks = osc_search_footer_links();
      if(count($footerLinks)>0) {
      ?>
    <div id="related-searches">
      <h5>
        <?php _e('Other searches that may interest you',genieWIZARDS_THEME_FOLDER); ?>
      </h5>
      <ul class="footer-links">
        <?php foreach($footerLinks as $f) { View::newInstance()->_exportVariableToView('footer_link', $f); ?>
        <?php if($f['total'] < 3) continue; ?>
        <li><a href="<?php echo osc_footer_link_url(); ?>"><?php echo osc_footer_link_title(); ?></a></li>
        <?php } ?>
      </ul>
    </div>
    <?php }
      } ?>
    <div class="pagination"> <?php echo osc_search_pagination(); ?> </div>
    <?php } ?>
    <?php if( osc_get_preference('search-results-middle-728x90', 'geniewizards_theme') != "" ){ ?>
    <div class="ads_search_bottom"> <?php echo osc_get_preference('search-results-middle-728x90', 'geniewizards_theme'); ?></div>
    <?php } ?>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>
