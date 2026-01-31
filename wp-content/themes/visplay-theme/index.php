<?php
/**
 * Main Index Template
 * 
 * @package Glochar_Theme
 */

get_header();
?>

<div class="content-wrapper section-padding">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                <?php the_post_thumbnail('project-card'); ?>
                            </a>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="post-meta">
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                            </div>
                            
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more">Read more</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('&laquo; Previous', 'glochar-theme'),
                    'next_text' => __('Next &raquo;', 'glochar-theme'),
                ));
                ?>
            </div>
        <?php else : ?>
            <div class="no-posts">
                <h2><?php _e('Nothing Found', 'glochar-theme'); ?></h2>
                <p><?php _e('Sorry, no posts matched your criteria.', 'glochar-theme'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
?>
