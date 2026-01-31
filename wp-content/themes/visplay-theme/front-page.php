<?php
/**
 * Template Name: Home Page
 * 
 * @package Glochar_Theme
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Space is shaped by you.</h1>
        <p class="hero-subtitle">Modular systems for commercial interiors</p>
        <a href="#about" class="hero-cta">Explore more</a>
    </div>
    <div class="hero-image">
        <?php 
        if (has_post_thumbnail()) {
            the_post_thumbnail('hero-large');
        }
        ?>
    </div>
</section>

<!-- About Section -->
<section class="about-section section-padding" id="about">
    <div class="container">
        <div class="about-content">
            <h2>Modular systems for commercial interiors</h2>
            <p>We develop modular furnishing and space defining systems for stores, offices and other commercial spaces. As design engineers, we assist brands and architects in achieving their visions of successful and appealing interiors.</p>
            <a href="<?php echo esc_url(home_url('/about-us')); ?>" class="btn btn-primary">Learn more</a>
        </div>
    </div>
</section>

<!-- Stories Section -->
<section class="stories-section section-padding">
    <div class="container">
        <div class="section-header">
            <h2>Stories</h2>
            <a href="<?php echo esc_url(home_url('/stories')); ?>" class="view-all">All stories</a>
        </div>
        
        <div class="stories-grid">
            <?php
            $stories = new WP_Query(array(
                'post_type' => 'story',
                'posts_per_page' => 6,
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            
            if ($stories->have_posts()) :
                while ($stories->have_posts()) : $stories->the_post();
            ?>
                <article class="story-card">
                    <a href="<?php the_permalink(); ?>" class="story-link">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="story-image">
                                <?php the_post_thumbnail('story-card'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="story-content">
                            <h3><?php the_title(); ?></h3>
                            <span class="read-story">Read story</span>
                        </div>
                    </a>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Systems Section -->
<section class="systems-section section-padding bg-light">
    <div class="container">
        <div class="section-header">
            <h2>Systems</h2>
            <a href="<?php echo esc_url(home_url('/systems')); ?>" class="view-all">All systems</a>
        </div>
        
        <div class="systems-grid">
            <?php
            $systems = new WP_Query(array(
                'post_type' => 'system',
                'posts_per_page' => 8,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));
            
            if ($systems->have_posts()) :
                while ($systems->have_posts()) : $systems->the_post();
            ?>
                <article class="system-card">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                        <p class="system-type"><?php echo get_the_excerpt(); ?></p>
                    </a>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="projects-section section-padding">
    <div class="container">
        <div class="section-intro">
            <h2>Custom solutions for your unique requirements</h2>
            <p>Corporate colours, special surface finishes, customised dimensions and exclusive systems conceived specifically for your requirements. Together we can develop your solution.</p>
        </div>
        
        <div class="section-header">
            <h3>Projects</h3>
            <a href="<?php echo esc_url(home_url('/projects')); ?>" class="view-all">All projects</a>
        </div>
        
        <div class="projects-grid">
            <?php
            $projects = new WP_Query(array(
                'post_type' => 'project',
                'posts_per_page' => 8,
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            
            if ($projects->have_posts()) :
                while ($projects->have_posts()) : $projects->the_post();
            ?>
                <article class="project-card">
                    <a href="<?php the_permalink(); ?>" class="project-link">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="project-image">
                                <?php the_post_thumbnail('project-card'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="project-content">
                            <h3><?php the_title(); ?></h3>
                            <span class="view-project">View project</span>
                        </div>
                    </a>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section section-padding bg-dark">
    <div class="container">
        <div class="contact-content">
            <h2>Any questions?</h2>
            <p>We look forward to hearing from you.</p>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-light">Contact form</a>
        </div>
    </div>
</section>

<?php
get_footer();
?>
