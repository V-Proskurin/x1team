<?php
/*
Template Name: Edit Vendor Product
*/
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

get_header(); // Вставляем заголовок сайта

if ( !isset( $_GET['edit-id'] ) || $_GET['edit-id'] == '') return;
$_product = wc_get_product( $_GET['edit-id'] );
// var_dump($_product);
?>

<?php

$gallery_attachment_ids = $_product->get_gallery_image_ids();
$product_video = $_product->get_meta('product_link_video');
$total_count = count( $gallery_attachment_ids );
$product_cover = get_the_post_thumbnail_url($_product->get_id(), 'full');
?>
<style>

    #product-title {
        font-size: 18px;
        width: 100%;
    }
    #product-price {

        font-size: 18px;
    }
    #product-regular-price {

        font-size: 18px;
    }


</style>
<main class="main pb-5">
    <div class="container-sm container-fluid mb-5">
        <div class="row h-100">

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

            <!-- слайдер с табами изображениями - НАЧАЛО -->
            <div class="col-lg-7">
                <h5>Обложка товара</h5>
                <div class="product-cover" style="background-image:url(<?php echo ($product_cover) ? $product_cover : wc_placeholder_img_src(); ?>)"></div>
                <form enctype="multipart/form-data" action="" method="POST" id="coverUplodForm">
                    <?php wp_nonce_field( 'x1VendorCoverUpload', 'coverupload_nonce' ); ?>
                    <div class="col-lg-12">
                        <label for="formFileMultiple" class="form-label">Обновить обложку</label>
                        <input type="file" id="uploadCoverInput" name="cover-upload" accept="image/*" style="display:none; "/>
                        <input type="button" class="form-control" value="Выбрать файл" onclick="document.getElementById('uploadCoverInput').click();" />
                        <!-- <button type="button" class="btn btn-outline-accent my-3" id="uploadProductFiles" data-post_id="97">Загрузить</button> -->
                    </div>
                </form>

                <h5>Галерея товара</h5>
                <div class="product-gallery"<?php if ( !$gallery_attachment_ids) : ?> style="display:none;"<?php endif; ?>>
                    <div class="row">
                        <?php if ( $gallery_attachment_ids) : ?>
                            <?php foreach ($gallery_attachment_ids as $gallery_attachment_id) : ?>
                                <div class="image" data-image-id="<?= $gallery_attachment_id; ?>">
                                    <img src="<?= wp_get_attachment_url( $gallery_attachment_id, 'full' ); ?>" alt="image">
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <?php wp_nonce_field( 'x1VendorImageDelete', 'fileuremove_nonce' ); ?>
                </div>

                <form enctype="multipart/form-data" action="" method="POST">
                    <?php wp_nonce_field( 'x1VendorUpload', 'fileupload_nonce' ); ?>
                    <div class="col-lg-12">
                        <label for="formFileMultiple" class="form-label">Загрузить фото в галерею</label>
                        <input type="file" id="uploadImagesInput" name="gallery-upload" accept="image/*" multiple style="display:none; "/>
                        <input type="button" class="form-control" value="Выбрать файлы" onclick="document.getElementById('uploadImagesInput').click();" />
                        <!-- <button type="button" class="btn btn-outline-accent my-3" id="uploadProductFiles" data-post_id="97">Загрузить</button> -->
                    </div>
                </form>
                <br>
                <h5>Видео товара </h5>
                <?php if (strlen($product_video) > 3) : ?>
                    <iframe width="100%" height="315" src="<?php echo $product_video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <?php endif; ?>
                <br>
                <p>Ссылка видео</p>
                <input type="text" name="product-video" class="form-control" id="product-video" value="<?php echo $product_video; ?>">
            </div>
            <div class="col-lg-5">
                <div class="card card-body border-0 mt-lg-0 mt-5 pt-lg-0 pt-md-5 py-0 px-lg-3 px-0 h-100">
                    <?php
                    if( current_user_can('edit_pages') || current_user_can('yith_vendor')) { ?>
                        <div class="d-flex justify-content-between align-items-center w-100 py-md-0 pt-4 pb-3">
                            <a href="">
                                <span class="text-accent fw-bold d-lg-none d-block">Услуги</span>
                            </a>
                            <div>
                                <button type="button" class="btn btn-outline-accent my-3" id="updateVendorProduct" data-post_id="<?php echo $_product->get_ID() ?>">Сохранить</button>
                                <a href="<?php echo get_post_permalink( $_product->get_ID() ); ?>" class="btn btn-outline-accent">Назад</a>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="row my-auto">
                        <div class="col-12 text-lable">
                            <div class="mt-3">
                                <input type="text" name="product-title" class="form-control" id="product-title" value="<?php echo $_product->get_name() ?>">

                            </div>
                            <div class="mb-3"></div>
                            <span>
                        <?php // echo get_the_excerpt() ?>
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
                            <div class="d-flex justify-content-xl-start justify-content-lg-center justify-content-start align-items-end gap-2 mt-2 mb-3">
                                <div class="text-danger text-nowrap m-0">
                                    <input type="text" name="product-price" class="form-control" id="product-price" value="<?php echo $_product->get_price() ?>" placeholder="Укажите цену"> <span class="fs-4"><?php echo get_woocommerce_currency_symbol()?></span>
                                </div>
                                <div>
                                    <input type="text" name="product-regular-price" class="form-control" id="product-regular-price" value="<?php echo $_product->get_regular_price() ?>" placeholder="Укажите цену без скидки" > <span class="fs-4"><?php echo get_woocommerce_currency_symbol()?></span>
                                </div>
                            </div>
                            <div class="">
                                <strong>Категории</strong>
                                <?php



                                $taxonomy = 'product_cat';
                                $terms = get_the_terms( $_product->get_ID(), $taxonomy);
                                $terms_ids = [];
                                foreach ($terms as $key => $t) {
                                    $terms_ids[] = $t->term_id;
                                }
                                $args = array(
                                    'taxonomy'     => $taxonomy,
                                    'orderby'      => 'name',
                                    'show_count'   => 0,
                                    'pad_counts'   => 0,
                                    'hierarchical' => 1,
                                    'hide_empty'   => 0
                                );
                                $all_categories = get_categories( $args );

                                $html = '';
                                foreach ($all_categories as $cat) {
                                    $checked = '';

                                    if ( in_array($cat->term_id, $terms_ids)) {
                                        $checked = 'checked';
                                    }
                                    if($cat->category_parent == 0) {
                                        $category_id = $cat->term_id;

                                        $cat_url = get_term_link($cat->slug, $taxonomy);
                                        $cat_name = $cat->name;
                                        if ( $cat_name == 'Misc') continue;

                                        $args2 = array(
                                            'taxonomy'     => $taxonomy,
                                            'child_of'     => 0,
                                            'parent'       => $category_id,
                                            'orderby'      => $orderby,
                                            'show_count'   => $show_count,
                                            'pad_counts'   => $pad_counts,
                                            'hierarchical' => $hierarchical,
                                            'title_li'     => $title,
                                            'hide_empty'   => $empty
                                        );
                                        $sub_cats = get_categories( $args2 );
                                        $html_inner = '';
                                        if($sub_cats) {
                                            $isset_sub_class = 'form-list';
                                            $html_inner = '<a class="d-block collapsed" data-bs-toggle="collapse" href="#collapseCatalogItem'.$category_id.'" role="button" aria-controls="collapseCatalogItem'.$category_id.'">
                                        <input class="form-check-input cat_product" type="checkbox" name="cat_product[]" value="'.$category_id.'" id="'.$category_id.'" '.$checked.'>
                                        <label class="form-check-label" for="'.$category_id.'">'.$cat_name.'</label>
                                        <div class="form-check-arrow"></div>
                                    </a>
                                    <div class="collapse show" id="collapseCatalogItem'.$category_id.'">
                                    ';
                                            foreach($sub_cats as $sub_category) {
                                                $checked = '';
                                                $sub_category_id = $sub_category->term_id;
                                                $sub_cat_name = $sub_category->name;

                                                if ( in_array($sub_category->term_id, $terms_ids)) {
                                                    $checked = 'checked';
                                                }

                                                $html_inner .= '<div class="form-check">
                                            <input class="form-check-input cat_product" type="checkbox" name="cat_product[]" value="'.$sub_category_id.'" id="'.$sub_category_id.'" '.$checked.'>
                                            <label class="form-check-label" for="'.$sub_category_id.'">'.$sub_cat_name.'</label>
                                        </div>';
                                            }
                                            $html_inner .= '</div>';
                                        } else {
                                            $isset_sub_class = '';
                                            $html_inner = '<input class="form-check-input cat_product" type="checkbox" name="cat_product[]" value="'.$category_id.'" id="'.$category_id.'" '.$checked.'>
                                    <label class="form-check-label" for="'.$category_id.'">'.$cat_name.'</label>';
                                        }
                                        $html .= '<div class="form-check border-bottom py-2 '.$isset_sub_class.'"> '.$html_inner.' </div>';
                                    }
                                }
                                // $wrapper = '<div class="form-check border-bottom py-2">
                                //                 <input class="form-check-input" type="checkbox" value="cat_user_announcements" name="cat_product[]" id="user_announcements" checked>
                                //                 <label class="form-check-label" for="user_announcements">Мои объявления</label>
                                //             </div>' . $html;
                                $wrapper = $html;
                                echo $wrapper;

                                ?>
                            </div>

                            <!--
                    <div class="soc-link d-flex align-items-center justify-content-xl-start justify-content-center flex-wrap gap-2 py-3">
                      <div class="count d-flex flex-md-wrap flex-nowrap">
                        <div class="count-content collapse pe-2" id="collapseCart" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}">
                          <span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>
                          <input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>
                        </div>
                        <div class="btn-block">
                          <div class="add-to-cart-container mt-auto">
                            <a href="?add-to-cart=<?php echo $_product->get_id() ?>" data-quantity="1" class="product_type_simple add_to_cart_button ajax_add_to_cart btn btn-outline-accent btn-lg" data-product_id="<?php echo $_product->get_id() ?>" data-product_sku="<?php echo $_product->get_sku() ?>" aria-label="Add to cart: “bS Isotope”" aria-describedby="" rel="nofollow" product-title="bS Isotope">

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
                        <a class="btn btn-outline-primary btn-lg" href="">
                          <svg class="bi bi-telegram" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"> </path>
                          </svg></a><a class="btn btn-outline-success btn-lg" href="">
                          <svg class="bi bi-whatsapp" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                          </svg></a><a class="btn btn-outline-secondary btn-lg" href="">
                          <svg class="bi bi-subtract" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"></path>
                          </svg>
                        </a>
                      </div>
                    </div>
                     -->
                        </div>


                    </div>
                </div>
            </div>
            <!-- слайдер с табами изображениями -  КОНЕЦ -->

            <div class="col-12 ">
                <div class="description card card-body border-0 px-0">
                    <div class="row">
                        <div class="col px-xxl-2 px-md-0">
                            <div class="mb-5 short-desc">
                                <h2 class="block-title text-nowrap fs-4">Краткое описание</h2>
                                <textarea name="product-description" id="product-description"> <?php echo $_product->get_description() ?> </textarea>
                            </div>
                            <div class="long-desc">
                                <h2 class="block-title text-nowrap fs-4">Полное писание</h2>
                                <textarea name="product-description" id="product-description"> <?php echo $_product->get_description() ?> </textarea>
                            </div>
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
    </div>
