<?php get_header(); ?>

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