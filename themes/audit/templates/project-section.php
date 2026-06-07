<?php
/**
 * Project Section Template
 */

// Ustawienia paginacji
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type'      => 'project',
    'posts_per_page' => 4,
    'paged'          => $paged,
);

$projects_query = new WP_Query( $args );
?>

<section class="featured-projects" aria-labelledby="projects-heading">
    <div class="featured-projects__container">
        
        <div class="featured-projects__header">
            <svg class="icon-blue" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m18 16 4-4-4-4"/><path d="m6 8-4 4 4 4"/><path d="m14.5 4-5 16"/></svg>
            <h2 id="projects-heading">Featured Projects</h2>
        </div>

        <div class="projects-grid">
            <?php if ( $projects_query->have_posts() ) : while ( $projects_query->have_posts() ) : $projects_query->the_post(); 
                $card_tags = get_field('project_card_tags');
            ?>
                <article class="project-card">
                    <div class="project-card__content">
                        <h3 class="project-card__title">
                            <a href="<?php the_permalink(); ?>" class="project-card__link">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <p class="project-card__description">
                            <?php echo get_the_excerpt(); ?>
                        </p>
                        
                        <?php if($card_tags): ?>
                            <ul aria-label="Technologies used" class="project-card__tags">
                                <?php 
                                $tags_array = explode(',', $card_tags);
                                foreach($tags_array as $tag): ?>
                                    <li><?php echo esc_html(trim($tag)); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <!-- Paginacja -->
        <?php 
        $total_pages = $projects_query->max_num_pages;
        if ($total_pages > 1): ?>
            <nav class="projects-pagination" aria-label="Projects pagination">
                <?php
                echo paginate_links(array(
                    'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                    'format'    => '?paged=%#%',
                    'current'   => max(1, get_query_var('paged')),
                    'total'     => $total_pages,
                    'prev_text' => '&larr; Prev',
                    'next_text' => 'Next &rarr;',
                ));
                ?>
            </nav>
        <?php endif; ?>

        <?php wp_reset_postdata(); else : ?>
            <p class="text-white">No projects found.</p>
        <?php endif; ?>
        
    </div>
</section>