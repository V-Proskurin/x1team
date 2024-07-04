<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.3.0
 */
$current_user = wp_get_current_user();
if( $current_user->exists() ){
	// Авторизован.

  $user_login =  $current_user->user_login;
  $user_email =  $current_user->user_email;
  $user_firstname =  $current_user->user_firstname;
  $user_lastname =  $current_user->user_lastname;
  $user_display_name =  $current_user->display_name;
  $user_id =  $current_user->ID;

}
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/safari-pinned-tab.svg" color="#0d6efd">
  <link rel='stylesheet' href="<?php echo get_template_directory_uri() ?>/style.css">
  <script src="<?php echo get_template_directory_uri() ?>/assets/app.js" defer></script>
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <?php wp_head(); ?>
</head>

<body <?php body_class("body-register"); ?>>
<div class="woocommerce-mini-cart"></div>

<?php wp_body_open(); ?>
    <header class="header py-md-2 pt-lg-3">
        <div class="navbar navbar-expand-lg absolute-top py-0 rounded">
          <div class="container align-items-center justify-content-md-end justify-content-start pt-md-1 py-2 bg-white mb-md-2"><a class="navbar-brand order-0 p-0 me-md-4 me-1" href="https://x1team.ru"><img class="logo" src="https://x1team.ru/wp-content/uploads/2023/01/logo.png" alt="logo"></a>
            <button class="navbar-toggler order-1 ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarMenu" aria-controls="offcanvasNavbarMenu" aria-expanded="false" aria-label="Переключатель навигации"><span class="navbar-toggler-icon"></span></button>
            <form class="d-flex flex-md-fill align-items-center justify-content-lg-center justify-content-md-end justify-content-center flex-wrap flex-lg-grow-0 flex-grow-1 order-0 order-lg-1 gap-md-4 me-lg-0">
              <!--<button class="btn btn-primary rounded-pill btn-md btn-mobile d-md-block d-none" type="button"> -->
              <!--  <svg class="bi bi-telegram me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
              <!--    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"> </path>-->
              <!--  </svg>Войти как Виктор</button>-->

              <?php
              if( ! $current_user->exists() ){
                if ( function_exists( 'wptelegram_login' ) ) {
                    wptelegram_login();
                }
              ?>
                <a class="d-lg-block d-none" href="/my-account/">Войти</a>
              <?php
                } else {
                  ?>
                    <a class="d-lg-block d-none" href="/my-account/"><?php echo $user_login ?></a>
                  <?php
                }
              ?>
              <div class="navbar-contact d-flex align-items-center gap-md-3 gap-2">
                  <div class="phone">
                        <a href="tel:+79261605204" class="d-flex flex-nowrap align-items-center gap-2">
                            <svg class="bi bi-telephone" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                              <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                            </svg>
                            <span class="d-lg-block d-none">+7 926 160 5204</span>
                        </a>
                  </div>
                  <div class="email"><a href="#">
                      <svg class="bi bi-envelope" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                      </svg></a></div>
                  <div class="basket d-md-block d-none pe-lg-0 pe-3"><a class="ms-md-0 ms-4" href="/cart/">
                    <svg width="16" height="16" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.08337 9.5C3.44171 9.5 2.92254 10.025 2.92254 10.6667C2.92254 11.3083 3.44171 11.8333 4.08337 11.8333C4.72504 11.8333 5.25004 11.3083 5.25004 10.6667C5.25004 10.025 4.72504 9.5 4.08337 9.5ZM0.583374 0.166672V1.33334H1.75004L3.85004 5.76084L3.06254 7.19C2.96921 7.35334 2.91671 7.54584 2.91671 7.75C2.91671 8.39167 3.44171 8.91667 4.08337 8.91667H11.0834V7.75H4.32837C4.24671 7.75 4.18254 7.68584 4.18254 7.60417L4.20004 7.53417L4.72504 6.58334H9.07087C9.50837 6.58334 9.89337 6.34417 10.0917 5.9825L12.18 2.19667C12.2267 2.11501 12.25 2.01584 12.25 1.91667C12.25 1.59584 11.9875 1.33334 11.6667 1.33334H3.03921L2.49087 0.166672H0.583374ZM9.91671 9.5C9.27504 9.5 8.75587 10.025 8.75587 10.6667C8.75587 11.3083 9.27504 11.8333 9.91671 11.8333C10.5584 11.8333 11.0834 11.3083 11.0834 10.6667C11.0834 10.025 10.5584 9.5 9.91671 9.5Z" fill="currentColor"/>
                    </svg><span class="ps-2">0</span></a></div>
              </div>
            </form>
            <div class="offcanvas offcanvas-start text-bg-white" id="offcanvasNavbarMenu" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <div class="offcanvas-title"> <a class="logo" href="https://x1team.ru"><img src="https://x1team.ru/wp-content/uploads/2023/01/logo.png" alt="logo"></a></div>
                <div class="d-flex align-items-end gap-3">
                  <div class="email"><a href="#">
                      <svg class="bi bi-envelope" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                      </svg></a></div>
                  <div class="basket"><a href="/cart/">
                    <svg width="16" height="16" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.08337 9.5C3.44171 9.5 2.92254 10.025 2.92254 10.6667C2.92254 11.3083 3.44171 11.8333 4.08337 11.8333C4.72504 11.8333 5.25004 11.3083 5.25004 10.6667C5.25004 10.025 4.72504 9.5 4.08337 9.5ZM0.583374 0.166672V1.33334H1.75004L3.85004 5.76084L3.06254 7.19C2.96921 7.35334 2.91671 7.54584 2.91671 7.75C2.91671 8.39167 3.44171 8.91667 4.08337 8.91667H11.0834V7.75H4.32837C4.24671 7.75 4.18254 7.68584 4.18254 7.60417L4.20004 7.53417L4.72504 6.58334H9.07087C9.50837 6.58334 9.89337 6.34417 10.0917 5.9825L12.18 2.19667C12.2267 2.11501 12.25 2.01584 12.25 1.91667C12.25 1.59584 11.9875 1.33334 11.6667 1.33334H3.03921L2.49087 0.166672H0.583374ZM9.91671 9.5C9.27504 9.5 8.75587 10.025 8.75587 10.6667C8.75587 11.3083 9.27504 11.8333 9.91671 11.8333C10.5584 11.8333 11.0834 11.3083 11.0834 10.6667C11.0834 10.025 10.5584 9.5 9.91671 9.5Z" fill="currentColor"/>
                    </svg></a><span class="ps-2">0</span></div>
                </div>
                <button class="btn-close btn-close-dark" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mt-lg-0 mt-3">
                  <li class="nav-item"> <a class="nav-link" href="/shop/">Каталог</a></li>
                  <li class="nav-item"><a class="nav-link" href="/blockly/">Blockly</a></li>
                  <li class="nav-item"><a class="nav-link" href="/unity/">Unity</a></li>
                  <li class="nav-item d-lg-none d-block"> <a class="nav-link" href="/my-account/">Войти</a></li>
                </ul>
                <div class="phone d-lg-none d-inline-block">
                  <a href="tel:+79261605204">
                    <svg class="bi bi-telephone me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                    </svg><span>+7 926 160 5204</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </header>