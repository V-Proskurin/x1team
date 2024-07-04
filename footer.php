<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.3.0
 */

?>

  <footer class="footer d-none pb-5 my-5">
    <div class="container-sm">
        <div class="row gap-lg-0 gap-5">
            <div class="col-lg-4 col-12"><img class="logo-footer mt-3" src="<?= get_stylesheet_directory_uri(); ?>/img/logo/logo-footer.png" alt="footer logo"></div>
            <div class="col-lg-8 col-12">
              <div class="list-footer mx-lg-auto ms-0 me-auto">
                <div class="row flex-lg-row flex-column">
                  <div class="col-lg-3">
                    <div class="list-footer-item filter-check ps-0"><a class="d-block fw-bold" data-bs-toggle="collapse" href="#navigation" role="button" aria-controls="navigation">Навигация
                        <div class="form-check-arrow d-lg-none d-block"></div></a>
                      <div class="list-footer-item-overlay"></div>
                    </div>
                    <div class="collapse" id="navigation">
                      <div class="list-group"><a class="list-group-item" href="" role="button">Главная</a><a class="list-group-item" href="" role="button">Каталог</a><a class="list-group-item" href="" role="button">Blockly</a></div>
                    </div>
                  </div>
                  <div class="col-lg-5">
                    <div class="list-footer-item filter-check ps-md-0"><a class="d-block fw-bold" data-bs-toggle="collapse" href="#buyers" role="button" aria-controls="buyers">Покупателям
                        <div class="form-check-arrow d-lg-none d-block"></div></a>
                      <div class="list-footer-item-overlay"></div>
                    </div>
                    <div class="collapse" id="buyers">
                      <div class="list-group"><a class="list-group-item" href="" role="button">Условия продажи</a><a class="list-group-item" href="" role="button">Доставка и оплата</a><a class="list-group-item" href="" role="button">Правила пользования торговой площадкой</a><a class="list-group-item" href="" role="button">Политика конфиденциальности</a></div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="list-footer-item filter-check ps-0"><a class="d-block fw-bold" data-bs-toggle="collapse" href="#company" role="button" aria-controls="company">Компания
                        <div class="form-check-arrow d-lg-none d-block"></div></a>
                      <div class="list-footer-item-overlay"></div>
                    </div>
                    <div class="collapse" id="company">
                      <div class="list-group"><a class="list-group-item" href="" role="button">О нас</a><a class="list-group-item" href="" role="button">Реквизиты</a><a class="list-group-item" href="" role="button">Контакты</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row mt-5">
            <p class="copy">2023 © Wildberries — модный интернет-магазин одежды, обуви и аксессуаров. Все права защищены. Доставка по всей России.На Торговой площадке wildberries.ru применяются рекомендательные технологии. Адрес для направления юридически значимых сообщений: sales@wildberries.ru</p>
        </div>
    </div>
  </footer>


<!-- To top button -->
<a href="#" class="btn btn-accent top-button position-fixed zi-1020"><i class="fa-solid fa-chevron-up"></i><span class="visually-hidden-focusable">To top</span></a>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
