<?php
/**
 * Szablon: single-project.php
 */

get_header();

$title = get_the_title();
$excerpt = get_the_excerpt();
$archive_link = get_post_type_archive_link('project');

$tech_frontend = get_field('tech_frontend');
$tech_architecture = get_field('tech_architecture');
$tech_backend = get_field('tech_backend');

$challenge = get_field('project_challenge');
$solution = get_field('project_solution');

$code_title = get_field('code_title');
$code_desc = get_field('code_description');
$code_filename = get_field('code_filename');
$code_snippet = get_field('code_snippet');

$image_1 = get_field('project_image_1');
$image_2 = get_field('project_image_2');
$image_3 = get_field('project_image_3');
$image_4 = get_field('project_image_4');
?>

<main id="main-content" tabindex="-1" class="container">
    <article class="project-container">

        <header class="project-header">
            <a href="<?php echo home_url(); ?>" class="back-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="m12 19-7-7 7-7" />
                    <path d="M19 12H5" />
                </svg>
                Back to Portfolio
            </a>
            <h1 class="project-title"><?php echo esc_html($title); ?></h1>
            <?php if ($excerpt): ?>
                <p class="project-excerpt"><?php echo wp_kses_post($excerpt); ?></p>
            <?php endif; ?>
        </header>

        <?php if ($image_1 || $image_2 || $image_3 || $image_4): ?>
            <section aria-labelledby="project-gallery" class="project-gallery-section">
                <div class="project-gallery-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                        <circle cx="9" cy="9" r="2" />
                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                    </svg>
                    <h2 id="project-gallery" class="section-title title-reset">Project Gallery</h2>
                </div>

                <div class="project-gallery-grid">
                    <?php if ($image_1): ?>
                        <div class="gallery-item">
                            <img src="<?php echo esc_url($image_1['sizes']['large']); ?>"
                                alt="<?php echo esc_attr($image_1['alt'] ? $image_1['alt'] : get_the_title()); ?>" loading="lazy" />
                        </div>
                    <?php endif; ?>

                    <?php if ($image_2): ?>
                        <div class="gallery-item">
                            <img src="<?php echo esc_url($image_2['sizes']['large']); ?>"
                                alt="<?php echo esc_attr($image_2['alt'] ? $image_2['alt'] : get_the_title()); ?>" loading="lazy" />
                        </div>
                    <?php endif; ?>

                    <?php if ($image_3): ?>
                        <div class="gallery-item">
                            <img src="<?php echo esc_url($image_3['sizes']['large']); ?>"
                                alt="<?php echo esc_attr($image_3['alt'] ? $image_3['alt'] : get_the_title()); ?>" loading="lazy" />
                        </div>
                    <?php endif; ?>
                    <?php if ($image_4): ?>
                        <div class="gallery-item">
                            <img src="<?php echo esc_url($image_4['sizes']['large']); ?>"
                                alt="<?php echo esc_attr($image_4['alt'] ? $image_4['alt'] : get_the_title()); ?>" loading="lazy" />
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
        <section aria-labelledby="tech-overview" class="tech-overview">
            <h2 id="tech-overview" class="section-title border-bottom">Technical Overview</h2>
            <div class="tech-grid">
                <div class="tech-col">
                    <div class="tech-col-header">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            aria-hidden="true">
                            <path
                                d="M18 5.33A2.67 2.67 0 0 0 15.33 3H8.67A2.67 2.67 0 0 0 6 5.33v13.34A2.67 2.67 0 0 0 8.67 21h6.66A2.67 2.67 0 0 0 18 18.67z" />
                            <path d="M12 17h.01" />
                            <path d="M8 8h8" />
                        </svg>
                        <h3>Frontend</h3>
                    </div>
                    <ul class="tech-list">
                        <?php
                        if ($tech_frontend) {
                            $items = explode("\n", trim($tech_frontend));
                            foreach ($items as $item) {
                                if (trim($item))
                                    echo '<li>' . esc_html(trim($item)) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="tech-col">
                    <div class="tech-col-header">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            aria-hidden="true">
                            <polygon points="12 2 2 7 12 12 22 7 12 2" />
                            <polyline points="2 17 12 22 22 17" />
                            <polyline points="2 12 12 17 22 12" />
                        </svg>
                        <h3>Architecture</h3>
                    </div>
                    <ul class="tech-list">
                        <?php
                        if ($tech_architecture) {
                            $items = explode("\n", trim($tech_architecture));
                            foreach ($items as $item) {
                                if (trim($item))
                                    echo '<li>' . esc_html(trim($item)) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="tech-col">
                    <div class="tech-col-header">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            aria-hidden="true">
                            <rect width="20" height="8" x="2" y="2" rx="2" ry="2" />
                            <rect width="20" height="8" x="2" y="14" rx="2" ry="2" />
                            <line x1="6" x2="6.01" y1="6" y2="6" />
                            <line x1="6" x2="6.01" y1="18" y2="18" />
                        </svg>
                        <h3>Backend APIs</h3>
                    </div>
                    <ul class="tech-list">
                        <?php
                        if ($tech_backend) {
                            $items = explode("\n", trim($tech_backend));
                            foreach ($items as $item) {
                                if (trim($item))
                                    echo '<li>' . esc_html(trim($item)) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </section>

        <div class="content-grid">
            <section aria-labelledby="the-challenge">
                <div class="content-header icon-amber">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z" />
                        <path d="M12 9v4" />
                        <path d="M12 17h.01" />
                    </svg>
                    <h2 id="the-challenge" class="section-title title-reset text-white">The Challenge</h2>
                </div>
                <div class="wysiwyg-content">
                    <?php echo wp_kses_post($challenge); ?>
                </div>
            </section>

            <section aria-labelledby="the-solution">
                <div class="content-header icon-blue">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                        <path d="m9 11 3 3L22 4" />
                    </svg>
                    <h2 id="the-solution" class="section-title title-reset text-white">The Solution</h2>
                </div>
                <div class="wysiwyg-content solution-content">
                    <?php echo wp_kses_post($solution); ?>
                </div>
            </section>
        </div>

        <?php if (!empty($code_snippet)): ?>
            <section aria-labelledby="code-implementation" class="code-section">
                <h2 id="code-implementation" class="section-title"><?php echo esc_html($code_title); ?></h2>
                <?php if ($code_desc): ?>
                    <p class="code-desc"><?php echo esc_html($code_desc); ?></p>
                <?php endif; ?>
                <div class="code-window">
                    <div class="code-header">
                        <div class="mac-dots">
                            <div class="mac-dot dot-red"></div>
                            <div class="mac-dot dot-amber"></div>
                            <div class="mac-dot dot-green"></div>
                        </div>
                        <span class="code-filename"><?php echo esc_html($code_filename); ?></span>
                    </div>
                    <pre class="code-block" tabindex="0"><code><?php echo esc_html($code_snippet); ?></code></pre>
                </div>
            </section>
        <?php endif; ?>

    </article>
</main>

<?php get_footer(); ?>