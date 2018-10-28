<?php
/**
 * Template Name: SuperSmashBroz Shop Page
 *
 * @package Perfect_Portfolio
 */
get_header(); ?>

<div class="tc-wrapper">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="wrap">
                <?php the_post();
                    the_content(); ?>
            </div>
        </main>
    </div><!-- #primary -->
</div>

<?php
get_footer();
