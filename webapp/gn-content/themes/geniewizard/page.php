<?php
    
    osc_add_hook('header','geniewizards_nofollow_construct');

    geniewizards_add_body_class('page');
    osc_current_web_theme_path('header.php') ;
?>

<div class="title">
  <h1><?php echo osc_static_page_title(); ?></h1>
</div>
<?php echo osc_static_page_text(); ?>
<?php osc_current_web_theme_path('footer.php') ; ?>
