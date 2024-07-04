<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// get_header( 'shop' );

$_product = wc_get_product( get_the_ID() );
$_product_url = get_permalink( $_product->get_id() );
// var_dump($_product);

// var_dump( get_post_meta(get_the_ID()) );
$current_user = wp_get_current_user();
$user_id =  $current_user->ID;

$vendor = false;
$product_vendor = false;
if ( function_exists( 'YITH_Vendors' ) )  {
    $vendor = yith_get_vendor('current', 'user');
    $product_vendor = yith_get_vendor(true, 'product');
}



// $vendor = yith_get_vendor( $user_id, 'user' );
// $vendor_user_id = $vendor->get_owner();

// var_dump($vendor);
// var_dump($vendor_user_id);

?>

<?php
/**
 * Template Name: Single Page Product
 *
 * @package Bootscore
 */


get_header(); // Вставляем заголовок сайта


?>

<?php

$gallery_attachment_ids = $_product->get_gallery_image_ids();
$product_video = get_post_meta( $_product->get_id(), 'product_link_video', true );
$total_count = count( $gallery_attachment_ids );

?>
    <main class="main pb-5">
        <div class="container-sm container-fluid mb-5">
            <div class="row h-100">
                <h1 class="mt-3 d-md-none d-block"><?php echo $_product->get_name() ?> </h1>

                <!-- одинарный слайдер с горизотнальными изображениями - НАЧАЛО -->
                <!--<div class="col-xl-7">-->
                <!--  <div class="row justify-content-center"> -->
                <!--    <div class="slider px-0">-->
                <!--      <div class="swiper slider__image-horizont ms-xl-0">-->
                <!--        <div class="swiper-wrapper">-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg">-->
                <!--            <div class="ratio ratio-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg">-->
                <!--            <div class="ratio ratio-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg">-->
                <!--            <div class="ratio ratio-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg">-->
                <!--            <div class="ratio ratio-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg">-->
                <!--            <div class="ratio ratio-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg">-->
                <!--            <div class="ratio ratio-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg">-->
                <!--            <div class="ratio ratio-4x3"><img class="d-block w-100 object-fit-fill" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg">-->
                <!--            <div class="ratio ratio-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg">-->
                <!--            <div class="ratio ratio-1x1"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg">-->
                <!--            <div class="ratio ratio-1x1"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image-horizont.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--        <div class="swiper-button-prev text-white rounded"></div>-->
                <!--        <div class="swiper-button-next text-white rounded"></div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <!--<div class="col-xl-5">-->
                <!--  <div class="d-flex justify-content-end align-items-end mb-3 mt-xl-0 mt-4">-->
                <!--    <div class="toast-container position-fixed top-50 end-0 translate-middle-y p-3">-->
                <!--      <div class="toast position-sticky top-2" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">-->
                <!--        <div class="d-flex"></div>-->
                <!--        <button class="d-block btn-close me-2 mt-2 m-auto" type="button" data-bs-dismiss="toast" aria-label="Закрыть"></button>-->
                <!--        <div class="toast-body"> -->
                <!--          <div class="list-group" id="scollspy"><a class="btn btn-outline-secondary mb-2" href="#" role="button">Редактировать</a><a class="btn btn-outline-secondary mb-2" href="#" role="button">Опубликовать</a><a class="btn btn-outline-secondary mb-2" href="#" role="button">Администраторы</a><a class="btn btn-outline-secondary mb-2" href="#" role="button">Пригласить</a><a class="btn btn-outline-secondary mb-2" href="#" role="button">Подписчики</a></div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="d-flex justify-content-between align-items-center w-100 pt-lg-0 pt-md-4 pt-2"><a href=""> <span class="text-accent fw-bold d-lg-none d-block">Услуги</span></a><span><span class="text-success me-2">Редактировать</span>-->
                <!--        <div class="d-inline-block" id="liveToastBtn" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Редактировать">-->
                <!--          <svg class="bi bi-pencil-square text-success" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">-->
                <!--            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>-->
                <!--            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>-->
                <!--          </svg>-->
                <!--        </div></span></div>-->
                <!--  </div>-->
                <!--  <div class="card card-body shadow bg-body-tertiary rounded pt-xxl-5 p-3">-->
                <!--    <div class="row">-->
                <!--      <div class="col-lg-9 col-12 text-lable">-->
                <!--        <nav class="d-lg-block d-none" aria-label="breadcrumb">-->
                <!--          <ol class="breadcrumb">-->
                <!--            <li class="breadcrumb-item"> <a href="#">Главная</a></li>-->
                <!--            <li class="breadcrumb-item"><a href="#">Мои объявления</a></li>-->
                <!--            <li class="breadcrumb-item active" aria-current="page">Услуги</li>-->
                <!--          </ol>-->
                <!--        </nav>-->
                <!--        <h2 class="mt-3 d-md-block d-none">Как установить Minecraft TLauncher</h2>-->
                <!--        <div class="mb-3"></div><span>Установка TLauncher за&#160;1 минуту. Ниже ссылки для скачивания... </span><a role="button" href="" data-bs-toggle="collapse" data-bs-target="#more" aria-expanded="false" aria-controls="collapseExample"><span class="link-primary link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover text-nowrap">Читать далее</span></a>-->
                <!--        <div class="collapse" id="more">-->
                <!--          <p>(Краткое описание 105 символов максимально, закголовок 56 символов максимально)</p>-->
                <!--          <p>Итого все объявление макс 161 символ как в&#160;директе. Заголовок + краткое.</p>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--      <div class="col">-->
                <!--        <div class="d-flex justify-content-xl-start justify-content-md-center justify-content-start align-items-end mt-4 mb-3">-->
                <!--          <h4 class="text-danger text-nowrap m-0">1234 руб</h4><span class="text-decoration-line-through ps-3">2500 руб</span>-->
                <!--        </div>-->
                <!--        <div class="soc-link d-flex align-items-center justify-content-xl-start justify-content-center flex-wrap gap-2 py-3">-->
                <!--          <div class="count d-flex flex-md-wrap flex-nowrap">-->
                <!--            <div class="count-content collapse pe-2" id="collapseCart" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}"><span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>-->
                <!--              <input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>-->
                <!--            </div>-->
                <!--            <div class="btn-block"><a class="btn btn-outline-accent btn-lg" href="#collapseCart" data-bs-toggle="collapse">-->
                <!--               <svg width="16" height="16" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.08337 9.5C3.44171 9.5 2.92254 10.025 2.92254 10.6667C2.92254 11.3083 3.44171 11.8333 4.08337 11.8333C4.72504 11.8333 5.25004 11.3083 5.25004 10.6667C5.25004 10.025 4.72504 9.5 4.08337 9.5ZM0.583374 0.166672V1.33334H1.75004L3.85004 5.76084L3.06254 7.19C2.96921 7.35334 2.91671 7.54584 2.91671 7.75C2.91671 8.39167 3.44171 8.91667 4.08337 8.91667H11.0834V7.75H4.32837C4.24671 7.75 4.18254 7.68584 4.18254 7.60417L4.20004 7.53417L4.72504 6.58334H9.07087C9.50837 6.58334 9.89337 6.34417 10.0917 5.9825L12.18 2.19667C12.2267 2.11501 12.25 2.01584 12.25 1.91667C12.25 1.59584 11.9875 1.33334 11.6667 1.33334H3.03921L2.49087 0.166672H0.583374ZM9.91671 9.5C9.27504 9.5 8.75587 10.025 8.75587 10.6667C8.75587 11.3083 9.27504 11.8333 9.91671 11.8333C10.5584 11.8333 11.0834 11.3083 11.0834 10.6667C11.0834 10.025 10.5584 9.5 9.91671 9.5Z" fill="currentColor"/>
                                  </svg><span>в корзину</span></a></div>-->
                <!--          </div>-->
                <!--          <div class="soc-button d-flex flex-nowrap gap-2"><a class="btn btn-outline-primary btn-lg" href=""> -->
                <!--              <svg class="bi bi-telegram" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"> </path>-->
                <!--              </svg></a><a class="btn btn-outline-success btn-lg" href=""> -->
                <!--              <svg class="bi bi-whatsapp" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>-->
                <!--              </svg></a><a class="btn btn-outline-secondary btn-lg" href=""> -->
                <!--              <svg class="bi bi-subtract" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"> </path>-->
                <!--              </svg></a></div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <!-- одинарный слайдер с горизотнальными изображениями - КОНЕЦ -->

                <!-- одинарный слайдер с квадратными изображениями - НАЧАЛО -->
                <!--<div class="col">-->
                <!--  <div class="row justify-content-center"> -->
                <!--    <div class="slider px-0">-->
                <!--      <div class="swiper slider__square ms-xl-0">-->
                <!--        <div class="swiper-wrapper">-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">-->
                <!--            <div class="ratio ratio-1x1"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg">-->
                <!--            <div class="ratio ratio-1x1"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">-->
                <!--            <div class="ratio ratio-1x1"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">-->
                <!--            <div class="ratio ratio-1x1"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">-->
                <!--            <div class="ratio ratio-1x1"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">-->
                <!--            <div class="ratio ratio-1x1"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">-->
                <!--            <div class="ratio ratio-1x1"><img class="d-block w-100 object-fit-fill" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">-->
                <!--            <div class="ratio ratio-1x1"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">-->
                <!--            <div class="ratio ratio-1x1"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">-->
                <!--            <div class="ratio ratio-1x1"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>-->
                <!--            <div class="fullscrin" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg"> -->
                <!--              <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>-->
                <!--                <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>-->
                <!--              </svg>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--        <div class="swiper-button-prev text-white rounded"></div>-->
                <!--        <div class="swiper-button-next text-white rounded"></div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <!--<div class="col-xl-7 col-12">-->
                <!--  <div class="d-flex justify-content-end align-items-end mb-3 mt-xl-0 mt-4">-->
                <!--    <div class="toast-container position-fixed top-50 end-0 translate-middle-y p-3">-->
                <!--      <div class="toast position-sticky top-2" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">-->
                <!--        <div class="d-flex"></div>-->
                <!--        <button class="d-block btn-close me-2 mt-2 m-auto" type="button" data-bs-dismiss="toast" aria-label="Закрыть"></button>-->
                <!--        <div class="toast-body"> -->
                <!--          <div class="list-group" id="scollspy"><a class="btn btn-outline-secondary mb-2" href="#" role="button">Редактировать</a><a class="btn btn-outline-secondary mb-2" href="#" role="button">Опубликовать</a><a class="btn btn-outline-secondary mb-2" href="#" role="button">Администраторы</a><a class="btn btn-outline-secondary mb-2" href="#" role="button">Пригласить</a><a class="btn btn-outline-secondary mb-2" href="#" role="button">Подписчики</a></div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="d-flex justify-content-between align-items-center w-100 pt-lg-0 pt-4"><a href=""> <span class="text-accent fw-bold d-lg-none d-block">Услуги</span></a><span><span class="text-success me-2">Редактировать</span>-->
                <!--        <div class="d-inline-block" id="liveToastBtn" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Редактировать">-->
                <!--          <svg class="bi bi-pencil-square text-success" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">-->
                <!--            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>-->
                <!--            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>-->
                <!--          </svg>-->
                <!--        </div></span></div>-->
                <!--  </div>-->
                <!--  <div class="card card-body shadow bg-body-tertiary rounded pt-xxl-5 p-3">-->
                <!--    <div class="row">-->
                <!--      <div class="col-lg-9 col-12 text-lable">-->
                <!--        <nav class="d-lg-block d-none" aria-label="breadcrumb">-->
                <!--          <ol class="breadcrumb">-->
                <!--            <li class="breadcrumb-item"> <a href="#">Главная</a></li>-->
                <!--            <li class="breadcrumb-item"><a href="#">Мои объявления</a></li>-->
                <!--            <li class="breadcrumb-item active" aria-current="page">Услуги</li>-->
                <!--          </ol>-->
                <!--        </nav>-->
                <!--        <h2 class="mt-3 d-md-block d-none">Как установить Minecraft TLauncher</h2>-->
                <!--        <div class="mb-3"></div><span>Установка TLauncher за&#160;1 минуту. Ниже ссылки для скачивания. Не&#160;забудь указать свой НИК на&#160;сайте как НИК в&#160;TLauncher... </span><a role="button" href="" data-bs-toggle="collapse" data-bs-target="#more" aria-expanded="false" aria-controls="collapseExample"><span class="link-primary link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover text-nowrap">Читать далее</span></a>-->
                <!--        <div class="collapse" id="more">-->
                <!--          <p>(Краткое описание 105 символов максимально, закголовок 56 символов максимально)</p>-->
                <!--          <p>Итого все объявление макс 161 символ как в&#160;директе. Заголовок + краткое.</p>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--      <div class="col">-->
                <!--        <div class="d-flex justify-content-xl-start justify-content-md-center justify-content-start align-items-end mt-4 mb-3">-->
                <!--          <h4 class="text-danger text-nowrap m-0">1234 руб</h4><span class="text-decoration-line-through ps-3">2500 руб</span>-->
                <!--        </div>-->
                <!--        <div class="soc-link d-flex align-items-center justify-content-xl-start justify-content-center flex-wrap gap-2 py-3">-->
                <!--          <div class="count d-flex flex-md-wrap flex-nowrap">-->
                <!--            <div class="count-content collapse pe-2" id="collapseCart" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}"><span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>-->
                <!--              <input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>-->
                <!--            </div>-->
                <!--            <div class="btn-block"><a class="btn btn-outline-accent btn-lg" href="#collapseCart" data-bs-toggle="collapse">-->
                <!--                <svg width="16" height="16" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M4.08337 9.5C3.44171 9.5 2.92254 10.025 2.92254 10.6667C2.92254 11.3083 3.44171 11.8333 4.08337 11.8333C4.72504 11.8333 5.25004 11.3083 5.25004 10.6667C5.25004 10.025 4.72504 9.5 4.08337 9.5ZM0.583374 0.166672V1.33334H1.75004L3.85004 5.76084L3.06254 7.19C2.96921 7.35334 2.91671 7.54584 2.91671 7.75C2.91671 8.39167 3.44171 8.91667 4.08337 8.91667H11.0834V7.75H4.32837C4.24671 7.75 4.18254 7.68584 4.18254 7.60417L4.20004 7.53417L4.72504 6.58334H9.07087C9.50837 6.58334 9.89337 6.34417 10.0917 5.9825L12.18 2.19667C12.2267 2.11501 12.25 2.01584 12.25 1.91667C12.25 1.59584 11.9875 1.33334 11.6667 1.33334H3.03921L2.49087 0.166672H0.583374ZM9.91671 9.5C9.27504 9.5 8.75587 10.025 8.75587 10.6667C8.75587 11.3083 9.27504 11.8333 9.91671 11.8333C10.5584 11.8333 11.0834 11.3083 11.0834 10.6667C11.0834 10.025 10.5584 9.5 9.91671 9.5Z" fill="currentColor"/>
                                    </svg><span>в корзину</span></a></div>-->
                <!--          </div>-->
                <!--          <div class="soc-button d-flex flex-nowrap gap-2"><a class="btn btn-outline-primary btn-lg" href=""> -->
                <!--              <svg class="bi bi-telegram" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"> </path>-->
                <!--              </svg></a><a class="btn btn-outline-success btn-lg" href=""> -->
                <!--              <svg class="bi bi-whatsapp" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>-->
                <!--              </svg></a><a class="btn btn-outline-secondary btn-lg" href=""> -->
                <!--              <svg class="bi bi-subtract" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
                <!--                <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z">   </path>-->
                <!--              </svg></a></div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <!-- одинарный слайдер с квадратными изображениями - КОНЕЦ -->


                <?php
                if ( $product_video || $gallery_attachment_ids) {
                    ?>

                    <!-- слайдер с табами изображениями - НАЧАЛО -->
                    <div class="col-lg-7">
                        <div class="row justify-content-xl-start justify-content-center">
							<?php if ( $product_video) { ?>
								<div class="slider slider-horizontal">
								<? } else { ?>
								<div class="slider slider-vertical">
								<? } ?>
								<div class="swiper slider__images order-2 slider__images--main slider__images-cotalog">
									<div class="swiper-wrapper">
										<?php if ( $product_video) {
											if ($total_count > 1) {
											?>
											<div class="swiper-slide" data-slider="0" data-bs-toggle="modal" data-bs-target="#backdrop-1" data-bs-gallery="<?php echo $product_video; ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" frameborder="0">
												<div class="position-absolute start-0 top-0 mt-2 ms-2 text-start">
													<div class="mrk-hit">хит</div>
													<div class="mrk-new">новинка</div>
												</div>
												<div class="youtube ratio ratio-16x9 h-100">
													<iframe class="iframe object-fit-cover" src="<?php echo $product_video; ?>" frameborder="0" allowfullscreen></iframe>
												</div>
												<div class="fullscrin" data-slider="0" data-bs-toggle="modal" data-bs-target="#backdrop-1" data-bs-gallery="<?php echo $product_video; ?>?rel=0&amp;autoplay=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" title="увеличить окно просмотра" frameborder="0">
													<svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
													<path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
													<path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
													</svg>
												</div>
											</div>
											<?php
											} else {?>
											<div class="position-absolute start-0 top-0 mt-2 ms-2 text-start">
												<div class="mrk-hit">хит</div>
												<div class="mrk-new">новинка</div>
											</div>
											<div class="swiper-slide" data-slider="0" data-bs-toggle="modal" data-bs-target="#backdrop-video" data-bs-gallery="<?php echo $product_video; ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" frameborder="0">
												<div class="youtube ratio ratio-16x9 video-one h-100">
													<iframe class="iframe object-fit-cover" src="<?php echo $product_video; ?>" frameborder="0" allowfullscreen></iframe>
												</div>
												<div class="fullscrin" data-slider="0" data-bs-toggle="modal" data-bs-target="#backdrop-video" data-bs-gallery="<?php echo $product_video; ?>?rel=0&amp;autoplay=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" title="увеличить окно просмотра" frameborder="0">
													<svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
													<path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
													<path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
													</svg>
												</div>
											</div>
										<? }
										}
										if ( $gallery_attachment_ids) {
											foreach ($gallery_attachment_ids as $gallery_attachment_id) {
												if ($total_count > 1) {
												?>
												<div class="position-absolute start-0 top-0 mt-2 ms-2 text-start">
													<div class="mrk-hit">хит</div>
													<div class="mrk-new">новинка</div>
												</div>
												<div class="swiper-slide" data-slider="0" data-bs-toggle="modal" data-bs-target="#backdrop-1" data-bs-gallery="<?= wp_get_attachment_url( $gallery_attachment_id, 'full' ); ?>" title="увеличить окно просмотра">
													<div class="image-4x3"><img src="<?= wp_get_attachment_url( $gallery_attachment_id, 'full' ); ?>" alt="image">
														<div class="fullscrin" data-slider="0" data-bs-toggle="modal" data-bs-target="#backdrop-1" data-bs-gallery="<?= wp_get_attachment_url( $gallery_attachment_id, 'full' ); ?>" title="увеличить окно просмотра">
															<svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
															<path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
															<path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
															</svg>
														</div>
													</div>
												</div>
												<?php
												} else {
												?>
												<div class="position-absolute start-0 top-0 mt-2 ms-2 text-start">
													<div class="mrk-hit">хит</div>
													<div class="mrk-new">новинка</div>
												</div>
												<div class="swiper-slide" data-slider="0" data-bs-toggle="modal" data-bs-target="#backdrop-image" data-bs-gallery="<?= wp_get_attachment_url( $gallery_attachment_id, 'full' ); ?>" title="увеличить окно просмотра">
													<div class="image-4x3 image-one">
														<img src="<?= wp_get_attachment_url( $gallery_attachment_id, 'full' ); ?>" alt="image">
														<div class="fullscrin" data-slider="0" data-bs-toggle="modal" data-bs-target="#backdrop-image" data-bs-gallery="<?= wp_get_attachment_url( $gallery_attachment_id, 'full' ); ?>" title="увеличить окно просмотра">
															<svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
																<path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
																<path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
															</svg>
														</div>
													</div>
												</div>
												<?php }
											}
										} ?>

									</div>
									<div class="swiper-button-prev text-white rounded"> </div>
									<div class="swiper-button-next text-white rounded"></div>
								</div>
								<div class="slider-thumb order-1 d-flex px-md-0 px-2">
									<div class="swiper slider-thumb__images slider-thumb__images--main" thumbsSlider="" style="--swiper-navigation-color:#000;--swiper-pagination-color:#000">
										<div class="swiper-wrapper">
											<?php
											if ( $product_video) {
												if ($total_count > 1) {
												?>
												<div class="swiper-slide youtube ratio slide-horizontal">
													<iframe class="iframe" width="560" height="315" src="<?php echo $product_video; ?>" title="YouTube video" frameborder="0"></iframe>
													<!-- <video class="iframe object-fit-cover" autoplay muted loop poster="<?= get_stylesheet_directory_uri(); ?>/img/video-thumb.png">
													<source src="<?= get_stylesheet_directory_uri(); ?>/assets/video-thumb.webm" type="video/webm">
													<source src="<?= get_stylesheet_directory_uri(); ?>/assets/video-thumb.mp4" type="video/mp4">
													</video> -->
													<!-- <iframe class="iframe" width="560" height="315" src="https://www.youtube.com/embed/WAl60Fn--SQ?si=fDU1jMa6qKpuCmjg" title="YouTube video" frameborder="0"></iframe> -->
												</div>

												<?php }
												else { ?>
												<div class="swiper-slide youtube ratio slide-horizontal"></div>
												<?php }
											}

											if ( $gallery_attachment_ids) {
												foreach ($gallery_attachment_ids as $gallery_attachment_id) {
												if ($total_count > 1) {
												?>
													<div class="swiper-slide swiper-item"><img src="<?= wp_get_attachment_url( $gallery_attachment_id, 'thumb' ); ?>" alt="thumb"></div>

												<?php
												} else {
												?>
													<div class="swiper-slide swiper-item"></div>

												<?php
												}}
											}
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="col-lg-5 my-auto">
                        <div class="card card-body border-0 mt-lg-0 mt-md-5 mt-4 pt-lg-0 pt-md-5 py-0 px-lg-3 px-0">
                            <?php
                            if( current_user_can('edit_pages') || current_user_can('yith_vendor')) { ?>
                                <div class="d-flex justify-content-between align-items-center w-100 py-md-0 mt-lg-0 mt-4 pb-3">
                                    <a href="">
                                        <span class="text-accent fw-bold d-lg-none d-block">Услуги</span>
                                    </a>
                                    <?php if ($vendor && $vendor->id == $product_vendor->id) : ?>
                                        <a href="/edit-product/?edit-id=<?php echo $_product->get_id(); ?>" class="text-secondary badge fw-normal me-0" role="button">
                                            Редактировать
                                            <span class="d-inline-block align-middle">
                              <svg class="bi bi-pencil-square text-secondary" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                </svg>
                          </span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php } ?>
                            <div class="row my-auto">
                                <div class="col-12 text-lable">
                                    <h1 class="d-md-block d-none fs-2"><?php echo $_product->get_name() ?></h1>
                                    <div class="mb-3"></div>
                                    <span>
                        <?php echo get_the_excerpt() ?>
                        <!-- <a role="button" href="" data-bs-toggle="collapse" data-bs-target="#more" aria-expanded="false" aria-controls="collapseExample">
                          <span class="link-primary link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover text-nowrap">Читать далее</span>
                        </a> -->
                      </span>
                                    <div class="collapse" id="more">
                                        <p>(Краткое описание 105 символов максимально, закголовок 56 символов максимально)</p>
                                        <p>Итого все объявление макс 161 символ как в&#160;директе. Заголовок + краткое.</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-xl-start justify-content-md-center justify-content-start align-items-end mt-4 mb-3">
                                        <h4 class="text-danger text-nowrap m-0">
                                            <?php
                                            if ( $_product->get_price() ) {
                                                echo $_product->get_price() . ' ' . get_woocommerce_currency_symbol();
                                            }
                                            ?>
                                        </h4>
                                        <?php if ( $_product->get_regular_price() ) { ?>
                                            <span class="text-decoration-line-through ps-3"><?php echo $_product->get_regular_price() . ' ' . get_woocommerce_currency_symbol() ?></span>
                                        <?php }?>
                                    </div>
                                    <div class="soc-link d-flex align-items-center justify-content-xl-start justify-content-center flex-wrap gap-2 py-3">
                                        <div class="count d-flex flex-md-wrap flex-nowrap">
                                            <div class="count-content collapse pe-2" id="collapseCart" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}"><span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>
                                                <input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>
                                            </div>
                                            <div class="btn-block">
                                                <div class="add-to-cart-container mt-auto">
                                                    <a href="?add-to-cart=<?php echo $_product->get_id() ?>"
                                                       class="product_type_simple add_to_cart_button ajax_add_to_cart btn btn-outline-accent btn-lg"
                                                       data-quantity="1"
                                                       data-product_id="<?php echo $_product->get_id() ?>"
                                                       data-product_sku="<?php echo $_product->get_sku() ?>"
                                                       aria-label="Add to cart: “bS Isotope”"
                                                       aria-describedby=""
                                                       rel="nofollow"
                                                       product-title="bS Isotope">

                                                        <div class="btn-loader">
                                                            <span class="spinner-border spinner-border-sm"></span>
                                                        </div>
                                                        <svg width="16" height="16" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M4.08337 9.5C3.44171 9.5 2.92254 10.025 2.92254 10.6667C2.92254 11.3083 3.44171 11.8333 4.08337 11.8333C4.72504 11.8333 5.25004 11.3083 5.25004 10.6667C5.25004 10.025 4.72504 9.5 4.08337 9.5ZM0.583374 0.166672V1.33334H1.75004L3.85004 5.76084L3.06254 7.19C2.96921 7.35334 2.91671 7.54584 2.91671 7.75C2.91671 8.39167 3.44171 8.91667 4.08337 8.91667H11.0834V7.75H4.32837C4.24671 7.75 4.18254 7.68584 4.18254 7.60417L4.20004 7.53417L4.72504 6.58334H9.07087C9.50837 6.58334 9.89337 6.34417 10.0917 5.9825L12.18 2.19667C12.2267 2.11501 12.25 2.01584 12.25 1.91667C12.25 1.59584 11.9875 1.33334 11.6667 1.33334H3.03921L2.49087 0.166672H0.583374ZM9.91671 9.5C9.27504 9.5 8.75587 10.025 8.75587 10.6667C8.75587 11.3083 9.27504 11.8333 9.91671 11.8333C10.5584 11.8333 11.0834 11.3083 11.0834 10.6667C11.0834 10.025 10.5584 9.5 9.91671 9.5Z" fill="currentColor"/>
                                                        </svg>
                                                        в корзину
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="soc-button d-flex flex-nowrap gap-2">
                                            <a class="btn btn-outline-primary btn-lg" target="_blank" href="https://t.me/share/url?url=<?php echo $_product_url ?>&text=<?php echo $_product->get_name() ?>">
                                                <svg class="bi bi-telegram" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"> </path>
                                                </svg>
                                            </a>
                                            <a class="btn btn-outline-success btn-lg" target="_blank" href="https://wa.me/?text=<?php echo $_product_url ?>">
                                                <svg class="bi bi-whatsapp" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                                                </svg>
                                            </a>
                                            <div class="btn btn-outline-secondary btn-lg" id="copyLinkProduct" href="#">
                                                <svg class="bi bi-subtract" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"></path>
                                                </svg>
                                                <span style="display:none">Скопировано</span>
                                                <style>
                                                    #copyLinkProduct {
                                                        position: relative;

                                                    }
                                                    #copyLinkProduct span{
                                                        position: absolute;
                                                        width: max-content;
                                                        font-size: 12px;
                                                        top: -50%;
                                                        left: 50%;

                                                    }

                                                </style>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- слайдер с табами изображениями -  КОНЕЦ -->
                <?php }
                else {
                    ?>
                    <!-- без слайдера - НАЧАЛО -->
                    <div class="col">
                        <?php
                        if( current_user_can('edit_pages') || current_user_can('yith_vendor')) { ?>
                            <div class="d-flex justify-content-between align-items-center w-100 py-md-0 pt-4 pb-3">
                                <a href="">
                                    <span class="text-accent fw-bold d-lg-none d-block">Услуги</span>
                                </a>
                                <span>
                      <a href="/edit-product/?edit-id=<?php echo $_product->get_id(); ?>" class="text-secondary badge fw-normal me-0" role="button">Редактировать
                        <span class="d-inline-block align-middle">
                          <svg class="bi bi-pencil-square text-secondary" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                          </svg>
                        </span>
                      </a>
                    </span>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-lg-7 text-lable">
                                <h1 class="mt-3 d-md-block d-none fs-2"><?php echo $_product->get_name() ?></h1>
                                <div class="mb-3"></div>
                                <span><?php echo get_the_excerpt() ?></span>
                                <!-- <a role="button" href="" data-bs-toggle="collapse" data-bs-target="#more" aria-expanded="false" aria-controls="collapseExample">
                                  <span class="link-primary link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover text-nowrap">Читать далее</span>
                                </a> -->
                                <div class="collapse" id="more">
                                    <p>(Краткое описание 105 символов максимально, закголовок 56 символов максимально)</p>
                                    <p>Итого все объявление макс 161 символ как в&#160;директе. Заголовок + краткое.</p>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card card-body border-0 pt-xxl-5 p-3">
                                    <div class="d-flex justify-content-xl-start justify-content-md-center justify-content-start align-items-end mt-4 mb-3">
                                        <h4 class="text-danger text-nowrap m-0">
                                            <?php
                                            if ( $_product->get_price() ) {
                                                echo $_product->get_price() . ' ' . get_woocommerce_currency_symbol();
                                            }
                                            ?>
                                        </h4>
                                        <?php if ( $_product->get_regular_price() ) { ?>
                                            <span class="text-decoration-line-through ps-3"><?php echo $_product->get_regular_price() . ' ' . get_woocommerce_currency_symbol() ?></span>
                                        <?php }?>
                                    </div>
                                    <div class="soc-link d-flex align-items-center justify-content-xl-start justify-content-center flex-wrap gap-2 py-3">
                                        <div class="count d-flex flex-md-wrap flex-nowrap">
                                            <div class="count-content collapse pe-2" id="collapseCart" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}"><span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>
                                                <input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>
                                            </div>
                                            <div class="btn-block">
                                                <div class="add-to-cart-container mt-auto">
                                                    <a href="?add-to-cart=<?php echo $_product->get_id() ?>"
                                                       class="product_type_simple add_to_cart_button ajax_add_to_cart btn btn-outline-accent btn-lg"
                                                       data-quantity="1"
                                                       data-product_id="<?php echo $_product->get_id() ?>"
                                                       data-product_sku="<?php echo $_product->get_sku() ?>"
                                                       aria-label="Add to cart: “bS Isotope”"
                                                       aria-describedby=""
                                                       rel="nofollow"
                                                       product-title="bS Isotope">

                                                        <div class="btn-loader">
                                                            <span class="spinner-border spinner-border-sm"></span>
                                                        </div>
                                                        <svg width="16" height="16" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M4.08337 9.5C3.44171 9.5 2.92254 10.025 2.92254 10.6667C2.92254 11.3083 3.44171 11.8333 4.08337 11.8333C4.72504 11.8333 5.25004 11.3083 5.25004 10.6667C5.25004 10.025 4.72504 9.5 4.08337 9.5ZM0.583374 0.166672V1.33334H1.75004L3.85004 5.76084L3.06254 7.19C2.96921 7.35334 2.91671 7.54584 2.91671 7.75C2.91671 8.39167 3.44171 8.91667 4.08337 8.91667H11.0834V7.75H4.32837C4.24671 7.75 4.18254 7.68584 4.18254 7.60417L4.20004 7.53417L4.72504 6.58334H9.07087C9.50837 6.58334 9.89337 6.34417 10.0917 5.9825L12.18 2.19667C12.2267 2.11501 12.25 2.01584 12.25 1.91667C12.25 1.59584 11.9875 1.33334 11.6667 1.33334H3.03921L2.49087 0.166672H0.583374ZM9.91671 9.5C9.27504 9.5 8.75587 10.025 8.75587 10.6667C8.75587 11.3083 9.27504 11.8333 9.91671 11.8333C10.5584 11.8333 11.0834 11.3083 11.0834 10.6667C11.0834 10.025 10.5584 9.5 9.91671 9.5Z" fill="currentColor"/>
                                                        </svg>
                                                        в корзину
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="soc-button d-flex flex-nowrap gap-2">
                                            <a class="btn btn-outline-primary btn-lg" target="_blank" href="https://t.me/share/url?url=<?php echo $_product_url ?>&text=<?php echo $_product->get_name() ?>">
                                                <svg class="bi bi-telegram" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"> </path>
                                                </svg>
                                            </a>
                                            <a class="btn btn-outline-success btn-lg" target="_blank" href="https://wa.me/?text=<?php echo $_product_url ?>">
                                                <svg class="bi bi-whatsapp" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                                                </svg>
                                            </a>
                                            <div class="btn btn-outline-secondary btn-lg" id="copyLinkProduct" href="#">
                                                <svg class="bi bi-subtract" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"></path>
                                                </svg>
                                                <span style="display:none">Скопировано</span>
                                                <style>
                                                    #copyLinkProduct {
                                                        position: relative;

                                                    }
                                                    #copyLinkProduct span{
                                                        position: absolute;
                                                        width: max-content;
                                                        font-size: 12px;
                                                        top: -50%;
                                                        left: 50%;

                                                    }

                                                </style>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- без слайдера - КОНЕЦ -->
                    <?php
                }
                ?>
                <div class="col-12 ">
                    <div class="description card card-body border-0 px-md-0">
                        <div class="row">
                            <div class="col px-0">
                                <h2 class="block-title text-nowrap fs-3">Описание</h2>
                                <?php the_content() ?>
                            </div>
                            <div class="col d-none">
                                <h2 class="block-title text-nowrap">Характеристики</h2>
                                <ul class="list-group list-group-flush mb-4">
                                    <?php
                                    if ( $_product->get_attributes() ) {

                                        foreach ( $_product->get_attributes() as $key => $value) {
                                            ?>
                                            <li class="list-group-item d-flex px-0 pt-1 pb-2"><span class="text-nowrap"><?php echo $value['name'] ?></span><span class="line mx-2"></span><span class="text-nowrap"><?php echo $value['options'][0] ?></span></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul><a class="d-block delivery py-2" href="" role="button">Доставка и оплата</a><a class="d-block conditions py-2" href="" role="button">Условия продажи</a>
                            </div>
                            <?php echo do_shortcode('[pch_group]'); ?>
                        </div>
                    </div>
                </div>
                <!--Блок Готовые решения - Чат -->
                <div class="row mx-0 px-0">
                    <div class="col-lg-4 ps-0">
                        <div class="pch-project-chat hide ps-0 w-100">
                            <div class="border-top my-3"></div>
                            <h3 class="text-uppercase">проектчат</h3>
                            <ul class="list ps-0">
                                <li class="mb-2">
                                <button class="btn btn-toggle d-inline-flex align-items-center border-0 collapsed text-uppercase text-start fs-6" data-bs-toggle="collapse" data-bs-target="#home-collapse22" aria-expanded="false">
                                стеклянные перегородки для коттеджей
                                </button>
                                <div class="collapse" id="home-collapse22">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                                    <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Updates</a></li>
                                    <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Reports</a></li>
                                    </ul>
                                </div>
                                </li>
                                <li class="mb-2">
                                <button class="btn btn-toggle d-inline-flex align-items-center border-0 collapsed text-uppercase text-start fs-6" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse23" aria-expanded="false">
                                стеклянные перегородки для бань и саун
                                </button>
                                <div class="collapse" id="dashboard-collapse23">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                                    <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Weekly</a></li>
                                    <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Monthly</a></li>
                                    <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Annually</a></li>
                                    </ul>
                                </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 pe-0">

                        <div class="ready-made-solutions mt-4">
                            <h2 class="display-5 text-primary fw-bold mt-md-0 my-4">Готовые решения</h2>
                            <nav aria-label="breadcrumb" class="wc-breadcrumb breadcrumb-scroller pb-2">
                                <ol class="breadcrumb mb-0"><li class="breadcrumb-item"><a href="http://datsu-marketplace">Главная</a></li><li class="breadcrumb-item"><a href="http://datsu-marketplace/shop/">Проектчат</a></li><li class="breadcrumb-item"><a href="http://datsu-marketplace/product-category/truba-ne-rjavejushaya/">Установка стеклянного козырька за 30 минут</a></li></ol>
                            </nav>

                            <div class="d-flex justify-content-between align-items-start mb-2" style=
                            "height: 44px;">
                                <span class="text-secondary">Открытый канал</span>
                                <div class="d-flex align-items-start gap-3">

                                    <div class="pch-chat-menu">
                                        <div class="text-end">
                                            <a href="" role="button" class="ms-1 ms-md-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-search" aria-expanded="false" aria-controls="collapse-search">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1556_3291)">
                                                    <path d="M14.6786 12.9291C15.889 11.2775 16.4311 9.22976 16.1965 7.19559C15.9619 5.16141 14.9679 3.29082 13.4133 1.95806C11.8588 0.6253 9.85831 -0.0713465 7.81217 0.00749495C5.76603 0.0863364 3.8251 0.934852 2.37771 2.38328C0.930312 3.83172 0.0831854 5.77325 0.00580817 7.81944C-0.0715691 9.86564 0.626509 11.8656 1.96038 13.4192C3.29425 14.9728 5.16555 15.9655 7.1999 16.1986C9.23424 16.4318 11.2816 15.8882 12.9324 14.6766H12.9311C12.9686 14.7266 13.0086 14.7742 13.0536 14.8204L17.8661 19.6329C18.1005 19.8675 18.4185 19.9993 18.7501 19.9994C19.0816 19.9995 19.3997 19.8679 19.6342 19.6335C19.8688 19.3991 20.0006 19.0812 20.0007 18.7496C20.0009 18.418 19.8693 18.1 19.6349 17.8654L14.8224 13.0529C14.7777 13.0077 14.7296 12.9659 14.6786 12.9279V12.9291ZM15.0011 8.12415C15.0011 9.02699 14.8233 9.92099 14.4778 10.7551C14.1323 11.5892 13.6259 12.3471 12.9875 12.9855C12.3491 13.6239 11.5912 14.1303 10.7571 14.4758C9.92296 14.8213 9.02896 14.9992 8.12612 14.9992C7.22328 14.9992 6.32929 14.8213 5.49517 14.4758C4.66106 14.1303 3.90317 13.6239 3.26476 12.9855C2.62636 12.3471 2.11995 11.5892 1.77445 10.7551C1.42895 9.92099 1.25112 9.02699 1.25112 8.12415C1.25112 6.30079 1.97545 4.5521 3.26476 3.26279C4.55408 1.97348 6.30276 1.24915 8.12612 1.24915C9.94948 1.24915 11.6982 1.97348 12.9875 3.26279C14.2768 4.5521 15.0011 6.30079 15.0011 8.12415Z" fill="#262626"/>
                                                    </g>
                                                    <defs>
                                                    <clipPath id="clip0_1556_3291">
                                                    <rect width="20" height="20" fill="white"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>
                                                <span class="visually-hidden-focusable">Search</span>
                                            </a>

                                            <a class="collapsed ps-1" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.125 15C3.125 14.8342 3.19085 14.6753 3.30806 14.5581C3.42527 14.4408 3.58424 14.375 3.75 14.375H16.25C16.4158 14.375 16.5747 14.4408 16.6919 14.5581C16.8092 14.6753 16.875 14.8342 16.875 15C16.875 15.1658 16.8092 15.3247 16.6919 15.4419C16.5747 15.5592 16.4158 15.625 16.25 15.625H3.75C3.58424 15.625 3.42527 15.5592 3.30806 15.4419C3.19085 15.3247 3.125 15.1658 3.125 15ZM3.125 10C3.125 9.83424 3.19085 9.67527 3.30806 9.55806C3.42527 9.44085 3.58424 9.375 3.75 9.375H16.25C16.4158 9.375 16.5747 9.44085 16.6919 9.55806C16.8092 9.67527 16.875 9.83424 16.875 10C16.875 10.1658 16.8092 10.3247 16.6919 10.4419C16.5747 10.5592 16.4158 10.625 16.25 10.625H3.75C3.58424 10.625 3.42527 10.5592 3.30806 10.4419C3.19085 10.3247 3.125 10.1658 3.125 10ZM3.125 5C3.125 4.83424 3.19085 4.67527 3.30806 4.55806C3.42527 4.44085 3.58424 4.375 3.75 4.375H16.25C16.4158 4.375 16.5747 4.44085 16.6919 4.55806C16.8092 4.67527 16.875 4.83424 16.875 5C16.875 5.16576 16.8092 5.32473 16.6919 5.44194C16.5747 5.55915 16.4158 5.625 16.25 5.625H3.75C3.58424 5.625 3.42527 5.55915 3.30806 5.44194C3.19085 5.32473 3.125 5.16576 3.125 5Z" fill="#262626"/>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="collapse" id="collapseExample" style="">
                                            <div class="card card-body px-0">
                                                <ul class="mb-0">
                                                    <li>
                                                        <a class="" href="#">Action</a>
                                                    </li>
                                                    <li>
                                                        <a class="" href="#">Another action</a>
                                                    </li>
                                                </ul>
                                                <div class="pch-project-chat d-lg-none d-block px-0">
                                                    <div class="border-top my-3"></div>
                                                    <h3 class="text-uppercase fs-4 px-3">проектчат</h3>
                                                    <ul class="list ps-0">
                                                        <li class="mb-2">
                                                        <button class="btn btn-toggle d-inline-flex align-items-center border-0 collapsed text-uppercase text-start fs-6" data-bs-toggle="collapse" data-bs-target="#home-collapse22" aria-expanded="false">
                                                        стеклянные перегородки для коттеджей
                                                        </button>
                                                        <div class="collapse" id="home-collapse22">
                                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                                                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Updates</a></li>
                                                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Reports</a></li>
                                                            </ul>
                                                        </div>
                                                        </li>
                                                        <li class="mb-2">
                                                        <button class="btn btn-toggle d-inline-flex align-items-center border-0 collapsed text-uppercase text-start fs-6" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse23" aria-expanded="false">
                                                        стеклянные перегородки для бань и саун
                                                        </button>
                                                        <div class="collapse" id="dashboard-collapse23">
                                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                                                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Weekly</a></li>
                                                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Monthly</a></li>
                                                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Annually</a></li>
                                                            </ul>
                                                        </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <input class="search-field field form-control collapse" type="search" id="collapse-search" placeholder="Поиск…" value="" name="s" class="collapse">
                                    </div>
                                </div>
                            </div>
                            <!-- Проект Чат -->
                            <div class="pch-chat pt-3">
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            <p class="text-secondary mb-2">@Константин Комков</p>
                                            <p class="text-secondary mb-0">03.07.2022</p>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle me-1 mb-1" type="button" id="dropdownRightMenuButtonDots" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 10C5.53043 10 6.03914 10.2107 6.41421 10.5858C6.78929 10.9609 7 11.4696 7 12C7 12.5304 6.78929 13.0391 6.41421 13.4142C6.03914 13.7893 5.53043 14 5 14C4.46957 14 3.96086 13.7893 3.58579 13.4142C3.21071 13.0391 3 12.5304 3 12C3 11.4696 3.21071 10.9609 3.58579 10.5858C3.96086 10.2107 4.46957 10 5 10ZM12 10C12.5304 10 13.0391 10.2107 13.4142 10.5858C13.7893 10.9609 14 11.4696 14 12C14 12.5304 13.7893 13.0391 13.4142 13.4142C13.0391 13.7893 12.5304 14 12 14C11.4696 14 10.9609 13.7893 10.5858 13.4142C10.2107 13.0391 10 12.5304 10 12C10 11.4696 10.2107 10.9609 10.5858 10.5858C10.9609 10.2107 11.4696 10 12 10ZM19 10C19.5304 10 20.0391 10.2107 20.4142 10.5858C20.7893 10.9609 21 11.4696 21 12C21 12.5304 20.7893 13.0391 20.4142 13.4142C20.0391 13.7893 19.5304 14 19 14C18.4696 14 17.9609 13.7893 17.5858 13.4142C17.2107 13.0391 17 12.5304 17 12C17 11.4696 17.2107 10.9609 17.5858 10.5858C17.9609 10.2107 18.4696 10 19 10Z" fill="black"/>
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownRightMenuButtonDots" style="">
                                                <li>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="pch-chat-gallery">
                                                <div class="row w-100 mx-auto">
                                                    <div class="col-6 px-0">
                                                        <img src="<?= esc_url(get_stylesheet_directory_uri()); ?>/img/gallery-chat/1.jpg" alt="">
                                                    </div>
                                                    <div class="col-6 px-0">
                                                        <img src="<?= esc_url(get_stylesheet_directory_uri()); ?>/img/gallery-chat/2.jpg" alt="">
                                                    </div>
                                                    <div class="col-6 px-0">
                                                        <img src="<?= esc_url(get_stylesheet_directory_uri()); ?>/img/gallery-chat/3.jpg" alt="">
                                                    </div>
                                                    <div class="col-6 px-0">
                                                        <img src="<?= esc_url(get_stylesheet_directory_uri()); ?>/img/gallery-chat/4.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="fw-bold mt-md-0 mt-5 mb-4">Друзья, всем привет!</p>
                                            <p class="mb-4">В сентябре 2024 года мы проводим конференцию Datsu.</p>
                                            <p class="mb-4">В этом чате мы приглашаем игроков, гостей и  предпринимателей принять в ней участие. </p>
                                            <p class="mb-4">Ставьте лайки, делитесь идеями и откликайтесь предложениями на заказы организаторов</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            <p class="text-secondary mb-2">@Константин Комков</p>
                                            <p class="text-secondary mb-0">03.07.2022</p>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle me-1 mb-1" type="button" id="dropdownRightMenuButtonDots" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 10C5.53043 10 6.03914 10.2107 6.41421 10.5858C6.78929 10.9609 7 11.4696 7 12C7 12.5304 6.78929 13.0391 6.41421 13.4142C6.03914 13.7893 5.53043 14 5 14C4.46957 14 3.96086 13.7893 3.58579 13.4142C3.21071 13.0391 3 12.5304 3 12C3 11.4696 3.21071 10.9609 3.58579 10.5858C3.96086 10.2107 4.46957 10 5 10ZM12 10C12.5304 10 13.0391 10.2107 13.4142 10.5858C13.7893 10.9609 14 11.4696 14 12C14 12.5304 13.7893 13.0391 13.4142 13.4142C13.0391 13.7893 12.5304 14 12 14C11.4696 14 10.9609 13.7893 10.5858 13.4142C10.2107 13.0391 10 12.5304 10 12C10 11.4696 10.2107 10.9609 10.5858 10.5858C10.9609 10.2107 11.4696 10 12 10ZM19 10C19.5304 10 20.0391 10.2107 20.4142 10.5858C20.7893 10.9609 21 11.4696 21 12C21 12.5304 20.7893 13.0391 20.4142 13.4142C20.0391 13.7893 19.5304 14 19 14C18.4696 14 17.9609 13.7893 17.5858 13.4142C17.2107 13.0391 17 12.5304 17 12C17 11.4696 17.2107 10.9609 17.5858 10.5858C17.9609 10.2107 18.4696 10 19 10Z" fill="black"/>
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownRightMenuButtonDots" style="">
                                                <li>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pch-chat-image">
                                        <img class="img-fluid" src="<?= get_stylesheet_directory_uri(); ?>/img/gallery-chat/big-img.jpg" alt="">
                                    </div>
                                    <div class="pch-chat-descr mt-4">
                                        <p class="pch-chat-title fw-bold">Гостям праздника:</p>
                                        <p>Узнать полезную информацию, обсудить и предложить идеи, принять участие в конкурсах или даже стать ведущим!!!</p>
                                        <p>Ниже мы составили список групп по тематикам. Если будут вопросы, не стесняйтесь их задавать нашей группе поддержки и конечно нашему чат боту <span class="text-primary">@Kudabot</span></p>
                                        <ul>
                                            <li>
                                                <a class="pch-chat-item" href="#">Расписание и программа</a>
                                                <span class="pch-chat-group">открытая группа</span>
                                            </li>
                                            <li>
                                                <a class="pch-chat-item" href="#">Еда</a>
                                                <span class="pch-chat-group">открытая группа</span>
                                            </li>
                                            <li>
                                                <a class="pch-chat-item" href="#">Хочу заработать</a>
                                                <span class="pch-chat-group">открытая группа</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mt-5">
                                        <div class="d-flex flex-md-nowrap flex-wrap gap-md-0 gap-4 mb-5">
                                            <div class="flex-shrink-0"><img class="object-fit-contain me-4" src="<?= get_stylesheet_directory_uri(); ?>/img/gallery-chat/card-img1.jpg" alt="" style="width: 122px;"></div>
                                            <div class="flex-grow-1 py-0">
                                                <div class="row g-3">
                                                    <div class="col-xl-8 col-lg-7">
                                                        <a class="d-block fw-semibold fs-6 mb-3" href="">Купить билет на главное вечернее шоу фестиваля</a>
                                                        <p>Скидка 50% за 3 месяца до начала праздника и VIP обслуживание  ...</p>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-5">
                                                        <div class="mt-auto text-lg-center">
                                                            <h3 class="text-primary fw-bold text-nowrap d-inline-block">1 777 ₽</h3>
                                                            <span class="text-decoration-line-through fs-5 ps-2">1 721 ₽</span>
                                                        </div>
                                                        <div class="mrk-cart d-flex align-items-center justify-content-lg-end">
                                                            <div class="mrk-cart-quantity">
                                                                <a href="#" class="btn btn-primary btn-order w-100">
                                                                    <img class="mx-auto pe-1" src="<?= esc_url(get_stylesheet_directory_uri()); ?>/img/svg/cart4-white.svg" alt="корзина">
                                                                    В корзину
                                                                </a>
                                                            </div>
                                                            <div class="mrk-card-heart no-active ms-xl-3 ms-2"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-md-nowrap flex-wrap gap-md-0 gap-4 mb-5">
                                            <div class="flex-shrink-0"><img class="object-fit-contain me-4" src="<?= get_stylesheet_directory_uri(); ?>/img/gallery-chat/card-img2.jpg" alt="" style="width: 122px;"></div>
                                            <div class="flex-grow-1 py-0">
                                                <div class="row g-3">
                                                    <div class="col-xl-8 col-lg-7">
                                                        <a class="d-block fw-semibold fs-6 mb-3" href="">Купить билет на главное вечернее шоу фестиваля</a>
                                                        <p>Скидка 50% за 3 месяца до начала праздника и VIP обслуживание  ...</p>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-5">
                                                        <div class="mt-auto text-lg-center">
                                                            <h3 class="text-primary fw-bold text-nowrap d-inline-block">1 777 ₽</h3>
                                                            <span class="text-decoration-line-through fs-5 ps-2">1 721 ₽</span>
                                                        </div>
                                                        <div class="mrk-cart d-flex align-items-center justify-content-lg-end">
                                                            <div class="mrk-cart-quantity">
                                                                <a href="#" class="btn btn-primary btn-order w-100">
                                                                    <img class="mx-auto pe-1" src="<?= esc_url(get_stylesheet_directory_uri()); ?>/img/svg/cart4-white.svg" alt="корзина">
                                                                В корзину
                                                                </a>
                                                            </div>
                                                            <div class="mrk-card-heart no-active ms-xl-3 ms-2"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gap-lg-0 gap-5 mt-4 pt-5 d-none">
                <div class="col-lg-3">
                    <div class="filter-check my-md-0 my-3 p-md-0 p-3 bg-body-tertiary rounded"><a class="d-block filter-title fs-4" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-controls="collapseExample" aria-expanded="false">Категории
                            <div class="form-check-arrow d-lg-none d-block"></div></a>
                        <div class="list-footer-item-overlay"></div>
                    </div>
                    <div class="collapse" id="collapseExample2">
                        <div class="card card-body pt-3 m-0 p-0 filter_other">
                            <?php categories_single_product_bottom() ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <h2 class="block-title pb-md-5 pb-3">Предложения других продавцов</h2>
                        <div class="d-lg-block">
                            <?php
                            filter_single_product_bottom( 'front' );
                            ?>
                        </div>
                        <div class="d-lg-none d-block">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="slider">
                                        <div class="swiper slider__images slider__images-cotalog slider__images--offer01">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide" data-slider="1" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery-video="https://www.youtube.com/embed/WAl60Fn--SQ?si=F8-Guv6u-YSvZyjH?modestbranding=1&amp;color=white?transparent=0">
                                                    <div class="youtube object-fit-contain ratio ratio-16x9">
                                                        <iframe class="iframe" width="720" height="405" src="https://www.youtube.com/embed/WAl60Fn--SQ?si=F8-Guv6u-YSvZyjH?modestbranding=1&amp;color=white" frameborder="0" allowfullscreen></iframe>
                                                    </div>
                                                    <div class="overlay"></div>
                                                    <div class="fullscrin" data-slider="1" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery-video="https://www.youtube.com/embed/WAl60Fn--SQ?si=F8-Guv6u-YSvZyjH?modestbranding=1&amp;color=white?transparent=0">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="2" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>
                                                    <div class="fullscrin"
                                                         data-slider="2" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="3" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="3" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="4" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="4" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="5" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="5"
                                                         data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="6" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="6"
                                                         data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="7" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="7"
                                                         data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="8" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="8" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="9" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb05.png">
                                                    <div class="image-4x3"><img class="d-block w-100 object-fit-fill" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="9"
                                                         data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="10" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="10" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="11" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="11" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="12" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="12" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-button-prev text-white rounded"></div>
                                            <div class="swiper-button-next text-white rounded"></div>
                                        </div>
                                        <div class="slider-thumb d-flex">
                                            <div class="swiper slider-thumb__images slider-thumb__images--offer01" thumbsSlider="" style="--swiper-navigation-color:#000;--swiper-pagination-color:#000">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide youtube ratio swiper-item mb-2">
                                                        <video class="iframe object-fit-cover" autoplay muted loop poster="<?= get_stylesheet_directory_uri(); ?>/img/video-thumb.png">
                                                            <source src="<?= get_stylesheet_directory_uri(); ?>/assets/video-thumb.webm" type="video/webm">
                                                            <source src="<?= get_stylesheet_directory_uri(); ?>/assets/video-thumb.mp4" type="video/mp4">
                                                        </video>
                                                        <iframe class="iframe" width="560" height="315" src="https://www.youtube.com/embed/WAl60Fn--SQ?si=fDU1jMa6qKpuCmjg" title="YouTube video" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="thumb"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg" alt="thumb"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="thumb"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="thumb"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="thumb"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="thumb"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="thumb"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image05.png" alt="image"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="image"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="image"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12"> <a class="d-block fw-bold pb-2" href="">Занятия по программированию в Майнкрафт</a></div>
                                    <div class="col">
                                        <div class="d-flex flex-column justify-content-center align-items-start">
                                            <h5 class="text-danger text-nowrap m-0">1234 руб</h5>
                                            <p class="text-decoration-line-through">2500 руб</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="count d-flex flex-md-wrap flex-nowrap">
                                            <div class="count-content collapse pe-2" id="collapseCartCatalog4" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}"><span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>
                                                <input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>
                                            </div>
                                            <div class="btn-block ms-auto" href="#collapseCartCatalog4" data-bs-toggle="collapse">
                                                <button class="btn btn-outline-accent w-100">
                                                    <svg width="16" height="16" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.08337 9.5C3.44171 9.5 2.92254 10.025 2.92254 10.6667C2.92254 11.3083 3.44171 11.8333 4.08337 11.8333C4.72504 11.8333 5.25004 11.3083 5.25004 10.6667C5.25004 10.025 4.72504 9.5 4.08337 9.5ZM0.583374 0.166672V1.33334H1.75004L3.85004 5.76084L3.06254 7.19C2.96921 7.35334 2.91671 7.54584 2.91671 7.75C2.91671 8.39167 3.44171 8.91667 4.08337 8.91667H11.0834V7.75H4.32837C4.24671 7.75 4.18254 7.68584 4.18254 7.60417L4.20004 7.53417L4.72504 6.58334H9.07087C9.50837 6.58334 9.89337 6.34417 10.0917 5.9825L12.18 2.19667C12.2267 2.11501 12.25 2.01584 12.25 1.91667C12.25 1.59584 11.9875 1.33334 11.6667 1.33334H3.03921L2.49087 0.166672H0.583374ZM9.91671 9.5C9.27504 9.5 8.75587 10.025 8.75587 10.6667C8.75587 11.3083 9.27504 11.8333 9.91671 11.8333C10.5584 11.8333 11.0834 11.3083 11.0834 10.6667C11.0834 10.025 10.5584 9.5 9.91671 9.5Z" fill="currentColor"/>
                                                    </svg><span>В корзину</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="slider">
                                        <div class="swiper slider__images slider__images-cotalog slider__images--offer02">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide" data-slider="1" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery-video="https://www.youtube.com/embed/WAl60Fn--SQ?si=F8-Guv6u-YSvZyjH?modestbranding=1&amp;color=white?transparent=0">
                                                    <div class="youtube object-fit-contain ratio ratio-16x9">
                                                        <iframe class="iframe" width="720" height="405" src="https://www.youtube.com/embed/WAl60Fn--SQ?si=F8-Guv6u-YSvZyjH?modestbranding=1&amp;color=white" frameborder="0" allowfullscreen></iframe>
                                                    </div>
                                                    <div class="overlay"></div>
                                                    <div class="fullscrin" data-slider="1" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery-video="https://www.youtube.com/embed/WAl60Fn--SQ?si=F8-Guv6u-YSvZyjH?modestbranding=1&amp;color=white?transparent=0">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="2" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="2" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="3" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="3" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="4" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="4" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="5" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="5" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="6" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="6" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="7" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="7" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="8" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="8" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="9" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb05.png">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image05.png" alt="image"></div>
                                                    <div class="fullscrin" data-slider="9" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb05.png">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="10" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="10" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="11" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="11" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide" data-slider="12" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                                                    <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>
                                                    <div class="fullscrin" data-slider="12" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                                                        <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-button-prev text-white rounded"></div>
                                            <div class="swiper-button-next text-white rounded"></div>
                                        </div>
                                        <div class="slider-thumb d-flex">
                                            <div class="swiper slider-thumb__images slider-thumb__images--offer02" thumbsSlider="" style="--swiper-navigation-color:#000;--swiper-pagination-color:#000">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide youtube ratio swiper-item mb-2">
                                                        <video class="iframe object-fit-cover" autoplay muted loop poster="<?= get_stylesheet_directory_uri(); ?>/img/video-thumb.png">
                                                            <source src="<?= get_stylesheet_directory_uri(); ?>/assets/video-thumb.webm" type="video/webm">
                                                            <source src="<?= get_stylesheet_directory_uri(); ?>/assets/video-thumb.mp4" type="video/mp4">
                                                        </video>
                                                        <iframe class="iframe" width="560" height="315" src="https://www.youtube.com/embed/WAl60Fn--SQ?si=fDU1jMa6qKpuCmjg" title="YouTube video" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="thumb"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg" alt="thumb"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="thumb"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="thumb"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="thumb"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="thumb"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="thumb"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image05.png" alt="image"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="image"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="image"></div>
                                                    <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12"> <a class="d-block fw-bold pb-4" href="">Занятия по программированию в Майнкрафт</a></div>
                                    <div class="col">
                                        <div class="d-flex flex-column justify-content-center align-items-start">
                                            <h5 class="text-danger text-nowrap m-0">1234 руб</h5>
                                            <p class="text-decoration-line-through">2500 руб</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="count d-flex flex-md-wrap flex-nowrap">
                                            <div class="count-content collapse pe-2" id="collapseCartCatalog5" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}"><span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>
                                                <input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>
                                            </div>
                                            <div class="btn-block ms-auto" href="#collapseCartCatalog5" data-bs-toggle="collapse">
                                                <button class="btn btn-outline-accent w-100">
                                                    <svg width="16" height="16" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.08337 9.5C3.44171 9.5 2.92254 10.025 2.92254 10.6667C2.92254 11.3083 3.44171 11.8333 4.08337 11.8333C4.72504 11.8333 5.25004 11.3083 5.25004 10.6667C5.25004 10.025 4.72504 9.5 4.08337 9.5ZM0.583374 0.166672V1.33334H1.75004L3.85004 5.76084L3.06254 7.19C2.96921 7.35334 2.91671 7.54584 2.91671 7.75C2.91671 8.39167 3.44171 8.91667 4.08337 8.91667H11.0834V7.75H4.32837C4.24671 7.75 4.18254 7.68584 4.18254 7.60417L4.20004 7.53417L4.72504 6.58334H9.07087C9.50837 6.58334 9.89337 6.34417 10.0917 5.9825L12.18 2.19667C12.2267 2.11501 12.25 2.01584 12.25 1.91667C12.25 1.59584 11.9875 1.33334 11.6667 1.33334H3.03921L2.49087 0.166672H0.583374ZM9.91671 9.5C9.27504 9.5 8.75587 10.025 8.75587 10.6667C8.75587 11.3083 9.27504 11.8333 9.91671 11.8333C10.5584 11.8333 11.0834 11.3083 11.0834 10.6667C11.0834 10.025 10.5584 9.5 9.91671 9.5Z" fill="currentColor"/>
                                                    </svg><span>В корзину</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="image-4x3 text-center mb-3"><img class="img-fluid rounded" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt=""></div>
                                </div>
                                <div class="row">
                                    <div class="col-12"> <a class="d-block fw-bold pb-4" href="">Занятия по программированию в Майнкрафт</a></div>
                                    <div class="col">
                                        <div class="d-flex flex-column justify-content-center align-items-start">
                                            <h5 class="text-danger text-nowrap m-0">1234 руб</h5>
                                            <p class="text-decoration-line-through">2500 руб</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="count d-flex flex-md-wrap flex-nowrap">
                                            <div class="count-content collapse pe-2" id="collapseCartCatalog6" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}"><span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>
                                                <input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>
                                            </div>
                                            <div class="btn-block ms-auto" href="#collapseCartCatalog6" data-bs-toggle="collapse">
                                                <button class="btn btn-outline-accent w-100">
                                                    <svg width="16" height="16" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.08337 9.5C3.44171 9.5 2.92254 10.025 2.92254 10.6667C2.92254 11.3083 3.44171 11.8333 4.08337 11.8333C4.72504 11.8333 5.25004 11.3083 5.25004 10.6667C5.25004 10.025 4.72504 9.5 4.08337 9.5ZM0.583374 0.166672V1.33334H1.75004L3.85004 5.76084L3.06254 7.19C2.96921 7.35334 2.91671 7.54584 2.91671 7.75C2.91671 8.39167 3.44171 8.91667 4.08337 8.91667H11.0834V7.75H4.32837C4.24671 7.75 4.18254 7.68584 4.18254 7.60417L4.20004 7.53417L4.72504 6.58334H9.07087C9.50837 6.58334 9.89337 6.34417 10.0917 5.9825L12.18 2.19667C12.2267 2.11501 12.25 2.01584 12.25 1.91667C12.25 1.59584 11.9875 1.33334 11.6667 1.33334H3.03921L2.49087 0.166672H0.583374ZM9.91671 9.5C9.27504 9.5 8.75587 10.025 8.75587 10.6667C8.75587 11.3083 9.27504 11.8333 9.91671 11.8333C10.5584 11.8333 11.0834 11.3083 11.0834 10.6667C11.0834 10.025 10.5584 9.5 9.91671 9.5Z" fill="currentColor"/>
                                                    </svg><span>В корзину</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="mb-3"><img class="d-block w-100 object-fit-fill" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg" alt=""></div>
                                </div>
                                <div class="row">
                                    <div class="col-12"> <a class="d-block fw-bold pb-4" href="">Занятия по программированию в Майнкрафт</a></div>
                                    <div class="col">
                                        <div class="d-flex flex-column justify-content-center align-items-start">
                                            <h5 class="text-danger text-nowrap m-0">1234 руб</h5>
                                            <p class="text-decoration-line-through">2500 руб</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="count d-flex flex-md-wrap flex-nowrap">
                                            <div class="count-content collapse pe-2" id="collapseCartCatalog8" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}"><span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>
                                                <input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>
                                            </div>
                                            <div class="btn-block ms-auto" href="#collapseCartCatalog8" data-bs-toggle="collapse">
                                                <button class="btn btn-outline-accent">
                                                    <svg width="16" height="16" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.08337 9.5C3.44171 9.5 2.92254 10.025 2.92254 10.6667C2.92254 11.3083 3.44171 11.8333 4.08337 11.8333C4.72504 11.8333 5.25004 11.3083 5.25004 10.6667C5.25004 10.025 4.72504 9.5 4.08337 9.5ZM0.583374 0.166672V1.33334H1.75004L3.85004 5.76084L3.06254 7.19C2.96921 7.35334 2.91671 7.54584 2.91671 7.75C2.91671 8.39167 3.44171 8.91667 4.08337 8.91667H11.0834V7.75H4.32837C4.24671 7.75 4.18254 7.68584 4.18254 7.60417L4.20004 7.53417L4.72504 6.58334H9.07087C9.50837 6.58334 9.89337 6.34417 10.0917 5.9825L12.18 2.19667C12.2267 2.11501 12.25 2.01584 12.25 1.91667C12.25 1.59584 11.9875 1.33334 11.6667 1.33334H3.03921L2.49087 0.166672H0.583374ZM9.91671 9.5C9.27504 9.5 8.75587 10.025 8.75587 10.6667C8.75587 11.3083 9.27504 11.8333 9.91671 11.8333C10.5584 11.8333 11.0834 11.3083 11.0834 10.6667C11.0834 10.025 10.5584 9.5 9.91671 9.5Z" fill="currentColor"/>
                                                    </svg><span>В корзину</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">

              <div class="row">
                <h2 class="block-title pb-md-5 pb-3">Предложения других продавцов</h2>
                <div class="d-lg-block">
                  <?php
                    filter_single_product_bottom( 'front' );
                  ?>
                </div>
                <div class="d-lg-none d-block">
                  <div class="mb-3">
                    <div class="row">
                      <div class="slider">
                        <div class="swiper slider__images slider__images-cotalog slider__images--offer01">
                          <div class="swiper-wrapper">
                            <div class="swiper-slide" data-slider="1" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery-video="https://www.youtube.com/embed/WAl60Fn--SQ?si=F8-Guv6u-YSvZyjH?modestbranding=1&amp;color=white?transparent=0">
                              <div class="youtube object-fit-contain ratio ratio-16x9">
                                <iframe class="iframe" width="720" height="405" src="https://www.youtube.com/embed/WAl60Fn--SQ?si=F8-Guv6u-YSvZyjH?modestbranding=1&amp;color=white" frameborder="0" allowfullscreen></iframe>
                              </div>
                              <div class="overlay"></div>
                              <div class="fullscrin" data-slider="1" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery-video="https://www.youtube.com/embed/WAl60Fn--SQ?si=F8-Guv6u-YSvZyjH?modestbranding=1&amp;color=white?transparent=0">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="2" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>
                              <div class="fullscrin"
                              data-slider="2" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="3" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="3" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="4" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="4" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="5" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="5"
                              data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="6" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="6"
                              data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="7" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="7"
                              data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="8" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="8" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="9" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb05.png">
                              <div class="image-4x3"><img class="d-block w-100 object-fit-fill" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="9"
                              data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="10" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="10" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="11" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="11" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="12" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="12" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                          </div>
                          <div class="swiper-button-prev text-white rounded"></div>
                          <div class="swiper-button-next text-white rounded"></div>
                        </div>
                        <div class="slider-thumb d-flex">
                          <div class="swiper slider-thumb__images slider-thumb__images--offer01" thumbsSlider="" style="--swiper-navigation-color:#000;--swiper-pagination-color:#000">
                            <div class="swiper-wrapper">
                              <div class="swiper-slide youtube ratio swiper-item mb-2">
                              <video class="iframe object-fit-cover" autoplay muted loop poster="<?= get_stylesheet_directory_uri(); ?>/img/video-thumb.png">
                                  <source src="<?= get_stylesheet_directory_uri(); ?>/assets/video-thumb.webm" type="video/webm">
                                  <source src="<?= get_stylesheet_directory_uri(); ?>/assets/video-thumb.mp4" type="video/mp4">
                                </video>
                                <iframe class="iframe" width="560" height="315" src="https://www.youtube.com/embed/WAl60Fn--SQ?si=fDU1jMa6qKpuCmjg" title="YouTube video" frameborder="0"></iframe>
                              </div>
                              <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="thumb"></div>
                              <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg" alt="thumb"></div>
                              <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="thumb"></div>
                              <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="thumb"></div>
                              <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="thumb"></div>
                              <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="thumb"></div>
                              <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="thumb"></div>
                              <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image05.png" alt="image"></div>
                              <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="image"></div>
                              <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="image"></div>
                              <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12"> <a class="d-block fw-bold pb-2" href="">Занятия по программированию в Майнкрафт</a></div>
                      <div class="col">
                        <div class="d-flex flex-column justify-content-center align-items-start">
                          <h5 class="text-danger text-nowrap m-0">1234 руб</h5>
                          <p class="text-decoration-line-through">2500 руб</p>
                        </div>
                      </div>
                      <div class="col">
                        <div class="count d-flex flex-md-wrap flex-nowrap">
                          <div class="count-content collapse pe-2" id="collapseCartCatalog4" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}"><span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>
                            <input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>
                          </div>
                          <div class="btn-block ms-auto" href="#collapseCartCatalog4" data-bs-toggle="collapse">
                            <button class="btn btn-outline-accent w-100">
                            <svg width="16" height="16" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M4.08337 9.5C3.44171 9.5 2.92254 10.025 2.92254 10.6667C2.92254 11.3083 3.44171 11.8333 4.08337 11.8333C4.72504 11.8333 5.25004 11.3083 5.25004 10.6667C5.25004 10.025 4.72504 9.5 4.08337 9.5ZM0.583374 0.166672V1.33334H1.75004L3.85004 5.76084L3.06254 7.19C2.96921 7.35334 2.91671 7.54584 2.91671 7.75C2.91671 8.39167 3.44171 8.91667 4.08337 8.91667H11.0834V7.75H4.32837C4.24671 7.75 4.18254 7.68584 4.18254 7.60417L4.20004 7.53417L4.72504 6.58334H9.07087C9.50837 6.58334 9.89337 6.34417 10.0917 5.9825L12.18 2.19667C12.2267 2.11501 12.25 2.01584 12.25 1.91667C12.25 1.59584 11.9875 1.33334 11.6667 1.33334H3.03921L2.49087 0.166672H0.583374ZM9.91671 9.5C9.27504 9.5 8.75587 10.025 8.75587 10.6667C8.75587 11.3083 9.27504 11.8333 9.91671 11.8333C10.5584 11.8333 11.0834 11.3083 11.0834 10.6667C11.0834 10.025 10.5584 9.5 9.91671 9.5Z" fill="currentColor"/>
                            </svg><span>В корзину</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="slider">
                        <div class="swiper slider__images slider__images-cotalog slider__images--offer02">
                          <div class="swiper-wrapper">
                            <div class="swiper-slide" data-slider="1" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery-video="https://www.youtube.com/embed/WAl60Fn--SQ?si=F8-Guv6u-YSvZyjH?modestbranding=1&amp;color=white?transparent=0">
                              <div class="youtube object-fit-contain ratio ratio-16x9">
                                <iframe class="iframe" width="720" height="405" src="https://www.youtube.com/embed/WAl60Fn--SQ?si=F8-Guv6u-YSvZyjH?modestbranding=1&amp;color=white" frameborder="0" allowfullscreen></iframe>
                              </div>
                              <div class="overlay"></div>
                              <div class="fullscrin" data-slider="1" data-bs-toggle="modal" data-bs-target="#backdrop-2" data-bs-gallery-video="https://www.youtube.com/embed/WAl60Fn--SQ?si=F8-Guv6u-YSvZyjH?modestbranding=1&amp;color=white?transparent=0">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="2" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="2" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="3" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="3" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="4" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="4" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="5" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="5" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="6" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="6" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="7" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="7" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="8" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="8" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="9" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb05.png">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image05.png" alt="image"></div>
                              <div class="fullscrin" data-slider="9" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb05.png">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="10" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="10" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="11" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="11" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                            <div class="swiper-slide" data-slider="12" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                              <div class="image-4x3"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>
                              <div class="fullscrin" data-slider="12" data-bs-toggle="modal" data-bs-target="#backdrop-3" data-bs-gallery="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg">
                                <svg class="bi bi-aspect-ratio bg-opacity-75 text-bg-secondary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                  <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path>
                                </svg>
                              </div>
                            </div>
                          </div>
                          <div class="swiper-button-prev text-white rounded"></div>
                          <div class="swiper-button-next text-white rounded"></div>
                        </div>
                        <div class="slider-thumb d-flex">
                          <div class="swiper slider-thumb__images slider-thumb__images--offer02" thumbsSlider="" style="--swiper-navigation-color:#000;--swiper-pagination-color:#000">
                            <div class="swiper-wrapper">
                              <div class="swiper-slide youtube ratio swiper-item mb-2">
                                <video class="iframe object-fit-cover" autoplay muted loop poster="<?= get_stylesheet_directory_uri(); ?>/img/video-thumb.png">
                                  <source src="<?= get_stylesheet_directory_uri(); ?>/assets/video-thumb.webm" type="video/webm">
                                  <source src="<?= get_stylesheet_directory_uri(); ?>/assets/video-thumb.mp4" type="video/mp4">
                                </video>
                                <iframe class="iframe" width="560" height="315" src="https://www.youtube.com/embed/WAl60Fn--SQ?si=fDU1jMa6qKpuCmjg" title="YouTube video" frameborder="0"></iframe>
                              </div>
                                <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="thumb"></div>
                                <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg" alt="thumb"></div>
                                <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="thumb"></div>
                                <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="thumb"></div>
                                <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="thumb"></div>
                                <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="thumb"></div>
                                <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="thumb"></div>
                                <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image05.png" alt="image"></div>
                                <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="image"></div>
                                <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="image"></div>
                                <div class="swiper-slide swiper-item mb-2"><img src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="image"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12"> <a class="d-block fw-bold pb-4" href="">Занятия по программированию в Майнкрафт</a></div>
                      <div class="col">
                        <div class="d-flex flex-column justify-content-center align-items-start">
                          <h5 class="text-danger text-nowrap m-0">1234 руб</h5>
                          <p class="text-decoration-line-through">2500 руб</p>
                        </div>
                      </div>
                      <div class="col">
                        <div class="count d-flex flex-md-wrap flex-nowrap">
                          <div class="count-content collapse pe-2" id="collapseCartCatalog5" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}"><span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>
                            <input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>
                          </div>
                          <div class="btn-block ms-auto" href="#collapseCartCatalog5" data-bs-toggle="collapse">
                            <button class="btn btn-outline-accent w-100">
                            <svg width="16" height="16" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M4.08337 9.5C3.44171 9.5 2.92254 10.025 2.92254 10.6667C2.92254 11.3083 3.44171 11.8333 4.08337 11.8333C4.72504 11.8333 5.25004 11.3083 5.25004 10.6667C5.25004 10.025 4.72504 9.5 4.08337 9.5ZM0.583374 0.166672V1.33334H1.75004L3.85004 5.76084L3.06254 7.19C2.96921 7.35334 2.91671 7.54584 2.91671 7.75C2.91671 8.39167 3.44171 8.91667 4.08337 8.91667H11.0834V7.75H4.32837C4.24671 7.75 4.18254 7.68584 4.18254 7.60417L4.20004 7.53417L4.72504 6.58334H9.07087C9.50837 6.58334 9.89337 6.34417 10.0917 5.9825L12.18 2.19667C12.2267 2.11501 12.25 2.01584 12.25 1.91667C12.25 1.59584 11.9875 1.33334 11.6667 1.33334H3.03921L2.49087 0.166672H0.583374ZM9.91671 9.5C9.27504 9.5 8.75587 10.025 8.75587 10.6667C8.75587 11.3083 9.27504 11.8333 9.91671 11.8333C10.5584 11.8333 11.0834 11.3083 11.0834 10.6667C11.0834 10.025 10.5584 9.5 9.91671 9.5Z" fill="currentColor"/>
                            </svg><span>В корзину</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="image-4x3 text-center mb-3"><img class="img-fluid rounded" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt=""></div>
                    </div>
                    <div class="row">
                      <div class="col-12"> <a class="d-block fw-bold pb-4" href="">Занятия по программированию в Майнкрафт</a></div>
                      <div class="col">
                        <div class="d-flex flex-column justify-content-center align-items-start">
                          <h5 class="text-danger text-nowrap m-0">1234 руб</h5>
                          <p class="text-decoration-line-through">2500 руб</p>
                        </div>
                      </div>
                      <div class="col">
                        <div class="count d-flex flex-md-wrap flex-nowrap">
                          <div class="count-content collapse pe-2" id="collapseCartCatalog6" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}"><span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>
                            <input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>
                          </div>
                          <div class="btn-block ms-auto" href="#collapseCartCatalog6" data-bs-toggle="collapse">
                            <button class="btn btn-outline-accent w-100">
                            <svg width="16" height="16" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M4.08337 9.5C3.44171 9.5 2.92254 10.025 2.92254 10.6667C2.92254 11.3083 3.44171 11.8333 4.08337 11.8333C4.72504 11.8333 5.25004 11.3083 5.25004 10.6667C5.25004 10.025 4.72504 9.5 4.08337 9.5ZM0.583374 0.166672V1.33334H1.75004L3.85004 5.76084L3.06254 7.19C2.96921 7.35334 2.91671 7.54584 2.91671 7.75C2.91671 8.39167 3.44171 8.91667 4.08337 8.91667H11.0834V7.75H4.32837C4.24671 7.75 4.18254 7.68584 4.18254 7.60417L4.20004 7.53417L4.72504 6.58334H9.07087C9.50837 6.58334 9.89337 6.34417 10.0917 5.9825L12.18 2.19667C12.2267 2.11501 12.25 2.01584 12.25 1.91667C12.25 1.59584 11.9875 1.33334 11.6667 1.33334H3.03921L2.49087 0.166672H0.583374ZM9.91671 9.5C9.27504 9.5 8.75587 10.025 8.75587 10.6667C8.75587 11.3083 9.27504 11.8333 9.91671 11.8333C10.5584 11.8333 11.0834 11.3083 11.0834 10.6667C11.0834 10.025 10.5584 9.5 9.91671 9.5Z" fill="currentColor"/>
                            </svg><span>В корзину</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="mb-3"><img class="d-block w-100 object-fit-fill" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/thumb02.jpg" alt=""></div>
                    </div>
                    <div class="row">
                      <div class="col-12"> <a class="d-block fw-bold pb-4" href="">Занятия по программированию в Майнкрафт</a></div>
                      <div class="col">
                        <div class="d-flex flex-column justify-content-center align-items-start">
                          <h5 class="text-danger text-nowrap m-0">1234 руб</h5>
                          <p class="text-decoration-line-through">2500 руб</p>
                        </div>
                      </div>
                      <div class="col">
                        <div class="count d-flex flex-md-wrap flex-nowrap">
                          <div class="count-content collapse pe-2" id="collapseCartCatalog8" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}"><span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>
                            <input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>
                          </div>
                          <div class="btn-block ms-auto" href="#collapseCartCatalog8" data-bs-toggle="collapse">
                            <button class="btn btn-outline-accent">
                            <svg width="16" height="16" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M4.08337 9.5C3.44171 9.5 2.92254 10.025 2.92254 10.6667C2.92254 11.3083 3.44171 11.8333 4.08337 11.8333C4.72504 11.8333 5.25004 11.3083 5.25004 10.6667C5.25004 10.025 4.72504 9.5 4.08337 9.5ZM0.583374 0.166672V1.33334H1.75004L3.85004 5.76084L3.06254 7.19C2.96921 7.35334 2.91671 7.54584 2.91671 7.75C2.91671 8.39167 3.44171 8.91667 4.08337 8.91667H11.0834V7.75H4.32837C4.24671 7.75 4.18254 7.68584 4.18254 7.60417L4.20004 7.53417L4.72504 6.58334H9.07087C9.50837 6.58334 9.89337 6.34417 10.0917 5.9825L12.18 2.19667C12.2267 2.11501 12.25 2.01584 12.25 1.91667C12.25 1.59584 11.9875 1.33334 11.6667 1.33334H3.03921L2.49087 0.166672H0.583374ZM9.91671 9.5C9.27504 9.5 8.75587 10.025 8.75587 10.6667C8.75587 11.3083 9.27504 11.8333 9.91671 11.8333C10.5584 11.8333 11.0834 11.3083 11.0834 10.6667C11.0834 10.025 10.5584 9.5 9.91671 9.5Z" fill="currentColor"/>
                            </svg><span>В корзину</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </main>
    <div class="modal fade" id="backdrop-1" tabindex="-1" role="dialog" aria-labelledby="backdrop-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
            <div class="modal-content position-relative">
                <div class="modal-header position-absolute top-0 end-0 border-0 z-3">
                    <button class="btn-close bg-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="carousel slide slider__images--modal carousel-fade h-100" id="carouselButtons-1">
                    <div class="carousel-inner">
                        <?php
                        if ( $product_video) {
                        ?>
                        <div class="carousel-item bg-white active">
                            <div class="youtube ratio ratio-16x9">
                            <iframe class="iframe object-fit-cover" src="<?php echo $product_video; ?>" allow="autoplay;" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <?php }
                            if ( $gallery_attachment_ids ) {
                                foreach ($gallery_attachment_ids as $gallery_attachment_id) {
                                ?>
                                    <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                                    <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= wp_get_attachment_url( $gallery_attachment_id, 'full' ); ?>" alt="..."></div>
                                    </div>
                                <?php }
                            }
                        ?>

                    </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselButtons-1" data-bs-slide="prev"><span class="carousel-control-prev-icon text-bg-dark rounded" aria-hidden="true"></span><span class="visually-hidden">Предыдущий</span></button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselButtons-1" data-bs-slide="next"><span class="carousel-control-next-icon text-bg-dark rounded" aria-hidden="true"></span><span class="visually-hidden">Следующий</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="backdrop-image" tabindex="-1" role="dialog" aria-labelledby="backdrop-image" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
            <div class="modal-content position-relative">
                <div class="modal-header position-absolute top-0 end-0 border-0 z-3">
                    <button class="btn-close bg-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="carousel slide slider__images--modal carousel-fade h-100" id="imageButtons">
                        <div class="carousel-inner">
                            <?php
                            if ( $product_video) {
                                ?>
                                <div class="carousel-item bg-white active">
                                    <div class="youtube ratio ratio-16x9">
                                        <iframe class="iframe object-fit-cover" src="<?php echo $product_video; ?>" allow="autoplay;" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            <?php }
                            if ( $gallery_attachment_ids ) {
                                foreach ($gallery_attachment_ids as $gallery_attachment_id) {
                                    ?>
                                    <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                                        <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= wp_get_attachment_url( $gallery_attachment_id, 'full' ); ?>" alt="..."></div>
                                    </div>
                                <?php }
                            }
                            if (!$product_video && $gallery_attachment_ids) {
                                foreach ($gallery_attachment_ids as $gallery_attachment_id) {
                                    ?>
                                    <div class="carousel-item d-flex justify-content-center align-items-center bg-white active">
                                        <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= wp_get_attachment_url( $gallery_attachment_id,'full' ); ?>" alt="..."></div>
                                    </div>
                                <?php }
                            }

                            ?>
                        </div>
                        <button class="carousel-control-prev d-none" type="button" data-bs-target="#carouselButtons-1" data-bs-slide="prev"><span class="carousel-control-prev-icon text-bg-dark rounded" aria-hidden="true"></span><span class="visually-hidden">Предыдущий</span></button>
                        <button class="carousel-control-next d-none" type="button" data-bs-target="#carouselButtons-1" data-bs-slide="next"><span class="carousel-control-next-icon text-bg-dark rounded" aria-hidden="true"></span><span class="visually-hidden">Следующий</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="backdrop-video" tabindex="-1" role="dialog" aria-labelledby="backdrop-video" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
            <div class="modal-content position-relative">
                <div class="modal-header position-absolute top-0 end-0 border-0 z-3">
                    <button class="btn-close bg-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="carousel slide slider__images--modal carousel-fade h-100" id="carouselButtons-2">
                        <div class="carousel-inner">
                            <?php
                            if ( $product_video) {
                                ?>
                                <div class="carousel-item bg-white active">
                                    <div class="youtube ratio ratio-16x9">
                                        <iframe class="iframe object-fit-cover" src="<?php echo $product_video; ?>" allow="autoplay;" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                        <button class="carousel-control-prev d-none" type="button" data-bs-target="#carouselButtons-2" data-bs-slide="prev"><span class="carousel-control-prev-icon text-bg-dark rounded" aria-hidden="true"></span><span class="visually-hidden">Предыдущий</span></button>
                        <button class="carousel-control-next d-none" type="button" data-bs-target="#carouselButtons-2" data-bs-slide="next"><span class="carousel-control-next-icon text-bg-dark rounded" aria-hidden="true"></span><span class="visually-hidden">Следующий</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="backdrop-2" tabindex="-1" role="dialog" aria-labelledby="backdrop-2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
            <div class="modal-content position-relative">
                <div class="modal-header position-absolute top-0 end-0 border-0 z-3">
                    <button class="btn-close bg-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="carousel slide slider__images--modal carousel-fade h-100" id="carouselButtons-2">
                        <div class="carousel-inner">
                            <?php
                            if ( $product_video) {
                                ?>
                                <div class="carousel-item bg-white active">
                                    <div class="youtube ratio ratio-16x9">
                                        <iframe class="iframe object-fit-cover" src="<?php echo $product_video; ?>" allow="autoplay;" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            <?php }
                            if ( $gallery_attachment_ids ) {
                                foreach ($gallery_attachment_ids as $gallery_attachment_id) {
                                    ?>
                                    <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                                        <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= wp_get_attachment_url( $gallery_attachment_id, 'full' ); ?>" alt="..."></div>
                                    </div>
                                <?php }
                            }
                            if (!$product_video && $gallery_attachment_ids) {
                                foreach ($gallery_attachment_ids as $gallery_attachment_id) {
                                    ?>
                                    <div class="carousel-item d-flex justify-content-center align-items-center bg-white active">
                                        <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= wp_get_attachment_url( $gallery_attachment_id, 'full' ); ?>" alt="..."></div>
                                    </div>
                                <?php }
                            }

                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselButtons-2" data-bs-slide="prev"><span class="carousel-control-prev-icon text-bg-dark rounded" aria-hidden="true"></span><span class="visually-hidden">Предыдущий</span></button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselButtons-2" data-bs-slide="next"><span class="carousel-control-next-icon text-bg-dark rounded" aria-hidden="true"></span><span class="visually-hidden">Следующий</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="backdrop-3" tabindex="-1" role="dialog" aria-labelledby="backdrop-3" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
            <div class="modal-content position-relative">
                <div class="modal-header position-absolute top-0 end-0 border-0 z-3">
                    <button class="btn-close bg-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="carousel slide slider__images--modal carousel-fade h-100" id="carouselButtons-3">
                        <div class="carousel-inner">
                            <?php
                            if ( $product_video) {
                                ?>
                                <div class="carousel-item bg-white active">
                                    <div class="youtube ratio ratio-16x9">
                                        <iframe class="iframe object-fit-cover" src="<?php echo $product_video; ?>" allow="autoplay;" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            <?php }
                            if ( $gallery_attachment_ids ) {
                                foreach ($gallery_attachment_ids as $gallery_attachment_id) {
                                    ?>
                                    <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                                        <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= wp_get_attachment_url( $gallery_attachment_id, 'full' ); ?>" alt="..."></div>
                                    </div>
                                <?php }
                            }
                            if (!$product_video && $gallery_attachment_ids) {
                                foreach ($gallery_attachment_ids as $gallery_attachment_id) {
                                    ?>
                                    <div class="carousel-item d-flex justify-content-center align-items-center bg-white active">
                                        <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= wp_get_attachment_url( $gallery_attachment_id, 'full' ); ?>" alt="..."></div>
                                    </div>
                                <?php }
                            }

                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselButtons-3" data-bs-slide="prev"><span class="carousel-control-prev-icon text-bg-dark rounded" aria-hidden="true"></span><span class="visually-hidden">Предыдущий</span></button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselButtons-3" data-bs-slide="next"><span class="carousel-control-next-icon text-bg-dark rounded" aria-hidden="true"></span><span class="visually-hidden">Следующий</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php



// get_footer( 'shop' );
get_footer(); // Вставляем подвал сайта

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
