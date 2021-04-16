<?php 
    
    /*  Archive to Posts

    */

    get_header();

?>


    <main class="site-main">


        <section class="site-section">
            <div class="container">

                <h1><?php post_type_archive_title(); ?></h1>

                <div class="blog-list">

                    <?php

                    if ( have_posts() ) :
                        while( have_posts() ) :
                            the_post();

                    ?>

                    <div>
                        <div class="image">
                            <img src="" alt="">
                        </div>

                        <h3><?php the_title(); ?></h3>
                        <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'd F Y' ); ?></time>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="button">read more</a>
                    </div>

                    <?php endwhile; ?>

                    <?php else : ?>

                    <p>Oops! It looks like there aren't any posts right now.</p>

                    <?php endif; ?>
                    
                </div>

                <div class="blog-sidebar">
                    <?php get_sidebar(); ?>
                </div>
                
            </div>
        </section>


    </main>
    

<?php get_footer(); ?>
