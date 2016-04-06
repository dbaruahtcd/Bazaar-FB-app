<?php
     $category = __get("category");
     if(!isset($category['pk_i_id']) ) {
         $category['pk_i_id'] = null;
     }

?>

<div class="col-sm-4 col-md-3">
  <aside id="sidebar" class="sidebar_search">
    <h2 id="show_filters">
      <?php _e('Show Filters', genieWIZARDS_THEME_FOLDER) ; ?>
      <i class="fa fa-th-list"></i> </h2>
    <div id="filters_shown">
      <div class="block">
        <h2>
          <?php _e('Advanced Search', genieWIZARDS_THEME_FOLDER) ; ?>
        </h2>
        <section>
          <div class="filters">
            <form action="<?php echo osc_base_url(true); ?>" method="get" class="nocsrf">
              <input type="hidden" name="page" value="search"/>
              <input type="hidden" name="sOrder" value="<?php echo osc_search_order(); ?>" />
              <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting() ; echo $allowedTypesForSorting[osc_search_order_type()]; ?>" />
              <?php foreach(osc_search_user() as $userId) { ?>
              <input type="hidden" name="sUser[]" value="<?php echo $userId; ?>"/>
              <?php } ?>
              <fieldset class="first">
                <h3>
                  <?php _e('Your search', genieWIZARDS_THEME_FOLDER); ?>
                </h3>
                <div class="row">
                  <input class="input-text" type="text" name="sPattern"  id="query" value="<?php echo osc_esc_html(osc_search_pattern()); ?>" />
                </div>
              </fieldset>
			  <?php if(osc_get_preference('show_search_country', 'geniewizards_theme') == '1'){?>
              <fieldset>
                <h3>
                  <?php _e('Country', genieWIZARDS_THEME_FOLDER); ?>
                </h3>
                <div>
				 <?php geniewizards_countries_select('sCountry', 'sCountry', __('Select a country', genieWIZARDS_THEME_FOLDER), osc_esc_html(Params::getParam('sCountry')));?>
                </div>
              </fieldset>
			  <?php } ?>
			    <fieldset>
                <h3>
                  <?php _e('Region', genieWIZARDS_THEME_FOLDER); ?>
                </h3>
                <div>
					<?php geniewizards_regions_select('sRegion', 'sRegion', __('Select a region', genieWIZARDS_THEME_FOLDER), osc_esc_html(osc_search_region())) ; ?>
                </div>
              </fieldset>
			  <fieldset>
                <h3>
                  <?php _e('City', genieWIZARDS_THEME_FOLDER); ?>
                </h3>
                <div>
                    <?php geniewizards_cities_select('sCity', 'sCity', __('Select a city', genieWIZARDS_THEME_FOLDER), osc_esc_html(osc_search_city())) ; ?>
                </div>
              </fieldset>

              <?php if( osc_images_enabled_at_items() ) { ?>
              <fieldset>
                <h3>
                  <?php _e('Show only', genieWIZARDS_THEME_FOLDER) ; ?>
                </h3>
                <div class="checkbox">
                  <input type="checkbox" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked' : ''); ?> />
                  <label for="withPicture">
                    <?php _e('listings with pictures', genieWIZARDS_THEME_FOLDER) ; ?>
                  </label>
                </div>
              </fieldset>
              <?php } ?>
              <?php if( osc_price_enabled_at_items() ) { ?>
              <fieldset>
                <div class="price-slice">
                  <h3>
                    <?php _e('Price', genieWIZARDS_THEME_FOLDER) ; ?>
                  </h3>
                  <ul class="row">
                    <li class="col-md-6"> <span>
                      <?php _e('Min', genieWIZARDS_THEME_FOLDER) ; ?>
                      :</span>
                      <input class="input-text" type="text" id="priceMin" name="sPriceMin" value="<?php echo osc_esc_html(osc_search_price_min()); ?>" size="6" maxlength="6" />
                    </li>
                    <li class="col-md-6"> <span>
                      <?php _e('Max', genieWIZARDS_THEME_FOLDER) ; ?>
                      :</span>
                      <input class="input-text" type="text" id="priceMax" name="sPriceMax" value="<?php echo osc_esc_html(osc_search_price_max()); ?>" size="6" maxlength="6" />
                    </li>
                  </ul>
                </div>
              </fieldset>
              <?php } ?>
              <div class="plugin-hooks">
                <?php
            if(osc_search_category_id()) {
                osc_run_hook('search_form', osc_search_category_id()) ;
            } else {
                osc_run_hook('search_form') ;
            }
            ?>
              </div>
              <?php
        $aCategories = osc_search_category();
        foreach($aCategories as $cat_id) { ?>
              <input type="hidden" name="sCategory[]" value="<?php echo osc_esc_html($cat_id); ?>"/>
              <?php } ?>
              <div class="actions">
                <button type="submit" class="btn btn-success">
                <?php _e('Apply', genieWIZARDS_THEME_FOLDER) ; ?>
                </button>
              </div>
            </form>
          </div>
        </section>
      </div>
      <div class="block mobile_hide_cat">
        <h2>
          <?php _e('Refine category', genieWIZARDS_THEME_FOLDER) ; ?>
        </h2>
        <section>
          <div class="search_filter">
            <?php geniewizards_sidebar_category_search($category['pk_i_id']); ?>
          </div>
        </section>
      </div>
    </div>
    <div class="block mobile_hide">
      <h2>
        <?php _e('Subscribe to this search', genieWIZARDS_THEME_FOLDER) ; ?>
      </h2>
      <section>
        <?php osc_alert_form(); ?>
      </section>
    </div>
    <?php 
	if( osc_get_preference('facebook-showsearch', 'geniewizards_theme') == "1"){
		?>
    <div class="block mobile_hide">
      <section>
        <div class="fb_box">
          <?php
		geniewizards_facebook_like_box();?>
        </div>
      </section>
    </div>
    <?php
	}
  ?>
  </aside>
</div>
