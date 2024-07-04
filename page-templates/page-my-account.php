<?php
/**
 * Template Name: Account Page
 *
 * @package Bootscore
 */

if ( is_user_logged_in() && isset($_GET['blocklyfile'] ) ) {
  wp_redirect('/blockly?blocklyfile=' . $_GET['blocklyfile']);
}
get_header("myaccount"); // Вставляем заголовок сайта

?>
<main class="main my-3 mt-md-0 registration-form">
    <div class="container">
      <div class="row justify-content-center pt-2 pb-3">
        <div class="col-lg-4">
            <?php include get_stylesheet_directory() . '/woocommerce/myaccount/my-account-offcanvas.php'; ?>

            <?php if ( ! is_user_logged_in() ) { ?>

              <h5 class="fw-bold text-center mb-2">Регистрация</h5>




              <form name="registerform" id="registerform" action="<?php echo admin_url('admin-post.php?action=register_user'); ?>" method="post">
                <div class="mb-3">
                  <label for="user_login">
                    Имя пользователя<br>
                    <input type="text" name="user_login" id="user_login" class="form-control" value="" size="20" style="">
                  </label>
                </div>
                <div class="mb-3">
                  <label for="user_email">
                    E-mail<br>
                    <input type="email" name="user_email" id="user_email" class="form-control" value="" size="25">
                  </label>
                </div>
                <div class="mb-3">
                  <label for="user_password">
                    Password<br>
                    <input type="password" name="user_pass" id="user_password" class="form-control" value="" size="25">
                  </label>
                </div>
                <div class="mb-3">
                  <label for="user_password_confirm">
                    Password confirm<br>
                    <input type="password" name="user_confirm_pass" id="user_password_confirm" class="form-control" value="" size="25">
                  </label>
                </div>

                <!-- <p id="reg_passmail">Подтверждение регистрации будет отправлено на ваш e-mail.</p> -->

                <br class="clear">
                <?php wp_nonce_field('create-'.$_SERVER['REMOTE_ADDR'], 'user-front', false); ?>
                <input type="hidden" name="redirect_to" value="">

                <p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary" value="Регистрация"></p>
              </form>


<!--
              <form>
                <div class="mb-3">
                  <input class="form-control" type="text" placeholder="Логин, ник игрока, телефон, email">
                </div>
                <div class="mb-3">
                  <input class="form-control" type="email" placeholder="Email">
                </div>
                <div class="mb-3 input-group">
                  <input class="form-control password-eye" type="password" placeholder="Пароль" aria-describedby="togglePassword"><span class="input-group-text" role="button"><i class="fa-regular fa-eye-slash" id="togglePassword"></i></span>
                </div>
                <div class="mb-3">
                  <input class="form-control" type="password" placeholder="Подтвердить пароль" aria-describedby="togglePassword">
                </div>
                <div class="d-block text-center">
                  <button class="btn btn-primary" type="submit">Регистрация</button>
                </div>
              </form> -->

            <?php } ?>


        </div>
      </div>
    </div>
</main>


