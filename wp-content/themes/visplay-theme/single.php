<?php
/**
 * Single Post Template
 * 
 * @package Glochar_Theme
 */

get_header();
?>

<div class="single-post-wrapper">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Hero Header -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="single-hero">
                <?php the_post_thumbnail('hero-large'); ?>
                <div class="single-hero-overlay">
                    <div class="container">
                        <h1 class="single-title"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="single-header section-padding">
                <div class="container">
                    <h1 class="single-title"><?php the_title(); ?></h1>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Post Content -->
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-content section-padding'); ?>>
            <div class="container-small">
                <div class="post-meta">
                    <span class="post-date"><?php echo get_the_date(); ?></span>
                    <?php if (get_post_type() === 'post') : ?>
                        <span class="post-author">By <?php the_author(); ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                
                <?php if (get_post_type() === 'post') : ?>
                    <div class="post-tags">
                        <?php the_tags('<ul class="tag-list"><li>', '</li><li>', '</li></ul>'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </article>
        
        <!-- Post Navigation -->
        <div class="post-navigation section-padding">
            <div class="container">
                <div class="nav-links">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    
                    if ($prev_post) : ?>
                        <div class="nav-previous">
                            <a href="<?php echo get_permalink($prev_post); ?>">
                                <span class="nav-label">← Previous</span>
                                <span class="nav-title"><?php echo get_the_title($prev_post); ?></span>
                            </a>
                        </div>
                    <?php endif;
                    
                    if ($next_post) : ?>
                        <div class="nav-next">
                            <a href="<?php echo get_permalink($next_post); ?>">
                                <span class="nav-label">Next →</span>
                                <span class="nav-title"><?php echo get_the_title($next_post); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
    <?php endwhile; ?>
</div>

<?php
get_footer();
?>
