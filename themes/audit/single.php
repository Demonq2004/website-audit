<?php get_header(); ?>

<?php
if (!function_exists('get_custom_reading_time')) {
    function get_custom_reading_time($content) {
        $word_count = str_word_count(strip_tags($content));
        $reading_time = ceil($word_count / 200);
        return $reading_time . ' min read';
    }
}

$blog_page_id = get_option('page_for_posts');
$blog_url = $blog_page_id ? get_permalink($blog_page_id) : home_url('/blog');
?>

<main class="single-post-container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); 
        $cats = get_the_category();
        $cat_name = !empty($cats) ? esc_html($cats[0]->name) : 'General';
        $reading_time = get_custom_reading_time(get_the_content());
    ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <a href="<?php echo esc_url($blog_url); ?>" class="back-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Back to all articles
            </a>

            <header class="post-header">
                <h1 class="post-title"><?php the_title(); ?></h1>
                
                <div class="post-meta">
                    <div class="meta-item">
                        <span class="sr-only">Author:</span>
                        <span class="author-name"><?php the_author(); ?></span>
                    </div>
                    
                    <div class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('F d, Y'); ?></time>
                    </div>

                    <div class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        <span><?php echo $reading_time; ?></span>
                    </div>

                    <div class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                        <span><?php echo $cat_name; ?></span>
                    </div>
                </div>
            </header>

            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <footer class="post-footer">
                <div class="cta-box">
                    <div>
                        <h3 class="cta-title">Enjoyed this article?</h3>
                        <p class="cta-desc">Share it with your network or read more on our blog.</p>
                    </div>
                    <a href="<?php echo esc_url($blog_url); ?>" class="cta-button">
                        Read More Articles
                    </a>
                </div>
            </footer>

        </article>

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>