<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package readClub
 */

?>
<!DOCTYPE html>
<html class="page  no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE = edge"><![endif]-->
	<meta name="format-detection" content="telephone=no">
	<meta name="format-detection" content="date=no">
	<meta name="format-detection" content="address=no">
	<meta name="format-detection" content="email=no">
	<meta content="notranslate" name="google">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<!--[if lt IE 9]>
<![endif]-->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_url') ?>/img/favicon.png">
	<?php wp_head(); ?>
</head>

<body class="home landing" id="top">
	<div class="wrapper">

		<header class="header <?php if(is_user_logged_in()){ echo 'user-logged'; } ?>">
			<div class="container">
				<div class="header__wr">
					<div class="header__logo">
						<div class="logo">
							<a href="<?php bloginfo('url') ?>">
								<img src="<?php bloginfo('template_url') ?>/img/general/logo.png" alt="">
								<span>Читай <br> клуб</span>


							</a>
						</div>
					</div>
					<div class="header__nav">
						<div class="mobile-menu-btn"><span></span><span></span><span></span></div>
						<nav class="nav" id="nav">
							<?php wp_nav_menu('main-menu') ?>

							<div class="header__right">
								<div class="header__search">
									<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 512 512">
										<path
											d="M460.355 421.59l-106.51-106.512c20.04-27.553 31.884-61.437 31.884-98.037C385.73 124.935 310.792 50 218.685 50c-92.106 0-167.04 74.934-167.04 167.04 0 92.107 74.935 167.042 167.04 167.042 34.912 0 67.352-10.773 94.184-29.158L419.945 462l40.41-40.41zM100.63 217.04c0-65.095 52.96-118.055 118.056-118.055 65.098 0 118.057 52.96 118.057 118.056 0 65.097-52.96 118.057-118.057 118.057-65.096 0-118.055-52.96-118.055-118.056z"
											fill="#7F58AF">
										</path>
									</svg>

								</div>
								<?php wp_nav_menu( ['theme_location' => 'login-menu']); ?>
							</div>
						</nav>
					</div>
					<!-- <div class="header__social">
						<div class="social">
							<ul>
								<li><a href=""><img src="<?php bloginfo('template_url') ?>/img/content/facebook.svg" alt=""></a></li>
								<li><a href=""><img src="<?php bloginfo('template_url') ?>/img/content/instagram.svg" alt=""></a></li>
							</ul>
						</div>
					</div> -->
				</div>
			</div>
			<div class="search-block">
			<div class="container"><?php echo do_shortcode('[wd_asp id=3]'); ?></div>
		</div>
		</header>
