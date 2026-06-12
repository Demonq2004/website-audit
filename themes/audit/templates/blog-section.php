<section class="latest-articles-section" aria-labelledby="articles-heading">
    <div class="section-header">
        <h2 id="articles-heading" class="section-title">
            Latest Articles
        </h2>
        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="all-articles-link">
            All articles
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="arrow-right-icon" aria-hidden="true">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </a>
    </div>

    <ul class="articles-compact-list">
        <?php
        $latest_args = array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'post_status'    => 'publish'
        );
        $latest_query = new WP_Query($latest_args);

        if ($latest_query->have_posts()) :
            while ($latest_query->have_posts()) : $latest_query->the_post(); 
                $categories = get_the_category();
                $category_name = !empty($categories) ? esc_html($categories[0]->name) : 'General';
            ?>
                <li>
                    <article class="compact-article-card">
                        <div class="card-content-wrapper">
                            <h3 class="card-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <div class="card-meta">
                                <time datetime="<?php echo get_the_date('c'); ?>">
                                    <?php echo get_the_date('F d, Y'); ?>
                                </time>
                                <span aria-hidden="true">•</span>
                                <span><?php echo $category_name; ?></span>
                            </div>
                        </div>
                        <div class="card-arrow" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </div>
                    </article>
                </li>
            <?php 
            endwhile;
            wp_reset_postdata();
        else : 
        ?>
            <p style="color: var(--color-description);">No articles found.</p>
        <?php endif; ?>
    </ul>
</section>