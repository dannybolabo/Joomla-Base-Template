<?php

    defined('_JEXEC') or die;
    JHTML::_('behavior.framework', true);

    $app = &JFactory::getApplication();
	$template_name = $app->getTemplate();
	$template_params = $app->getTemplate(true)->params;

	$doc = &JFactory::getDocument();
	$doc->setTitle($doc->getTitle() . ' | ' . JFactory::getConfig()->getValue('config.sitename'));

	$page_class = $app->getParams('com_content')->get('pageclass_sfx');
	$template_class = $template_params->get('pageclass', '');
	$columns = $template_params->get('columns', 0);
	switch($columns) {
		case 0:
			$layout = 'one_col';
			break;
		case 1:
			$layout = 'two_col_left';
			break;
		case 2:
			$layout = 'two_col_right';
			break;
		case 3:
			$layout = 'three_col';
			break;
	}
	$body_class = trim($page_class . ' ' . $layout . ' ' . $template_class);

	$typekit_selector = 'h1';

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/dev/templates/<?php echo $template_name; ?>/css/style.css?v=1">
        <link rel="stylesheet" href="/dev/templates/<?php echo $template_name; ?>/css/text.css?v=1">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/templates/<?php echo $template_name; ?>/js/libs/jquery-1.7.1.min.js"><\/script>')</script>
        <script>jQuery.noConflict(); jQuery('html').addClass('js').removeClass('no-js');</script>
        <?php /* TypeKit
		<script src="http://use.typekit.com/XXXXXXX.js"></script>
        <script>
			jQuery(document).ready(function() {
				jQuery('<?php echo $typekit_selector; ?>').css('visibility', 'hidden');
				Typekit.load({
					active: function() {
						if (jQuery.support.opacity) {
							jQuery('<?php echo $typekit_selector; ?>').css('visibility', 'visible').hide().fadeIn(200);
						} else {
							jQuery('<?php echo $typekit_selector; ?>').css('visibility', 'visible');
						}
					}, inactive: function() {
						jQuery('<?php echo $typekit_selector; ?>').css('visibility', 'visible');
					}
				});
			});
		</script> */ ?>
		<jdoc:include type="head" />
        <?php /* Google Analytics
		<script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script> */ ?>
    </head>
    <body class="<?php echo $body_class; ?>">
    	<div id="container">
            <header>
            <div id="header">
				<jdoc:include type="modules" name="header" style="xhtml"	 />
            </div>
            </header>
            <div id="content">
                <?php if($columns == 1 || $columns == 3): ?>
                    <div id="sidebar_left">
                        <jdoc:include type="modules" name="left" style="xhtml" />
                    </div>
                <?php endif; ?>
                <?php if($columns == 2 || $columns == 3): ?>
                    <div id="sidebar_right">
                        <jdoc:include type="modules" name="right" style="xhtml" />
                    </div>
                <?php endif; ?>
                <div id="main" role="main">
                    <jdoc:include type="message" />
                    <jdoc:include type="modules" name="precon" style="xhtml" />
                    <jdoc:include type="component" />
                    <jdoc:include type="modules" name="postcon" style="xhtml" />
                </div>
            </div>
            <footer>
            <div id="footer">
				<jdoc:include type="modules" name="footer" style="xhtml" />
            </div>
            </footer>
        </div>
        <script src="/dev/templates/<?php echo $template_name; ?>/js/script.js"></script>
    </body>
</html>