
<?php
    $js_lang = array(
        'delete' => __('Delete', genieWIZARDS_THEME_FOLDER),
        'cancel' => __('Cancel', genieWIZARDS_THEME_FOLDER)
    );

	osc_register_script('jquery', osc_current_web_theme_js_url('jquery.min.js'));
    osc_enqueue_script('jquery');
    osc_enqueue_script('jquery-ui');
	osc_register_script('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.pack.js'), array('jquery'));
    osc_enqueue_style('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.css'));
    osc_enqueue_script('fancybox');
	osc_register_script('jquery-validate', osc_current_web_theme_js_url('jquery.validate.min.js'));
    osc_enqueue_script('jquery-validate');
	osc_enqueue_script('bootstrap-theme-js');
	osc_register_script('bootstrap-theme-js', osc_current_web_theme_js_url('bootstrap.min.js'), 'jquery');
	osc_enqueue_script('library-js');
	osc_register_script('library-js', osc_current_web_theme_js_url('library.js'), 'jquery');
    osc_register_script('global-theme-js', osc_current_web_theme_js_url('global.js'), 'jquery');
    osc_register_script('delete-user-js', osc_current_web_theme_js_url('delete_user.js'), 'jquery-ui');
    osc_enqueue_script('global-theme-js');
?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title><?php echo osc_esc_html(meta_title()) ; ?></title>
<?php if( meta_description() != '' ) { ?>
<meta name="description" content="<?php echo osc_esc_html(meta_description()); ?>" />
<?php } ?>
<?php if( meta_keywords() != '' ) { ?>
<meta name="keywords" content="<?php echo osc_esc_html(meta_keywords()); ?>" />
<?php } ?>
<?php if( osc_get_canonical() != '' ) { ?>
<!-- canonical -->
<link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/>
<!-- /canonical -->
<?php } ?>
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="Fri, Jan 01 1970 00:00:00 GMT" />
<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="shortcut icon" href="<?php echo geniewizards_favicon_url(); ?>" type="image/x-icon" />
<link href="<?php echo osc_current_web_theme_url('js/jquery-ui/jquery-ui-1.10.2.custom.min.css') ; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    var geniewizards = window.geniewizards || {};
    geniewizards.base_url = '<?php echo osc_base_url(true); ?>';
    geniewizards.langs = <?php echo json_encode($js_lang); ?>;
    geniewizards.fancybox_prev = '<?php echo osc_esc_js( __('Previous image',genieWIZARDS_THEME_FOLDER)) ?>';
    geniewizards.fancybox_next = '<?php echo osc_esc_js( __('Next image',genieWIZARDS_THEME_FOLDER)) ?>';
    geniewizards.fancybox_closeBtn = '<?php echo osc_esc_js( __('Close',genieWIZARDS_THEME_FOLDER)) ?>';
    geniewizards.locations_input_as = '<?php echo osc_esc_js( geniewizards_locations_input_as()); ?>';
    geniewizards.rtl_view = '<?php echo (osc_get_preference('rtl_view', 'geniewizards_theme') == '1')? '1': '0'; ?>';
</script>
<!--Ie Js-->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<link href="<?php echo osc_current_web_theme_url('css/bootstrap.min.css') ; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo osc_current_web_theme_url('css/main.css') ; ?>" rel="stylesheet" type="text/css" />
<?php if(osc_get_preference('rtl_view', 'geniewizards_theme') == "1") { ?>
<link href="<?php echo osc_current_web_theme_url('css/rtl.css') ; ?>" rel="stylesheet" type="text/css" />
<?php } ?>
<?php $color_mode = geniewizards_theme_color_mode(); ?>
<link href="<?php echo osc_current_web_theme_url('css/apps-'.$color_mode.'.css') ; ?>" rel="stylesheet" type="text/css" />
<?php osc_run_hook('header') ; ?>
