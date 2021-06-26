<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage London
 */
?>
<?php get_header(); ?>

    <section id="not-found" class="pt-5">
        <div class="ms-auto text-end">
            <h2 class="mt-5 mb-3 h2-responsive">Uh-oh</h2>
        </div>
        <hr class="dotted mb-5 mt-4">

        <div class="row mt-3">
            <div class="col-md-12 mb-4">
                <p class="text-center">The hamsters who run this site have not found what you were looking for.</p>
                <p>
                    <img class="img-fluid rounded z-depth-2 mx-auto d-block" src="<?php echo get_template_directory_uri(); ?>/assets/img/404.gif" alt="404"/>
                </p>
            </div>
        </div>
        <hr/>
    </section>

<?php get_footer();
