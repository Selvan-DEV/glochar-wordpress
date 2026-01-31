<?php
/**
 * Page Template
 * 
 * @package Glochar_Theme
 */

get_header();
?>

<div class="page-wrapper">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Page Header -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="page-hero">
                <?php the_post_thumbnail('hero-large'); ?>
                <div class="page-hero-overlay">
                    <div class="container">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="page-header section-padding">
                <div class="container">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Page Content -->
        <article id="page-<?php the_ID(); ?>" <?php post_class('page-content section-padding'); ?>>
            <div class="container">
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>
        
    <?php endwhile; ?>
</div>

<?php
get_footer();
?>
