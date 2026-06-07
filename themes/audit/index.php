<?php get_header(); ?>

<?php if ( is_front_page() || is_home() ) : ?>
    <section class="hero-section">
        <div class="hero-container">
            <h1 class="hero-title">Coding with <br><span class="highlight">Accessibility</span></h1>
            
            <p class="hero-description">
                I build robust, inclusive web applications. Because the web is for everyone, and great engineering means leaving no user behind.
            </p>
            
            <div class="hero-buttons">
                <a href="#" class="btn btn-primary">View Featured Work &rarr;</a>
                <a href="#" class="btn btn-secondary">Read the Blog</a>
            </div>
        </div>
    </section>
    <?php endif; ?>

<main class="site-main">
    <div class="container">
        
        <?php if ( have_posts() ) : ?>
            
            <div class="posts-list">
                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        
                        <div class="post-meta">
                            Opublikowano: <?php echo get_the_date(); ?> przez <?php the_author(); ?>
                        </div>
                        
                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>

                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>

        <?php else : ?>
            <p>Nie znaleziono żadnych wpisów.</p>
        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>