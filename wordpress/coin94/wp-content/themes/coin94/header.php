<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <div class="header__top text-center">
      <div class="container">
        <?php dntheme_logo(); ?>
      </div>
    </div>
    <header class="header -fix" data-toggle="sticky-onscroll">
      <div class="container">
        <div class="header__wrap d-flex align-items-center justify-content-lg-center">
          <div class="d-lg-none d-lg-none">
            <div class="menu-mb__btn" data-id="menu__mobile">
              <span class="iconz-bar"></span>
              <span class="iconz-bar"></span>
              <span class="iconz-bar"></span>
            </div>
          </div>
          <nav class="main__nav d-none d-lg-block">
            <?php
              wp_nav_menu(
              array(
                 'theme_location'  => 'primary',
                 'container'       => 'ul',
                 'container_class' => '',
                 'menu_id'         => '',
                 'menu_class'      => 'el__menu',
              ));
            ?>
          </nav>
          <div class="logo--mb d-lg-none">
            <a href="<?php echo site_url() ?>" class="d-flex justify-content-center">
              <?php
              $logo_img = get_field('logo', 'option');
              echo wp_get_attachment_image( $logo_img, 'full' ); ?>
            </a>
          </div>

          <div class="header__right">
            <div class="header__search me-2">
              <button class="header__search--toggle">
                <span class="icon-search"></span>
              </button>
              <div class="header__search__form">
                <?php get_search_form() ?>
              </div>
            </div>

            <div class="sidebarRight__btn js-sidebarRight" data-id="sidebarRight"><span class="icon-ep_menu"></span></div>
          </div>
        </div>
      </div>
    </header>

    <div class="wrapper">