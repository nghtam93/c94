<?php
/**
 * Template Name: Page Fund
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
get_header(); ?>
<?php while ( have_posts() ) : the_post();
$icon = get_field('icon');
?>
<div class="wrap__page">
  <section class="home-fund">
    <div class="container">
      <header class="sc__header">
        <h1 class="sc__header__title"><?php echo wp_get_attachment_image( $icon, array('32', '32') ); ?><?php the_title(); ?></h1>
        <div class="sc__header__sub"><?php the_field('sub') ?></div>
      </header>
      <?php
      if( have_rows('items') ):?>
          <div class="row justify-content-center">
              <?php while( have_rows('items') ) : the_row();
                $image = get_sub_field('image');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $link = get_sub_field('link');
                ?>
                <div class="col-md-6 col-lg-4 d-md-flex">
                  <div class="el__item ef--zoomin">
                    <a href="<?php echo $link ?>" class="el__item__wrap" target="_blank">
                      <div class="el__item__thumb">
                        <div class="dnfix__thumb">
                          <?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>
                        </div>
                      </div>
                      <div class="el__item__meta">
                        <h3 class="el__item__title"><?php echo $title ?></h3>
                        <div class="el__item__excerpt"><?php echo $content ?></div>
                      </div>
                    </a>
                  </div>
                </div>
              <?php endwhile; ?>
          </div>
      <?php else :
        get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>
    </div>
  </section>
</div>
<?php endwhile; ?>

<?php get_footer();