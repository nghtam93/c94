<?php
/**
 * Template Name: Page Home
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
<?php while ( have_posts() ) : the_post(); ?>

  <section class="home-new">
    <div class="container">
    <?php
    $htmlbig = '';
    $htmlmedium = '';
    $htmlmedium2 = '';
    $htmlsmall = '';

    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 7,
    );
    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) : $i=0; ?>
      <div class="row">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++; ?>

        <?php if($i == 1): ob_start();?>
          <div class="el__item -large ef--zoomin">
            <a href="<?php the_permalink(); ?>" class="el__item__wrap">
              <div class="el__item__thumb">
                <div class="dnfix__thumb">
                  <?php the_post_thumbnail('large',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                </div>
              </div>
              <div class="el__item__meta">
                <div class="el__item__date"><?php echo get_the_time("d/m/Y"); ?></div>
                <h3 class="el__item__title text__truncate -n2"><?php the_title() ?></h3>
              </div>
            </a>
          </div>
        <?php $htmlbig .= ob_get_clean(); endif; ?>

        <?php if($i == 2 || $i == 3): ob_start();?>
          <div class="el__item -medium ef--zoomin">
            <a href="<?php the_permalink(); ?>" class="el__item__wrap">
              <div class="el__item__thumb">
                <div class="dnfix__thumb">
                  <?php the_post_thumbnail('thumbnail',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                </div>
              </div>
              <div class="el__item__meta">
                <div class="el__item__date"><?php echo get_the_time("d/m/Y"); ?></div>
                <h3 class="el__item__title text__truncate -n2"><?php the_title() ?></h3>
              </div>
            </a>
          </div>
        <?php $htmlmedium .= ob_get_clean(); endif; ?>

        <?php if($i == 4 || $i == 5): ob_start();?>
          <div class="el__item -medium ef--zoomin">
            <a href="<?php the_permalink(); ?>" class="el__item__wrap">
              <div class="el__item__thumb">
                <div class="dnfix__thumb">
                  <?php the_post_thumbnail('thumbnail',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                </div>
              </div>
              <div class="el__item__meta">
                <div class="el__item__date"><?php echo get_the_time("d/m/Y"); ?></div>
                <h3 class="el__item__title text__truncate -n2"><?php the_title() ?></h3>
              </div>
            </a>
          </div>
        <?php $htmlmedium2 .= ob_get_clean(); endif; ?>

        <?php if($i == 6 || $i == 7): ob_start();?>
          <div class="col-md-6">
            <div class="el__item">
              <a href="blog-detail.html" class="el__item__wrap">
                <div class="el__item__meta">
                  <div class="el__item__date"><?php echo get_the_time("d/m/Y"); ?></div>
                  <h3 class="el__item__title text__truncate -n2"><?php the_title() ?></h3>
                </div>
              </a>
            </div>
          </div>
        <?php $htmlsmall .= ob_get_clean(); endif; ?>

      <?php endwhile;?>

          <div class="col-lg-6 order-md-1 order-lg-2"><?= $htmlbig ?></div>
          <div class="col-md-6 col-lg-3 order-md-2 order-lg-1">
            <?= $htmlmedium ?>
          </div>
          <div class="col-md-6 col-lg-3 order-md-3">
            <?= $htmlmedium2 ?>
          </div>
          <div class="home-new__fix col-lg-6 offset-lg-3 order-md-4">
            <div class="row">
              <?= $htmlsmall ?>
            </div>
          </div>
      </div>
      <?php
      wp_reset_postdata();
    else :
      get_template_part( 'template-parts/content', 'none' );
    endif; ?>
      </div>
  </section>

  <div class="container"><hr></div>

  <?php $home_newcat = get_field('home_newcat');
  if($home_newcat):
  ?>
    <section class="home-news1">
      <div class="container">
        <header class="sc__header d-flex align-items-center">
          <h2 class="sc__header__title"><img src="<?php echo get_theme_file_uri('assets/img/home-new-icon-01.png') ?>" alt=""><?php echo $home_newcat->name ?></h2>
          <a href="<?php echo get_category_link($home_newcat) ?>" class="sc__header__readmore ms-auto d-none d-sm-block">Xem thêm</a>
        </header>
          <?php
          $htmlbig = '';
          $htmlmedium = '';
          $htmlmedium2 = '';
          $htmlsmall = '';

          $args = array(
            'post_type' => 'post',
            'posts_per_page' => 6,
            'cat_id' =>$home_newcat
          );
          $the_query = new WP_Query( $args );

          if ( $the_query->have_posts() ) : $i=0; ?>
            <div class="row">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++; ?>

              <?php if($i == 1): ob_start();?>
                <div class="el__item -s1 ef--zoomin">
                  <a href="<?php the_permalink(); ?>" class="el__item__wrap row">
                    <div class="el__item__thumb col-sm-4 col-lg-12">
                      <div class="dnfix__thumb">
                        <?php the_post_thumbnail('thumbnail',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                      </div>
                    </div>
                    <div class="el__item__meta col-sm-8 col-lg-12">
                      <div class="d-flex align-items-center mb-3">
                        <div class="el__item__tax">Tin tức</div>
                        <div class="el__item__date"><?php echo get_the_time("d/m/Y"); ?></div>
                      </div>
                      <h3 class="el__item__title text__truncate -n3"><?php the_title() ?></h3>
                    </div>
                  </a>
                </div>
              <?php $htmlbig .= ob_get_clean(); endif; ?>

              <?php if($i == 2 || $i == 3): ob_start();?>
                <div class="el__item -s2 ef--zoomin">
                  <a href="blog-detail.html" class="el__item__wrap">
                    <div class="row">
                      <div class="col-sm-4 col-lg-8">
                        <div class="el__item__thumb">
                          <div class="dnfix__thumb">
                            <?php the_post_thumbnail('large',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8 col-lg-4">
                        <div class="el__item__meta">
                          <div class="d-flex flex-wrap align-items-center mb-3">
                            <div class="el__item__tax">Kiến thức thị trường</div>
                            <div class="el__item__date"><?php echo get_the_time("d/m/Y"); ?></div>
                          </div>
                          <h3 class="el__item__title text__truncate -n3"><?php the_title() ?></h3>
                          <div class="el__item__excerpt text__truncate -n6"><?php dn_excerpt(250); ?></div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              <?php $htmlmedium .= ob_get_clean(); endif; ?>

              <?php if($i == 4): ob_start();?>
                <div class="el__item -s3 ef--zoomin">
                  <a href="blog-detail.html" class="el__item__wrap">
                    <div class="row">
                      <div class="col-sm-4 col-lg-6">
                        <div class="el__item__thumb">
                          <div class="dnfix__thumb">
                            <?php the_post_thumbnail('thumbnail',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8 col-lg-6">
                        <div class="el__item__meta">
                          <div class="d-flex align-items-center mb-3">
                            <div class="el__item__tax">Tin tức</div>
                            <div class="el__item__date"><?php echo get_the_time("d/m/Y"); ?></div>
                          </div>
                          <h3 class="el__item__title text__truncate -n3"><?php the_title() ?></h3>
                          <div class="el__item__excerpt text__truncate -n8"><?php dn_excerpt(250); ?></div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              <?php $htmlmedium2 .= ob_get_clean(); endif; ?>

              <?php if($i == 5 || $i == 6): ob_start();?>
                <div class="col-lg-6">
                  <div class="el__item -s4 ef--zoomin">
                    <a href="blog-detail.html" class="el__item__wrap row">
                      <div class="el__item__thumb col-sm-4 col-lg-12">
                        <div class="dnfix__thumb">
                          <?php the_post_thumbnail('thumbnail',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                        </div>
                      </div>
                      <div class="el__item__meta col-sm-8 col-lg-12">
                        <div class="d-flex align-items-center mb-3">
                          <div class="el__item__tax">Hướng dẫn</div>
                          <div class="el__item__date"><?php echo get_the_time("d/m/Y"); ?></div>
                        </div>
                        <h3 class="el__item__title text__truncate -n3"><?php the_title() ?></h3>
                      </div>
                    </a>
                  </div>
                </div>
              <?php $htmlsmall .= ob_get_clean(); endif; ?>

            <?php endwhile;?>
                <div class="col-lg-3"><?= $htmlbig ?></div>
                <div class="col-lg-9"><?= $htmlmedium ?></div>
                <div class="col-lg-6"><?= $htmlmedium2 ?></div>
                <div class="col-lg-6">
                  <div class="row">
                    <?= $htmlsmall ?>
                  </div>
                </div>
            </div>
            <a href="blog.html" class="sc__header__readmore ms-auto d-sm-none">Xem thêm</a>
            <?php
            wp_reset_postdata();
          else :
            get_template_part( 'template-parts/content', 'none' );
          endif; ?>
        </div>
    </section>
  <?php endif; ?>

  <div class="container"><hr></div>

  <section class="home-mission">
    <div class="container">
        <div class="el__text"><?php the_field('mission_sub') ?></div>
        <?php
        if( have_rows('mission_items') ):?>
            <div class="row">
                <?php while( have_rows('mission_items') ) : the_row();
                  $image = get_sub_field('image');
                  $title = get_sub_field('title');
                  $content = get_sub_field('content');
                  ?>
                  <div class="col-md-6 d-flex">
                    <div class="el__item -s1">
                      <div class="el__item__thumb">
                        <div class="dnfix__thumb -contain">
                          <?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>
                        </div>
                      </div>
                      <div class="el__item__meta">
                        <h3 class="el__item__title"><?php echo $title ?></h3>
                        <div class="el__item__excerpt"><?php echo $content ?></div>
                      </div>
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

  <section class="home-service">
    <div class="container">
      <header class="sc__header">
        <h2 class="sc__header__title">
          <?php
          $service_icon = get_field('service_icon');
          if($service_icon) echo wp_get_attachment_image( $service_icon, array('32', '32') ); ?>
          <?php the_field('service_title'); ?></h2>
        <div class="sc__header__sub"><?php the_field('service_sub'); ?></div>
      </header>

      <?php
        $service_image = get_field('service_image');
        if( have_rows('service_items') ):?>
            <div class="row">
                <div class="el__col col-md-6 col-lg-3 mb-4">
                    <div class="el__thumb dnfix__thumb">
                        <?php echo wp_get_attachment_image( $service_image, 'thumbnail' ); ?>
                    </div>
                </div>
                <?php while( have_rows('service_items') ) : the_row();
                  $image = get_sub_field('image');
                  $title = get_sub_field('title');
                  $content = get_sub_field('content');
                  ?>
                  <div class="el__col col-md-6 col-lg-3">
                    <div class="el__item">
                      <div class="el__item__header">
                        <div class="el__item__thumb dnfix__thumb -contain">
                          <?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>
                        </div>
                        <h3 class="el__item__title"><?php echo $title ?></h3>
                      </div>
                      <div class="el__item__excerpt"><?php echo $content ?></div>
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

  <?php
  $banner_1 = get_field('banner_1');
  $banner_2 = get_field('banner_2');
  if($banner_1 || $banner_2):
  ?>
    <section class="home-bannez">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div class="el__item__thumb -s1 ef--shine">
              <div class="dnfix__thumb">
                <?php echo wp_get_attachment_image( $banner_1, 'full' ); ?>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="el__item__thumb -s2 ef--shine">
              <div class="dnfix__thumb">
                <?php echo wp_get_attachment_image( $banner_2, 'full' ); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php
  $pagedID = get_field('fund_page');
  if($pagedID):
    $icon = get_field('icon',$pagedID );
  ?>
    <section class="home-fund">
      <div class="container">
        <header class="sc__header">
          <h2 class="sc__header__title"><?php echo wp_get_attachment_image( $icon, array('32', '32') ); ?><?php the_field('fund_title' ); ?></h2>
          <div class="sc__header__sub"><?php the_field('sub',$pagedID ) ?></div>
        </header>
        <?php
        if( have_rows('items',$pagedID ) ):?>
            <div class="row justify-content-center">
                <?php while( have_rows('items',$pagedID ) ) : the_row();
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
  <?php endif; ?>

  <?php $home_newcat2 = get_field('home_newcat2');
  if($home_newcat2):
  ?>
    <section class="home-tutorial">
      <div class="container">
        <header class="sc__header d-flex align-items-center">
          <h2 class="sc__header__title"><img src="<?php echo get_theme_file_uri('assets/img/home-new-icon-01.png') ?>" alt=""><?php echo $home_newcat2->name ?></h2>
          <a href="<?php echo get_category_link($home_newcat2) ?>" class="sc__header__readmore ms-auto">Xem thêm</a>
        </header>

        <div class="el__items">
          <?php
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'cat' => $home_newcat2->term_id
          );
          $the_query = new WP_Query( $args ); ?>

          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <div class="el__item ef--shine">
                <div class="row">
                  <div class="col-md-6 order-md-2">
                    <div class="el__item__thumb">
                      <div class="dnfix__thumb">
                        <?php the_post_thumbnail('large',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="el__item__meta">
                      <div class="d-flex align-items-center mb-3">
                        <div class="el__item__tax"><?php echo $home_newcat2->name; ?></div>
                        <div class="el__item__date"><?php echo get_the_time("d/m/Y"); ?></div>
                      </div>
                      <h3 class="el__item__title"><?php the_title() ?></h3>
                      <div class="el__item__excerpt text__truncate -n5"><?php dn_excerpt(250); ?></div>
                      <a href="<?php the_permalink(); ?>" class="el__item__readmore">Đọc tiếp</a>
                    </div>
                  </div>
                </div>
              </div> <!-- item -->
            <?php endwhile;?>
            <?php
            wp_reset_postdata();
          else :
            get_template_part( 'template-parts/content', 'none' );
          endif; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php endwhile; ?>
<?php get_footer();