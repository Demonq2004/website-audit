<?php
$args = array(
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'order'          => 'ASC',
    'orderby'        => 'title'
);

$projects_query = new WP_Query($args);
?>

<section class="featured-projects" aria-labelledby="projects-heading" id="featured-projects">
    <div class="featured-projects__container">
        <div class="featured-projects__header">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                aria-hidden="true">
                <polyline points="16 18 22 12 16 6"></polyline>
                <polyline points="8 6 2 12 8 18"></polyline>
                <line x1="14" y1="4" x2="10" y2="20"></line>
            </svg>
            <h2 id="projects-heading">Featured Projects</h2>
        </div>

        <div class="projects-grid">
            <?php if ($projects_query->have_posts()):
                while ($projects_query->have_posts()):
                    $projects_query->the_post();
                    $technologies = get_the_terms(get_the_ID(), 'technology');
                    
                    $image_1 = get_field('project_image_1');
                    ?>
                    <article class="project-card">
                        
                        <div class="project-card__image-wrapper">
                            <?php if ($image_1): ?>
                                <img 
                                    src="<?php echo esc_url($image_1['sizes']['large']); ?>" 
                                    alt="<?php echo esc_attr($image_1['alt'] ? $image_1['alt'] : get_the_title()); ?>" 
                                    class="project-card__image"
                                    loading="lazy"
                                />
                            <?php else: ?>
                                <div class="project-card__image placeholder-image"></div>
                            <?php endif; ?>
                        </div>

                        <div class="project-card__content">
                            <h3 class="project-card__title">
                                <a href="<?php the_permalink(); ?>" class="project-card__link">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <p class="project-card__description">
                                <?php echo get_the_excerpt(); ?>
                            </p>

                            <?php if ($technologies && !is_wp_error($technologies)): ?>
                                <ul aria-label="Technologies used" class="project-card__tags">
                                    <?php foreach ($technologies as $tech): ?>
                                        <li>
                                            <?php echo esc_html($tech->name); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>