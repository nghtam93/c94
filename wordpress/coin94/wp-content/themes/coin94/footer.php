<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$logo_img = get_field('logo_footer', 'option');
?>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="footer__logo">
            <a href="<?php echo site_url(); ?>" class="footer__logo">
              <?php echo wp_get_attachment_image( $logo_img, 'full' ); ?>
            </a>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer__item">
            <p class="footer__item__title">Theo dõi chúng tôi tại</p>
            <div class="footer__socical">
              <ul class="">
                <li><a href="<?php the_field('youtube', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/youtube.svg') ?>" alt=""></a></li>
                <li><a href="<?php the_field('facebook', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/facebook.svg') ?>" alt=""></a></li>
                <li><a href="<?php the_field('telegram', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/telegram.svg') ?>" alt=""></a></li>
                <li><a href="<?php the_field('twitter', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/twitter.svg') ?>" alt=""></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="footer-newsletter">
            <div class="footer__item">
              <h3 class="footer__item__title">Nhận tin tức mới nhất</h3>
              <p>Xin chân thành cảm ơn quý khách đã ghé thăm website coin94.<br>Để lại email để nhận tin tức mới nhất của chúng tôi!</p>
              <form method="post" action="<?php echo site_url('?na=s') ?>">
                <input type="hidden" name="nlang" value="">
                <input type="text" name="ne" class="form-control input-text" placeholder="Nhập địa chỉ email">
                <button type="submit" class="input-submit btn form-control"><span>Đăng ký</span></button>
              </form>
            </div>
          </div>

        </div>
      </div>

      <div class="copyright text-center">
          <p><?php the_field('copyright', 'option'); ?></p>
      </div>

    </div>
  </footer>
  <div id="sidebarRight" class="sidebar-menu">
    <div class="sidebar-menu--close js-menu__close"><span class="icon-close"></span></div>
    <div class="sidebar-menu__content">
      <?php dynamic_sidebar( 'blog' ); ?>
    </div>

    <div class="footer__socical">
      <ul class="">
        <li><a href="<?php the_field('youtube', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/youtube.svg') ?>" alt=""></a></li>
        <li><a href="<?php the_field('facebook', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/facebook.svg') ?>" alt=""></a></li>
        <li><a href="<?php the_field('telegram', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/telegram.svg') ?>" alt=""></a></li>
        <li><a href="<?php the_field('twitter', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/twitter.svg') ?>" alt=""></a></li>
      </ul>
    </div>

  </div>
  <nav id="menu__mobile" class="nav__mobile">
      <div class="nav__mobile__content">
        <?php
          wp_nav_menu(
          array(
             'theme_location'  => 'primary',
             'container'       => 'ul',
             'container_class' => '',
             'menu_id'         => '',
             'menu_class'      => 'nav__mobile--ul',
          ));
        ?>

        <div class="footer__item">
          <p class="footer__item__title">Theo dõi chúng tôi tại</p>
          <div class="footer__socical">
            <ul class="">
              <li><a href="<?php the_field('youtube', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/youtube.svg') ?>" alt=""></a></li>
              <li><a href="<?php the_field('facebook', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/facebook.svg') ?>" alt=""></a></li>
              <li><a href="<?php the_field('telegram', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/telegram.svg') ?>" alt=""></a></li>
              <li><a href="<?php the_field('twitter', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/twitter.svg') ?>" alt=""></a></li>
            </ul>
          </div>
        </div>

      </div>
  </nav>
</div> <!-- .wrapper -->
<?php wp_footer(); ?>
</body>
</html>
