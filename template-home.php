<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage London
 */
?>
<?php global $post; ?>
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section id="presentation">
        <div class="row text-left">
            <div class="col-md-12">
				<?php the_content(); ?>
            </div>
        </div>
        <hr class="mt-5"/>
    </section>
<?php endwhile;
endif; ?>
    <section id="skills-education" class="pt-5">
        <div class="ms-auto text-end">
            <h2 class="mt-5 mb-3">Skills and education</h2>
        </div>
        <hr class="dotted mb-5 mt-4">

        <div class="row mt-3">
            <div class="col-md-12 mb-4">
                <h3 class="mb-4">Skills</h3>
                <hr class="mb-4 mt-0"/>
				<?php echo apply_filters( 'the_content',
					get_post_meta( $post->ID, 'home_fields_skills', true ) ); ?>
                <h3 class="mb-4 mt-5">Education</h3>
                <hr class="mb-4 mt-0"/>
				<?php echo apply_filters( 'the_content',
					get_post_meta( $post->ID, 'home_fields_edu', true ) ); ?>
            </div>
        </div>

        <div class="modal fade" id="containerModal" tabindex="-1"
             aria-labelledby="containerModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0 rounded-0">
                        <button type="button"
                                class="btn-close border-0 rounded-0"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img id="inlineFrameImg" src="" alt=""/>
                        <iframe id="inlineFramePdf" src=""></iframe>
                    </div>
                </div>
            </div>
        </div>

        <hr/>
    </section>

    <section id="work-experience" class="pt-5">
        <div class="ms-auto text-end">
            <h2 class="mt-5 mb-3">Work experience</h2>
        </div>
        <hr class="dotted mb-5 mt-4">
		<?php $jobs = ln_get_jobs( 'job' );
		foreach ( $jobs as $job ) { ?>
            <div class="row mt-3">
				<?php if ( empty( $job['about'] ) ) { ?>
                    <div class="col-md-12 mb-4">
                        <h3 class="mb-4"><?php echo $job['title']; ?></h3>
                        <hr class="mb-4 mt-0">
                    </div>
				<?php } ?>
				<?php if ( ! empty( $job['about'] ) ) { ?>
                    <div class="accordion bg-black col-md-12 mb-4"
                         id="accordion<?php echo $job['item_id']; ?>">
                        <div class="accordion-item border-0 no-border-radius bg-black">
                            <div class="accordion-header border-0 no-border-radius bg-black mb-2"
                                 id="accordion<?php echo $job['item_id']; ?>-heading">
                                <h3 class="accordion-button collapsed bg-black h3 border-0 no-border-radius mb-0 px-0 cursor"
                                    data-bs-toggle="collapse"
                                    data-id="<?php echo $job['ID']; ?>"
                                    data-bs-target="#accordion-<?php echo $job['item_slug']; ?>"
                                    aria-expanded="false"
                                    aria-controls="accordion-<?php echo $job['item_slug']; ?>">
									<?php echo $job['title']; ?>
                                </h3>
                            </div>
                            <div id="accordion-<?php echo $job['item_slug']; ?>"
                                 class="accordion-collapse collapse"
                                 aria-labelledby="accordion<?php echo $job['item_id']; ?>"
                                 data-bs-parent="#accordion<?php echo $job['item_id']; ?>"></div>
                        </div>
                        <hr class="mb-4 mt-0">
                    </div>
				<?php } ?>
                <div class="col-md-3 mb-0">
					<?php if ( ! empty( $job['logo'] ) ) { ?>
                        <picture>
                            <img loading="lazy" width="300" height="225"
                                 src="<?php echo $job['logo']; ?>"
                                 class="img-fluid mb-4"
                                 alt="<?php echo $job['title']; ?>"/>
                        </picture>
					<?php } ?>
					<?php if ( ! empty( $job['images'] ) ) { ?>
                        <picture>
                            <img loading="lazy" width="300" height="225"
                                 src="<?php echo $job['first_image']; ?>"
                                 class="img-fluid mb-4 cursor"
                                 alt="<?php echo $job['first_image_alt']; ?>"
                                 data-ref="modal<?php echo $job['item_id']; ?>"
                                 data-id="<?php echo $job['ID']; ?>">
                        </picture>
                        <p class="text-center mt-3 pt-0 mb-3">
					<span data-ref="modal<?php echo $job['item_id']; ?>"
                          role="button"
                          data-id="<?php echo $job['ID']; ?>"
                          class="btn btn-outline-light btn-lg fs-6 px-5 rounded-0">view</span>
                        </p>
                        <div id="modal<?php echo $job['item_id']; ?>"
                             class="modal fade border-0 rounded-0"
                             tabindex="-1"
                             aria-labelledby="modal" aria-hidden="true">
                        </div>
					<?php } ?>
                </div>

                <div class="col-md-9 mb-4">
                    <h4><?php echo $job['job_title']; ?></h4>
                    <div class="dark-grey-text">
                        <h5><?php echo $job['start_date']; ?>
                            - <?php echo $job['end_date']; ?></h5>
                        <p>
                            <small><em><?php echo $job['location']; ?></em></small>
                        </p>
						<?php echo $job['content']; ?>
                        <p class="dark-grey-text">
                            <em><?php echo $job['tech']; ?></em></p>
                    </div>
                </div>
            </div>
            <hr class="dotted mb-4 mt-4">
		<?php } ?>
    </section>

    <section id="wordpress-jobs" class="pt-5">
        <div class="ms-auto text-end"><h2 class="mt-5 mb-3">WordPress jobs</h2>
        </div>
        <hr class="dotted mb-5 mt-4">
        <p class="text-end">Contract websites projects</p>
		<?php $jobs = ln_get_jobs( 'work' );
		foreach ( $jobs as $job ) { ?>
            <hr class="mb-5 mt-4">
            <div class="row mt-3">
                <div class="col-md-3 mb-4">
					<?php if ( ! empty( $job['logo'] ) ) { ?>
                        <picture>
                            <img loading="lazy" width="300" height="225"
                                 src="<?php echo $job['logo']; ?>"
                                 class="img-fluid"
                                 alt="<?php echo $job['title']; ?>"/>
                        </picture>
					<?php } ?>
					<?php if ( ! empty( $job['images'] ) ) { ?>
                        <picture>
                            <img loading="lazy" width="300" height="225"
                                 src="<?php echo $job['first_image']; ?>"
                                 class="img-fluid cursor"
                                 alt="<?php echo $job['first_image_alt']; ?>"
                                 data-ref="modal<?php echo $job['item_id']; ?>"
                                 data-id="<?php echo $job['ID']; ?>">
                        </picture>
                        <p class="text-center mt-4 pt-3 mb-0">
					<span data-ref="modal<?php echo $job['item_id']; ?>"
                          role="button"
                          data-id="<?php echo $job['ID']; ?>"
                          class="btn btn-outline-light btn-lg fs-6 px-5 rounded-0">view</span>
                        </p>
                        <div id="modal<?php echo $job['item_id']; ?>"
                             class="modal fade border-0 rounded-0"
                             tabindex="-1"
                             aria-labelledby="modal" aria-hidden="true">
                        </div>
					<?php } ?>
                </div>
                <div class="col-md-9 mb-4">
                    <h3 class="mb-4"><?php echo $job['title']; ?></h3>
                    <h4 class="dark-grey-text"><?php echo $job['text_date']; ?></h4>
					<?php echo $job['content']; ?>
                </div>
            </div>
		<?php } ?>
        <hr/>
    </section>

    <section id="teaching-publications" class="pt-5">
        <div class="ms-auto text-end">
            <h2 class="mt-5 mb-3">Teaching and publications</h2>
        </div>
        <hr class="dotted mb-5 mt-4">

        <div class="row">
            <div class="col-md-12 mb-4">
				<?php echo apply_filters( 'the_content',
					get_post_meta( $post->ID, 'home_fields_teach', true ) ); ?>
            </div>
        </div>

        <hr/>
    </section>

    <section id="themes-and-plugins" class="pt-5">
        <div class="ms-auto text-end">
            <h2 class="mt-5 mb-3">Themes and plugins</h2>
        </div>
        <hr class="dotted mb-4 mt-4">

		<?php $jobs = ln_get_jobs( 'themes-and-plugins' );
		foreach ( $jobs as $job ) { ?>

            <div id="<?php echo $job['item_slug']; ?>" class="row">
                <h2 class="mt-5"><?php echo $job['title']; ?></h2>
                <hr class="mb-5 mt-4">
                <div class="row mt-3">
                    <div class="col-md-3 mb-0">
						<?php if ( ! empty( $job['logo'] ) ) { ?>
                            <picture>
                                <img loading="lazy" width="300" height="225"
                                     src="<?php echo $job['logo']; ?>"
                                     class="img-fluid mb-4"
                                     alt="<?php echo $job['title']; ?>"/>
                            </picture>
						<?php } ?>
                    </div>
                    <div class="col-md-9 mb-4">
                        <div class="mb-5">
							<?php echo $job['content']; ?>
                        </div>

						<?php if ( ! empty( $job['wp_url'] ) ) { ?>
                            <a class="btn btn-outline-light btn-lg fs-6 px-5 rounded-0"
                               href="<?php echo $job['wp_url']; ?>"
                               role="button" target="_blank">Get it on WordPres
                                <svg width="20" height="20" aria-hidden="true"
                                     focusable="false" role="img"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 512 512" class="ml-2 pb-1">
                                    <path fill="currentColor"
                                          d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z"></path>
                                </svg>
                            </a>
						<?php } ?>

						<?php if ( ! empty( $job['down_url'] ) ) { ?>
                            <a class="btn btn-outline-light btn-lg fs-6 px-5 rounded-0"
                               href="<?php echo $job['down_url']; ?>"
                               role="button" target="_blank">Download .zip
                                <svg width="20" height="20" aria-hidden="true"
                                     focusable="false" role="img"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 512 512" class="ml-2 pb-1">
                                    <path fill="currentColor"
                                          d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                </svg>
                            </a>
						<?php } ?>

						<?php if ( ! empty( $job['github_url'] ) ) { ?>
                            <a href="<?php echo $job['github_url']; ?>"
                               role="button"
                               class="btn btn-outline-light btn-lg fs-6 px-5 rounded-0"
                               target="_blank">
                                View on GitHub
                                <svg width="20" height="20" aria-hidden="true"
                                     focusable="false" role="img"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 496 512" class="ml-2 pb-1">
                                    <path fill="currentColor"
                                          d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"></path>
                                </svg>
                            </a>
						<?php } ?>

                    </div>
                    <div class="col-md-12 mb-4">
                        <hr class="mb-4 mt-5">
						<?php echo $job['description']; ?>
                    </div>

                </div>
            </div>
		<?php } ?>

        <hr/>
    </section>

    <section id="contacts" class="pt-5">
        <div class="ms-auto text-end">
            <h2 class="mt-5 mb-3">Contacts</h2>
        </div>
        <hr class="dotted mb-5 mt-4">

        <div class="row">
            <div class="col-md-12 mb-4">
				<?php echo do_shortcode( '[contact-form-7 id="8"]' ); ?>
            </div>
        </div>

        <hr class="mb-5">
    </section>

<?php get_footer();
