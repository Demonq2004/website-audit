<?php
$args = array(
    'post_type'      => 'team_member',
    'posts_per_page' => -1,
    'order'          => 'ASC',
    'orderby'        => 'title'
);
$team_query = new WP_Query($args);
?>

<section class="audit-team-section" aria-labelledby="developers-heading">
    <div class="audit-team-header">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
        <h2 id="developers-heading">Meet the Team</h2>
    </div>
    
    <div class="audit-team-grid">
        <?php if ($team_query->have_posts()) : while ($team_query->have_posts()) : $team_query->the_post(); 
            
            $role     = get_field('role');
            $github   = get_field('github');
            $linkedin = get_field('linkedin');
            $twitter  = get_field('twitter');
            $bio      = wp_strip_all_tags(get_the_content());
            $skills   = get_the_terms(get_the_ID(), 'technology');
        ?>
            
            <article class="audit-team-card">
                <div class="audit-card-top">
                    <div class="audit-card-image-wrapper">
                        <?php 
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('medium', array(
                                'class' => 'audit-card-image',
                                'alt'   => 'Portrait of ' . get_the_title()
                            ));
                        } else {
                            echo '<div class="audit-card-image-fallback"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div>';
                        }
                        ?>
                    </div>
                    
                    <div class="audit-card-info">
                        <h3><?php the_title(); ?></h3>
                        
                        <?php if ($role): ?>
                            <p class="audit-card-role"><?php echo esc_html($role); ?></p>
                        <?php endif; ?>
                        
                        <div class="audit-card-socials">
                            <?php if ($github): ?>
                                <a href="<?php echo esc_url($github); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php the_title(); ?>'s GitHub Profile (opens in a new tab)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"></path><path d="M9 18c-4.51 2-5-2-7-2"></path></svg>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ($linkedin): ?>
                                <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php the_title(); ?>'s LinkedIn Profile (opens in a new tab)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ($twitter): ?>
                                <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php the_title(); ?>'s Twitter Profile (opens in a new tab)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path></svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <p class="audit-card-bio">
                    <?php echo esc_html($bio); ?>
                </p>

                <div class="audit-card-expertise">
                    <h4>Expertise</h4>
                    <ul>
                        <?php 
                        if ($skills && !is_wp_error($skills)) : 
                            foreach ($skills as $skill) : ?>
                                <li><?php echo esc_html($skill->name); ?></li>
                            <?php endforeach; 
                        endif; 
                        ?>
                    </ul>
                </div>
            </article>

        <?php 
            endwhile; 
            wp_reset_postdata();
        endif; 
        ?>
    </div>
</section>