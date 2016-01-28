<?php
/*
Template name: FBR kampanje med bilde
*/

get_header();
?>

<div class="main contentfield">
    <div class="parent">
        <div class="headerimage"></div>
        <div class="frontpage-nav-wrapper">
            <?php
                if (has_post_thumbnail()) {
                    $imgID = get_post_thumbnail_id($post->ID);
                    $featuredImage = cl_wp_get_attachment_image_src($imgID, 'full' );
                    $imgURL = $featuredImage[0];
            ?>
                    <style type="text/css">
                        .headerimage {
                            background-image:url('<?php echo $imgURL ?>');
                        }
                    </style>
            <?php
                } // end If
            ?>

            <?php if ( have_posts() ) {
                while ( have_posts() ) { ?>
                    <div class="topheader">
                        <h1><?php the_title(); ?></h1>
                        <h3 class="m-b-15">
                            <?php
                                $subheader = CFS()->get('subheader');
                                if ($subheader != '') {
                                    echo $subheader;
                                }
                            ?>
                        </h3>
                        <hr class="short-hr">
                    </div>
            <?php
                    the_post();
                    $thispage=$post->ID;
                } // end while
            } // end if
            ?>
        </div>
    </div>

    <div class="parent-content">
        <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
        ?>
                    <div class="ingressteksten ingresscenter">
                        <?php
                            $ingressteksten = CFS()->get('ingress');
                            if ($ingressteksten != '') {
                                echo $ingressteksten;
                            }
                        ?>
                    </div>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
        <?php
                } // end while
            } // end if
        ?>
    </div>

    <div class="related">
        <?php
            $loop = new WP_Query();
            while ( $loop->have_posts() ) : $loop->the_post();?>

            <?php endwhile;
            wp_reset_query();
        ?>
        <?php
            $r_lat = CFS()->get('relaterte_saker');
            if ($r_lat != '') {
        ?>
            <section class="pressemeldinger vimener p-0-20">
                <?php
                    $used_post_id = array();
                    $values = CFS()->get('relaterte_saker');
                    if ($values != '') {
                        foreach ($values as $post_id) {
                ?>
                <div class="child">
                    <a href="<?php echo get_permalink($post_id) ?>">
                        <?php $image = wp_get_attachment_url( get_post_thumbnail_id($post_id)); ?>
                        <img src="<?php echo $image ?>">
                        <h3><?php echo get_the_title( $post_id ) ?></h3>
                        <p>
                            <?php $ingressteksten = CFS()->get('ingress', $post_id);
                                if ($ingressteksten != '') {
                                    echo $ingressteksten;
                                }
                            ?>
                        </p>
                        <div class="les_mer">Les hele saken</div>
                    </a>                        
                </div>
                <?php
                        } // end foreach
                    } // end if
                ?>
            </section>
        
        <?php
            } // end if
            else {
                NULL;
            }
        ?>
        <div class="clear"></div>
    </div> <!-- end related -->
    <section class="p-0-20">
        <?php
            $article_content = $cfs->get('innhold');
            if ($article_content != '') {
        ?>
                <div class="wig-content"><?php echo $article_content ?></div>
        <?php
            } // end if
        ?>
    </section>
    </div>
</div>

<?php get_footer(); ?>
