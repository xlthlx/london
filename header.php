<?php
/**
 * The Header for our theme.
 *
 * @package London
 */

?><!DOCTYPE html>
<html id="top" lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Serena Piccioni, a Senior Developer with 20+ years of experience in the digital and IT industry."/>
	<meta name="author" content="Serena Piccioni">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#ffffff"/>
	<link rel="author" href="<?php echo esc_url( home_url( '/' ) ); ?>humans.txt"/>
	<meta property="og:title" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> | <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>">
	<meta property="og:type" content="page">
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/piccioni.london.jpg">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="900">
	<meta property="og:image:alt" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>, <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>">
	<meta property="og:description" content="Serena Piccioni, a Senior Developer with 20+ years of experience in the digital and IT industry.">
	<meta property="og:url" content="https://piccioni.london">
	<meta property="og:locale" content="en_EN">
	<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
	<meta property="article:author" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/piccioni.london.jpg">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a class="visually-hidden" href="#content">Skip to main content</a>
<header>
	<nav class="navbar navbar-expand-md navbar-dark py-3">
		<div class="container">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
					aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav me-auto mb-2 mb-md-0">
					<li class="nav-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link active" aria-current="page">Home</a></li>
					<li class="nav-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>work-experience/" class="nav-link">Experience</a></li>
					<li class="nav-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>#skills" class="nav-link">Skills</a></li>
					<li class="nav-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>#education" class="nav-link">Education</a></li>
					<li class="nav-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>#teaching" class="nav-link">Teaching</a></li>
					<li class="nav-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>#contacts" class="nav-link">Contacts</a></li>
				</ul>
				<div class="d-flex">
					<a class="text-white me-3" title="GitHub" href="https://github.com/xlthlx" rel="noreferrer noopener" target="_blank">
						<svg aria-label="GitHub" width="25" height="25" data-icon="github" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="currentColor" d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"></path></svg>
					</a>
					<a class="text-white" title="LinkedIn" href="https://www.linkedin.com/in/serenapiccioni/" rel="noreferrer noopener" target="_blank">
						<svg aria-label="LinkedIn" width="25" height="25" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>
					</a>
				</div>
			</div>
		</div>
	</nav>
</header>

<main class="mt-3 pt-3">
	<div id="content" class="container">

		<section class="d-flex my-4">
			<div class="ms-auto text-end">
				<h1>
					<a class="h1" href="<?php echo get_home_url(); ?>">
						<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>
					</a>
				</h1>
				<p class="font-italic"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></p>
			</div>
		</section>

		<hr class="mb-5 mt-3">


