<?php
defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

JHtml::_('bootstrap.framework');
$doc->addScript('templates/'.$this->template.'/js/app.js');
$doc->addStyleSheet('templates/'.$this->template.'/css/all.css');

// Add current user information
$user = JFactory::getUser();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!--[if lte IE 9]><link href='<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie9.css' rel='stylesheet' type='text/css'><![endif]-->
	<jdoc:include type="head" />
	<!--[if lt IE 9]><script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script><![endif]-->
</head>

<body class="site">
	<div class="body">
		<div class="container clearfix">
			<header class="header" role="banner">
                <div class="header-search pull-right">
                    <jdoc:include type="modules" name="position-0" style="none" />
                </div>
			</header>
			<?php if ($this->countModules('position-1')) : ?>
			<nav class="navigation" role="navigation">
				<jdoc:include type="modules" name="position-1" style="none" />
			</nav>
			<?php endif; ?>
			<div class="row-fluid wrapper">
				<?php if ($this->countModules('position-8')) : ?>
				<div id="sidebar" class="span3">
					<div class="sidebar-nav">
						<jdoc:include type="modules" name="position-8" style="xhtml" />
					</div>
				</div>
				<?php endif; ?>
                <jdoc:include type="modules" name="banner" style="xhtml" />
				<main id="content" class="<?php if ($this->countModules('position-7')) {echo 'floated';} ?>" role="main">
					<jdoc:include type="modules" name="position-3" style="xhtml" />
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<jdoc:include type="modules" name="position-2" style="none" />
				</main>
				<?php if ($this->countModules('position-7')) : ?>
				<div id="aside" class="span3">
					<jdoc:include type="modules" name="position-7" style="well" />
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

    <jdoc:include type="modules" name="position-5" style="none" />

	<footer class="footer" role="contentinfo">
        <jdoc:include type="modules" name="position-4" style="none" />

        <div class="footer-box">
            <jdoc:include type="modules" name="position-6" style="none" />
        </div>

		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">
			<jdoc:include type="modules" name="footer" style="none" />
			 <p>&copy;<?php echo date('Y');?> <?php echo $sitename; ?></p>
		</div>
	</footer>
	<jdoc:include type="modules" name="debug" style="none" />
  <div id="ajaxLoader"><p>Loading...</p></div>
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'XXX']);
    _gaq.push(['_trackPageview']);
  
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  
  </script>
</body>
</html>
