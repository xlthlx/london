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
	<meta name="theme-color" content="#101010"/>
    <meta name="fediverse:creator" content="@xlthlx@hachyderm.io">
	<link rel="author" href="<?php echo esc_url( home_url( '/' ) ); ?>humans.txt"/>
	<meta property="og:title" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> | <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>">
	<meta property="og:type" content="page">
	<meta property="og:image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/piccioni.london.jpg">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="900">
	<meta property="og:image:alt" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>, <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>">
	<meta property="og:description" content="Serena Piccioni, a Senior Developer with 20+ years of experience in the digital and IT industry.">
	<meta property="og:url" content="https://piccioni.london">
	<meta property="og:locale" content="en_EN">
	<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
	<meta property="article:author" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/piccioni.london.jpg">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a class="visually-hidden" href="#content">Skip to main content</a>
<header>
	<nav class="navbar navbar-expand-md navbar-dark py-3">
		<div class="container d-flex flex-row-reverse">
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
                    <a class="text-white" title="Mastodon" target="_blank" rel="me" href="https://hachyderm.io/@xlthlx">
                        <span class="screen-reader-text">Mastodon</span>
                        <svg xmlns="http://www.w3.org/2000/svg" aria-label="Mastodon" role="img" width="25"
                             height="25" viewBox="0 0 192 192">
                            <path d="M2004.3 228h-.57c-19.87.163-38.97 2.491-50.13 7.601-.5.213-24.58 10.78-24.58 46.99 0 7.394-.14 16.236.09 25.612.4 16.438 2 32.742 7.21 45.957 5.67 14.406 15.47 25.335 32.04 29.72 14.11 3.737 26.23 4.503 35.99 3.967h.01c18.41-1.021 28.71-6.695 28.71-6.695a6.018 6.018 0 0 0 3.16-5.558l-.56-12.178a5.984 5.984 0 0 0-2.56-4.646 5.995 5.995 0 0 0-5.24-.804s-11.04 3.471-23.45 3.047c-4.87-.167-9.84-.357-14.18-1.544-3.91-1.069-7.14-3.148-8.76-7.347 5.59.951 13.45 2.021 22.27 2.425 10.49.481 20.33-.592 30.33-1.785 12.37-1.477 23.76-6.688 31.4-13.091 5.8-4.865 9.47-10.509 10.5-15.801v-.001c3.23-16.623 3.05-40.428 3.04-41.319-.01-36.286-24.23-46.801-24.58-46.951-11.14-5.105-30.25-7.436-50.14-7.599Zm59.9 93.58.09-.471c3.1-15.948 2.73-38.451 2.73-38.451v-.067c0-27.633-17.49-36.04-17.49-36.04a.234.234 0 0 0-.05-.024c-10.05-4.616-27.33-6.379-45.26-6.527h-.41c-17.93.148-35.2 1.911-45.25 6.527l-.06.024s-17.48 8.407-17.48 36.04c0 7.308-.15 16.047.09 25.314v.004c.36 14.96 1.64 29.826 6.37 41.852 4.27 10.836 11.49 19.221 23.95 22.519 12.65 3.349 23.51 4.066 32.26 3.585 9.61-.533 16.56-2.512 20.36-3.891l-.04-.739c-5.11 1.018-12.33 2.033-20 1.771-16.29-.559-32.69-3.029-35.34-23.016a40.2 40.2 0 0 1-.35-5.4 6 6 0 0 1 2.3-4.719 5.998 5.998 0 0 1 5.13-1.109s12.59 3.066 28.55 3.798c9.81.45 19.01-.598 28.36-1.713 9.88-1.18 19.01-5.258 25.11-10.372 3.36-2.814 5.83-5.834 6.43-8.895Zm-54.2-36.244c.68-2.603 3.99-12.807 14.27-12.807 10.68 0 10.54 12.137 10.54 12.137v34.224c0 3.311 2.69 6 6 6s6-2.689 6-6v-34.406s-.68-23.955-22.54-23.955c-10 0-16.43 5.292-20.4 10.778-4.07-5.273-10.62-10.293-20.78-10.293-6.92 0-11.53 2.138-14.68 4.857-6.67 5.747-6.86 14.826-6.81 16.949l.02.455s-.01-.161-.02-.455v-.052 36.342c0 3.311 2.69 6 6 6s6-2.689 6-6v-36.342c0-.169-.01-.338-.02-.507 0 0-.5-4.577 2.66-7.298 1.45-1.252 3.66-1.949 6.85-1.949 10.65 0 14.18 9.844 14.91 12.386v20.233c0 3.311 2.69 6 6 6s6-2.689 6-6v-20.297Z"
                                  style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"
                                  transform="translate(-1908 -212)" fill="currentColor"/>
                        </svg>
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


