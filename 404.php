<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage London
 */
?>
<?php get_header(); ?>

    <section class="mt-0">
        <div class="row">
            <div class="col-md-12 mt-0 mb-4">
                <h2 class="mb-3 h2-responsive text-center">Uh-oh</h2>
                <hr class="mb-4">
                <p class="text-center">The hamsters who run this site have not found what you were looking for.</p>
                <p>
					<img class="img-fluid rounded z-depth-2 mx-auto d-block" src="<?php echo get_template_directory_uri(); ?>/assets/img/404.gif" alt="404"/>
				</p>
            </div>
        </div>
    </section>

<?php get_footer();