</main>

<script>
    var productId = <?php echo $_product->get_ID() ?>;
</script>

<div class="modal fade" id="backdrop-1" tabindex="-1" role="dialog" aria-labelledby="backdrop-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content position-relative">
            <div class="modal-header position-absolute top-0 end-0 border-0 z-3">
                <button class="btn-close bg-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="carousel slide slider__images--modal carousel-fade h-100" id="carouselButtons-1">
                    <div class="carousel-inner">
                        <div class="carousel-item bg-white active">
                            <div class="youtube ratio ratio-16x9">
                                <iframe class="iframe object-fit-cover" src="https://www.youtube.com/embed/WAl60Fn--SQ?si=d8NntCiUb7Zn05KR" allow="autoplay;" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image05.png" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="..."></div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselButtons-1" data-bs-slide="prev"><span class="carousel-control-prev-icon text-bg-dark rounded" aria-hidden="true"></span><span class="visually-hidden">Предыдущий</span></button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselButtons-1" data-bs-slide="next"><span class="carousel-control-next-icon text-bg-dark rounded" aria-hidden="true"></span><span class="visually-hidden">Следующий</span></button>
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
                        <div class="carousel-item active bg-white">
                            <div class="youtube ratio ratio-16x9">
                                <iframe class="iframe object-fit-cover" src="https://www.youtube.com/embed/WAl60Fn--SQ?si=d8NntCiUb7Zn05KR" allow="autoplay;" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image05.png" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="..."></div>
                        </div>
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
                        <div class="carousel-item active bg-white">
                            <div class="youtube ratio ratio-16x9">
                                <iframe class="iframe object-fit-cover" src="https://www.youtube.com/embed/WAl60Fn--SQ?si=d8NntCiUb7Zn05KR" allow="autoplay;" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image01.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image06.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image05.png" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image03.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image02.jpg" alt="..."></div>
                        </div>
                        <div class="carousel-item d-flex justify-content-center align-items-center bg-white">
                            <div class="image-4x3"><img class="img-fluid py-md-3" src="<?= get_stylesheet_directory_uri(); ?>/img/slider/image04.jpg" alt="..."></div>
                        </div>
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

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */ ?>
