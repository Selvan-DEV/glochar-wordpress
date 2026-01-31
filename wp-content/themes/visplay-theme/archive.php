<?php
/**
 * Archive Template
 * 
 * @package Glochar_Theme
 */

get_header();
?>

<div class="archive-wrapper">
    <!-- Archive Header -->
    <div class="archive-header section-padding">
        <div class="container">
            <h1 class="archive-title">
                <?php
                if (is_post_type_archive('story')) {
                    echo 'Stories';
                } elseif (is_post_type_archive('project')) {
                    echo 'Projects';
                } elseif (is_post_type_archive('system')) {
                    echo 'Systems';
                } else {
                    the_archive_title();
                }
                ?>
            </h1>
            <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
        </div>
    </div>
    
    <!-- Archive Content -->
    <div class="archive-content section-padding">
        <div class="container">
            <?php if (have_posts()) : ?>
                <div class="archive-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('archive-card'); ?>>
                            <a href="<?php the_permalink(); ?>" class="archive-link">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="archive-image">
                                        <?php the_post_thumbnail('project-card'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="archive-card-content">
                                    <h2><?php the_title(); ?></h2>
                                    <?php if (get_the_excerpt()) : ?>
                                        <p><?php echo get_the_excerpt(); ?></p>
                                    <?php endif; ?>
                                    <span class="view-link">
                                        <?php
                                        if (is_post_type_archive('story')) {
                                            echo 'Read story';
                                        } elseif (is_post_type_archive('project')) {
                                            echo 'View project';
                                        } else {
                                            echo 'Learn more';
                                        }
                                        ?>
                                    </span>
                                </div>
                            </a>
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
</div>

<?php
get_footer();
?>
