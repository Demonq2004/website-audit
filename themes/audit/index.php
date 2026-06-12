<?php get_header(); ?>

<div class="blog-container">
    <header class="blog-header">
        <h1 class="blog-title">Tech Blog</h1>
        <p class="blog-description">
            Thoughts, tutorials, and deep dives into frontend engineering and inclusive design.
        </p>
    </header>

    <!-- Wyszukiwarka i Filtry Kategori -->
    <section aria-label="Search and filter articles" class="blog-filter-section">
        
        <!-- Formularz wyszukiwania zgodny z WP standard -->
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="search-form">
            <div class="search-wrapper">
                <label htmlFor="search-articles" class="sr-only">Search articles</label>
                <div class="search-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
                <input
                    id="search-articles"
                    type="search"
                    name="s"
                    class="search-input"
                    placeholder="Search by title or keyword..."
                    value="<?php echo get_search_query(); ?>"
                />
                <!-- Ograniczenie wyników wyszukiwania tylko do zwykłych wpisów -->
                <input type="hidden" name="post_type" value="post" />
            </div>
        </form>

        <!-- Filtry kategorii -->
        <div>
            <h2 id="category-filter-heading" class="sr-only">Filter by Category</h2>
            <ul aria-labelledby="category-filter-heading" class="category-list">
                <?php
                // Link do strony głównej bloga (stan "All")
                $blog_page_url = get_permalink(get_option('page_for_posts'));
                $is_all_active = !is_category() ? 'active' : '';
                ?>
                <li>
                    <a href="<?php echo esc_url($blog_page_url); ?>" class="category-button <?php echo $is_all_active; ?>">
                        All
                    </a>
                </li>
                
                <?php
                $categories = get_categories(array('hide_empty' => true));
                foreach ($categories as $category) {
                    $category_link = get_category_link($category->term_id);
                    $active_class = is_category($category->term_id) ? 'active' : '';
                    echo '<li>';
                    echo '<a href="' . esc_url($category_link) . '" class="category-button ' . $active_class . '">';
                    echo esc_html($category->name);
                    echo '</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </section>

    <!-- Rezultaty zapytania -->
    <section aria-live="polite" aria-atomic="true">
        <h2 class="sr-only">Article Results</h2>

        <?php if (have_posts()) : ?>
            <ul class="articles-list">
                <?php while (have_posts()) : the_post(); 
                    // Pobieranie kategorii dla danego wpisu
                    $cats = get_the_category();
                    $cat_name = !empty($cats) ? esc_html($cats[0]->name) : 'General';
                ?>
                    <li>
                        <article class="article-card">
                            <div class="article-card-meta">
                                <div class="meta-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    <time datetime="<?php echo get_the_date('c'); ?>">
                                        <?php echo get_the_date('F d, Y'); ?>
                                    </time>
                                </div>
                                <span aria-hidden="true">•</span>
                                <div class="meta-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                                    <span><?php echo $cat_name; ?></span>
                                </div>
                            </div>
                            
                            <h3 class="article-card-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            
                            <p class="article-card-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>
                        </article>
                    </li>
                <?php endwhile; ?>
            </ul>

            <!-- Paginacja -->
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'mid_size'  => 2,
                    'prev_text' => '&larr; Previous',
                    'next_text' => 'Next &rarr;',
                ));
                ?>
            </div>

        <?php else : ?>
            <div class="no-results-box">
                <p>No articles found matching your criteria.</p>
                <a href="<?php echo esc_url($blog_page_url); ?>" class="clear-filters-btn">
                    Clear filters
                </a>
            </div>
        <?php endif; ?>
    </section>
</div>

<?php get_footer(); ?>