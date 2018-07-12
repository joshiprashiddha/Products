<?php
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        // Start the loop.
        while (have_posts()) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php
                    if (is_single()) :
                        the_title('<h1 class="entry-title asdf">', '</h1>');
                    else :
                        the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
                    endif;
                    ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    /* translators: %s: Name of current post */
                    the_content(sprintf(
                                    __('Continue reading %s', 'twentyfifteen'), the_title('<span class="screen-reader-text">', '</span>', false)
                    ));
                    $custom = get_post_custom();
                    echo '<table>';
                    foreach ($custom as $key => $value) {
                        if ($key != '_edit_lock') {
                            echo '<tr>';
                            echo '<td><b>' . str_replace('_', ' ', $key) . '</b></td>';
                            echo '<td>' . get_post_meta(get_the_ID(), $key, true) . ' </td>';
                            echo '</tr>';
                        }
                    }
                    echo '</table>';
                    wp_link_pages(array(
                        'before' => '<div class = "page-links"><span class = "page-links-title">' . __('Pages:', 'twentyfifteen') . '</span>',
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'pagelink' => '<span class = "screen-reader-text">' . __('Page', 'twentyfifteen') . ' </span>%',
                        'separator' => '<span class = "screen-reader-text">, </span>',
                    ));
                    ?>
                </div><!-- .entry-content -->

                <?php
                // Author bio.
                if (is_single() && get_the_author_meta('description')) :
                    get_template_part('author-bio');
                endif;
                ?>

                <footer class="entry-footer">
                    <?php twentyfifteen_entry_meta(); ?>
                    <?php edit_post_link(__('Edit', 'twentyfifteen'), '<span class = "edit-link">', '</span>        '); ?>
                </footer><!-- .entry-footer -->

            </article><!-- #post-## -->
            <?php
        // End the loop.
        endwhile;
        ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>