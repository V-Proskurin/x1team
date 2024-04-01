<?php

/**
 * Deprecated, functions moved to wc-functions.php, delete file in v6.
 *
 * This empty file is needed to not crash existing bootcommerce-child installations
 * because they have require get_template_directory() . '/woocommerce/woocommerce-functions.php';
 * in their functions.php.
 */
add_action('wp_enqueue_scripts', 'x1team_scripts');
function x1team_scripts() {

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', ( 'https://code.jquery.com/jquery-3.7.1.min.js' ), false, null, true );
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script('create-vendor-product', get_template_directory_uri() . '/woocommerce/js/create-vendor-product.js', array('jquery'), '1.0' );
    wp_enqueue_script('x1team-main', get_template_directory_uri() . '/assets/x1team-main.js', array('jquery'), '1.0' );





}

add_action( 'wp_enqueue_scripts', 'add_data_to_scripts' );
function add_data_to_scripts() {
    $userData = wp_get_current_user();
    $user = $userData->ID ? true : false;

    $data = [];

    if ( $userData->ID ) {
        $data['user'] = [
            'user_id' => $userData->ID,
            'user_nickname'=>$userData->nickname
        ];
    } else {

        $data['user'] = false;


    }


    wp_add_inline_script('x1team-main', 'window.x1teamMainData = '.wp_json_encode( $data ), 'before');
}





add_theme_support( 'wc-product-gallery-slider' );
add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ){
    global $post;

    return '... <a role="button" href="'.get_permalink($post).'" data-bs-toggle="collapse" data-bs-target="#more" aria-expanded="false" aria-controls="collapseExample"><span class="link-primary link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover text-nowrap">Читать далее</span></a>';


    // return '... <a href="'. get_permalink($post) . '">Читать дальше</a>';
}
add_filter( 'excerpt_length', function(){
    return 16;
} );
add_action( 'woocommerce_product_options_advanced', 'rudr_product_field' );
function rudr_product_field(){

    echo '<div class="options_group">';
    woocommerce_wp_text_input(
        array(
            'id'      => 'product_link_video',
            'value'   => get_post_meta( get_the_ID(), 'product_link_video', true ),
            'label'   => 'Сылка видео',
            'desc_tip' => true,
            'description' => 'Вставьте сылку на видео',
        )
    );
    echo '</div>';

}
add_action( 'woocommerce_process_product_meta', 'rudr_save_field' );
function rudr_save_field( $id ){

    $super = isset( $_POST[ 'product_link_video' ] ) ? $_POST[ 'product_link_video' ] : "";
    update_post_meta( $id, 'product_link_video', $super );

}

function custom_login_redirect( $redirect_to, $request, $user ) {
    // Get the current user's role
    if ( isset($_GET['blocklyfile'] ) ) {
        wp_redirect('./blockly/blockly?blocklyfile=' . $_GET['blocklyfile']);
    }


    return $redirect_to;
}
add_filter( 'login_redirect', 'custom_login_redirect', 10, 3 );




add_filter( 'woocommerce_account_menu_items', 'my_account_menu' );
function my_account_menu( $menu_links ){
    $menu_links = array(
        // 'dashboard'          => __( 'Панель управления', 'woocommerce' ),
        'orders'             => __( 'Покупки', 'woocommerce' ),
        'sales' 	=> __( 'Продажи', 'woocommerce' ),
        'ads' 	=> __( 'Объявления', 'woocommerce' ),
        'ads_add' 	=> __( 'Добавить объявление', 'woocommerce' ),
        'sales-orders' 	=> __( 'Заказы покупателей', 'woocommerce' ),
        'edit-account'       => __( 'Анкета', 'woocommerce' ),
        'customer-logout'    => __( 'Выйти', 'woocommerce' ),


        // 'edit-address'       => __( 'Адреса', 'woocommerce' ),
        // 'woo-wallet'         => __( 'Анкета', 'woocommerce' ),
        // 'edit-account'       => __( 'Детали профиля', 'woocommerce' ),


    );
    return $menu_links;
}

add_filter( 'woocommerce_get_endpoint_url', 'my_account_menu_endpoint', 10, 4 );
function my_account_menu_endpoint( $url, $endpoint, $value, $permalink ) {
    if ( $endpoint === 'ads' ) {
        $current_user = wp_get_current_user();
        $user_id =  $current_user->ID;
        $vendor = yith_get_vendor( $user_id, 'user' );
        $url = home_url( "/vendor/".$vendor->term->slug );
    }
    if ( $endpoint === 'ads_add' ) {
        $url = home_url( 'vendor-new-product' );
    }
    return $url;
}
add_action( 'init', 'add_x1team_list_endpoint' );
function add_x1team_list_endpoint() {
    add_rewrite_endpoint( 'sales-orders', EP_PAGES );
}
add_action( 'woocommerce_account_sales-orders_endpoint', 'show_templated_sales_orders' );
function show_templated_sales_orders() {
    require_once dirname( __FILE__ )  . '/myaccount/sales-orders.php';
}


add_filter( 'woocommerce_checkout_fields', 'x1team_del_fields', 25 );
function x1team_del_fields( $fields ) {

    // оставляем эти поля
    // unset( $fields[ 'billing' ][ 'billing_first_name' ] ); // имя
    // unset( $fields[ 'billing' ][ 'billing_last_name' ] ); // фамилия
    // unset( $fields[ 'billing' ][ 'billing_phone' ] ); // телефон
    // unset( $fields[ 'billing' ][ 'billing_email' ] ); // емайл

    // // удаляем все эти поля
    unset( $fields[ 'billing' ][ 'billing_company' ] ); // компания
    unset( $fields[ 'billing' ][ 'billing_country' ] ); // страна
    unset( $fields[ 'billing' ][ 'billing_address_1' ] ); // адрес 1
    unset( $fields[ 'billing' ][ 'billing_address_2' ] ); // адрес 2
    unset( $fields[ 'billing' ][ 'billing_city' ] ); // город
    unset( $fields[ 'billing' ][ 'billing_state' ] ); // регион, штат
    unset( $fields[ 'billing' ][ 'billing_postcode' ] ); // почтовый индекс
    unset( $fields[ 'order' ][ 'order_comments' ] ); // заметки к заказу


    // $fields[ 'billing' ] = [];
    // $fields[ 'shipping' ] = [];
    // unset( $fields[ 'billing' ]);
    // unset( $fields[ 'shipping' ]);
    // var_dump($fields);
    return $fields;

}

add_filter( 'woocommerce_checkout_fields', 'x1team_required_fields', 25 );
function x1team_required_fields( $fields ) {

    // print_r( $fields ); exit // если хотите узнать названия полей
    $fields[ 'billing' ][ 'billing_first_name' ][ 'required' ] = false; // необязательно
    $fields[ 'billing' ][ 'billing_last_name' ][ 'required' ] = false; // необязательно
    $fields[ 'billing' ][ 'billing_email' ][ 'required' ] = false; // обязательно

    return $fields;

}


add_action( 'woocommerce_after_shop_loop_item', 'edit_link_after_btn_card', 10 );
function edit_link_after_btn_card() {
    $current_user = wp_get_current_user();
    if( $current_user->exists() ){
        global $product;
        // Авторизован.
        // $user_login =  $current_user->user_login;
        // $user_email =  $current_user->user_email;
        // $user_firstname =  $current_user->user_firstname;
        // $user_lastname =  $current_user->user_lastname;
        // $user_display_name =  $current_user->display_name;
        $user_id =  $current_user->ID;

        $vendor = yith_get_vendor( $product->get_id(), 'product' );
        $vendor_user_id = $vendor->get_owner();

        if ( is_a( $product, 'WC_Product' ) &&  $vendor_user_id == $user_id ) {
            echo '<a href="/edit-product/?edit-id='.$product->get_id().'">Редактировать</a>';
        }
    }
}



// РЕГИСТРАЦИЯ

add_action('admin_post_nopriv_register_user', 'my_register_user');
function my_register_user() {
    // Check the form validity
    if (isset($_POST['user-front']) && wp_verify_nonce($_POST['user-front'], 'create-'.$_SERVER['REMOTE_ADDR'])) {

        // Check the required field
        if (!isset($_POST['user_login']) && !isset($_POST['user_email']) || !isset($_POST['user_pass']) || !isset($_POST['user_confirm_pass']) || !is_email($_POST['user_email'])
        ) {
            wp_redirect(home_url() . '?message=wrong-input');
            exit();
        }

        // Check if both password match
        if ($_POST['user_pass'] != $_POST['user_confirm_pass']) {
            wp_redirect(home_url() . '?message=pass-dif');
            exit();
        }

        // Check if user exists
        if ( email_exists($_POST['user_email']) != username_exists($_POST['user_login']) ) {
            wp_redirect(home_url() . '?message=already-registered');
            exit();
        }

        // Create the user
        $user_id = wp_create_user($_POST['user_login'], $_POST['user_pass'], $_POST['user_email']);
        // $user = new WP_User($user_id);
        // $user->set_role('subscriber');

        // Automatic loggin
        $creds = array();
        $creds['user_login'] = $_POST['user_login'];
        $creds['user_password'] = $_POST['user_pass'];
        $creds['remember'] = false;
        $user = wp_signon($creds, false);

        // Redirection
        wp_redirect(home_url('my-account'));
        exit();
    }
}

// автосоздание магазина после регистрации

add_action('user_register', 'auto_new_vendor_shop', 10, 2 );
// add_action('wptelegram_login_after_update_user_meta', 'auto_new_vendor_shop', 10 );

function auto_new_vendor_shop( $user_id, $userdata = false  ){

    $taxonomies = get_taxonomies();
    error_log( print_r($taxonomies, true), 0);


    // $user_login = $user->user_login;
    $new_vendor_shop_id = wp_insert_term( $userdata['user_login'], YITH_Vendors()->get_taxonomy_name() );


    error_log( print_r($user_id, true), 0);
    error_log( print_r($userdata, true), 0);
    error_log( print_r($new_vendor_shop_id, true), 0);

    if ( is_wp_error( $new_vendor_shop_id ) ) return;

    update_user_meta( $user_id, 'yith_product_vendor_owner', $new_vendor_shop_id['term_id'] );
    update_user_meta( $user_id, 'yith_product_vendor', $new_vendor_shop_id['term_id'] );

    update_term_meta( $new_vendor_shop_id['term_id'], 'owner', $user_id);
    update_term_meta( $new_vendor_shop_id['term_id'], 'enable_selling', 'yes');
    update_term_meta( $new_vendor_shop_id['term_id'], 'commission', '10');
    update_term_meta( $new_vendor_shop_id['term_id'], 'skip_review', 'no');
    update_term_meta( $new_vendor_shop_id['term_id'], 'featured_products', 'yes');
    update_term_meta( $new_vendor_shop_id['term_id'], 'show_gravatar', 'no');
    update_term_meta( $new_vendor_shop_id['term_id'], 'bank_account', '');
    update_term_meta( $new_vendor_shop_id['term_id'], 'store_email', $userdata['user_email']);


}

// add_action( 'init', 'add_my_account_list_endpoint' );
// function add_my_account_list_endpoint() {
// 	add_rewrite_endpoint( 'online-voice-order', EP_PAGES );
// 	add_rewrite_endpoint( 'instr', EP_PAGES );
// 	add_rewrite_endpoint( 'feedback', EP_PAGES ); //добавил
// 	add_rewrite_endpoint( 'formated', EP_PAGES );
// 	add_rewrite_endpoint( 'test_cli', EP_PAGES );
// 	add_rewrite_endpoint( 'order_ready', EP_PAGES );
// }

// add_action( 'woocommerce_account_online-voice-order_endpoint', 'show_templated_online_voice' );
// function show_templated_online_voice() {
// 	require_once dirname( __FILE__ )  . '/my-account/show_templated_online_voice.php';
// }

// $sss = get_post_meta(113);
// echo '<pre>';
// var_dump( YITH_Vendors() );
// var_dump( YITH_Vendors()->get_vendors() );
// var_dump( YITH_Vendors()->get_role_name() );
// var_dump( YITH_Vendors()->get_user_meta_key() );
// var_dump( YITH_Vendors()->get_user_meta_owner() );
// var_dump( YITH_Vendors()->get_taxonomy_name() );


// $vendor = yith_get_vendor( 'current', 'product' );
// var_dump($vendor);

// $vendor = yith_get_vendor( 'current', 'user' );
// var_dump($vendor);

// $vendor = yith_get_vendor( 'current', 'vendor' );
// var_dump($vendor);


// var_dump( $vendor_id );
// var_dump( YITH_Vendors()->get_taxonomy_name() );
// var_dump(  get_term_by ( 'term_id', $vendor_id, YITH_Vendors()->get_taxonomy_name() ) );
// echo '</pre>';


add_action('wp_ajax_create_vendor_product', 'create_vendor_product');
function create_vendor_product() {
    $user_id = get_current_user_id();

    $product_data = $_POST;

    $product_id = create_product($product_data);
    $arg = array(
        'ID' => $product_id,
        'post_author' => $user_id,
    );
    wp_update_post( $arg );

    $cat_product = $product_data["cat_product"];
    $cat_product_int = array_map(function( $str ) {
        return (int)$str;
    }, $cat_product);

    wp_set_object_terms( $product_id, $cat_product_int, 'product_cat', false );

    wp_set_object_terms( $product_id, array($product_data['vendor_id']), 'yith_shop_vendor', false);

    if ( isset($product_data['create_chat']) ) {
        $create_group = \ProjectChat\Classes\GroupClass::create_group( $product_data['title'], $product_id, get_current_user_id(), 'closed' );
        if ( $create_group['success'] ) {
            \ProjectChat\Classes\FilterClass::add_favorite_link( $create_group['group_id'], $product_id, 'group' );
        }
    }
    echo get_post_permalink( $product_id );
    // var_dump('done');

    wp_die();
}

function create_product($product_data) {
    $product = new WC_Product_Simple();

    $product->set_status( 'pending' );

    $product->set_name( $product_data['title'] );

    $product->set_slug( sanitize_title( $product_data['title'] ) );

    $product->set_regular_price( $product_data['regular_price'] );
    if ( $product_data['sale_price_field'] != '' ) {
        $product->set_sale_price( $product_data['sale_price_field'] );
    }

    $product->set_description( $product_data['content'] );

    $product->set_short_description( $product_data['excerpt'] );

    $product->set_status('publish' );

    // you can also add a full product description
    // $product->set_description( 'long description here...' );

    // $product->set_image_id( 90 );

    // let's suppose that our 'Accessories' category has ID = 19
    // $product->set_category_ids( array( 19 ) );
    // you can also use $product->set_tag_ids() for tags, brands etc

    $product->save();

    return $product->get_id();
}

add_action('wp_ajax_update_vendor_product', 'update_vendor_product');
function update_vendor_product() {

    $product_data = $_POST;

    $product_id = update_product($product_data);

    $cat_product = $product_data["productCategory"];
    $cat_product_int = array_map(function( $str ) {
        return (int)$str;
    }, $cat_product);

    wp_set_object_terms( $product_id, $cat_product_int, 'product_cat', false );

    /* if (count($product_data["productImages"]) > 0) {
	    update_post_meta( $product_id, '_product_image_gallery', join( ',', $product_data["productImages"] ) );
    } */

    echo get_post_permalink( $product_id );

    wp_die();
}

add_action('wp_ajax_vendor_product_file_upload', 'vendor_product_file_upload');
function vendor_product_file_upload() {
    $result = array();
    if ( !empty($_FILES) || wp_verify_nonce( $_POST['uploadSecurity'], 'x1VendorUpload') ) {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        $arr_img_ext = array('image/png', 'image/jpeg', 'image/jpg', 'image/gif');
        $images_ids = array();
        $images = array();

        $product_id = intval($_POST['productId']);
        $wp_upload_dir = wp_upload_dir();

        for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
            if (in_array($_FILES['files']['type'][$i], $arr_img_ext)) {
                $upload = wp_upload_bits( $_FILES['files']['name'][$i], null, file_get_contents($_FILES['files']['tmp_name'][$i]) );
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename( $upload['file'] ),
                    'post_mime_type' => $upload['type'],
                    'post_title'     => $_FILES['files']['name'][$i],
                    'post_content'   => '',
                    'post_status'    => 'inherit'
                );
                $attach_id = wp_insert_attachment( $attachment, $upload['file'], $product_id);
                $attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
                wp_update_attachment_metadata( $attach_id, $attach_data );
                $images_ids[] = $attach_id;
                $images[$attach_id] = wp_get_attachment_url( $attach_id, 'full' );
            }
        }
        update_product_gallery($product_id, $images_ids);
        echo json_encode(array('success' => true, 'images' => $images));
    }
    else {
        echo json_encode(array('success' => false));
    }
    wp_die();
}

add_action('wp_ajax_vendor_product_cover_upload', 'vendor_product_cover_upload');
function vendor_product_cover_upload() {
    if ( !empty($_FILES) || wp_verify_nonce( $_POST['uploadSecurity'], 'x1VendorCoverUpload') ) {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        $product_id = intval($_POST['productId']);
        $wp_upload_dir = wp_upload_dir();
        $arr_img_ext = array('image/png', 'image/jpeg', 'image/jpg', 'image/gif');
        if ( in_array($_FILES['file']['type'], $arr_img_ext) ) {
            $upload = wp_upload_bits( $_FILES['file']['name'], null, file_get_contents($_FILES['file']['tmp_name']));
            $attachment = array(
                'guid' => $wp_upload_dir['url'] . '/' . basename( $upload['file'] ),
                'post_mime_type' => $upload['type'],
                'post_title'     => $_FILES['file']['name'],
                'post_content'   => '',
                'post_status'    => 'inherit'
            );
            $attach_id = wp_insert_attachment( $attachment, $upload['file'], $product_id);
            $attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
            wp_update_attachment_metadata( $attach_id, $attach_data );
            $thumbnail_id = get_post_meta( $product_id, '_thumbnail_id', true );
            if ($thumbnail_id) {
                wp_delete_attachment( $thumbnail_id, true );
            }
            update_post_meta($product_id, '_thumbnail_id', $attach_id);
            echo json_encode(array('success' => true, 'image' => wp_get_attachment_url( $attach_id, 'full' )));
        }
        else {
            echo json_encode(array('success' => false));
        }
    }
    else {
        echo json_encode(array('success' => false));
    }
    wp_die();
}




add_action('wp_ajax_vendor_product_file_remove', 'vendor_product_file_remove');
function vendor_product_file_remove() {
    $attachment = get_post($_POST['imageID']);
    $product_id = intval($_POST['productID']);
    if ( $attachment->post_author == get_current_user_id() || wp_verify_nonce( $_POST['removeSecurity'], 'x1VendorImageDelete') ) {
        if (wp_delete_attachment( $attachment->ID, true )) {
            $gallery = explode(',', get_post_meta($product_id, '_product_image_gallery', true));
            if (($key = array_search($attachment->ID, $gallery)) !== false) {
                unset($gallery[$key]);
            }
            update_post_meta( $product_id, '_product_image_gallery', join( ',', $gallery ) );
            echo json_encode(array('success' => true));
        }
        else {
            echo json_encode(array('success' => false));
        }
    }
    else {
        echo json_encode(array('success' => false));
    }
    wp_die();
}


function update_product_gallery($product_id, $images) {
    $gallery = get_post_meta($product_id, '_product_image_gallery', true);
    if ( $gallery ) {
        $images_meta = $gallery . ',' . join( ',', $images );
    }
    else {
        $images_meta = join( ',', $images );
    }
    update_post_meta( $product_id, '_product_image_gallery', $images_meta );
}

function update_product( $product_data ) {

    $user_id = get_current_user_id();

    $product = wc_get_product( $product_data['productID'] );

    $product->set_name( trim($product_data['productTitle']) );
    $product->set_description( trim($product_data['productDescription']) );
    $product->set_price( $product_data['productPrice'] );
    $product->set_sale_price( $product_data['productPrice'] );
    $product->set_regular_price( $product_data['productRegularPrice'] );

    $product->save();

    return $product->get_id();
    // $arg = array(
    // 	'ID' => $product_data['productID'],
    // 	'post_author' => $user_id,

    // );
    // wp_update_post( $arg );
}



// Not Use
function categories_single_product_bottom() {
    $taxonomy     = 'product_cat';
    $orderby      = 'name';
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no
    $title        = '';
    $empty        = 0;

    $args = array(
        'taxonomy'     => $taxonomy,
        'orderby'      => $orderby,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => $empty
    );
    $all_categories = get_categories( $args );

    $html = '';
    foreach ($all_categories as $cat) {
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
                $html_inner = '<a class="d-block" data-bs-toggle="collapse" href="#collapseCatalogItem'.$category_id.'" role="button" aria-controls="collapseCatalogItem'.$category_id.'">
									<input class="form-check-input" type="checkbox" value="" id="'.$category_id.'">
									<label class="form-check-label" for="'.$category_id.'">'.$cat_name.'</label>
									<div class="form-check-arrow"></div>
								</a>
								<div class="collapse" id="collapseCatalogItem'.$category_id.'">
								';
                foreach($sub_cats as $sub_category) {
                    $sub_category_id = $sub_category->term_id;
                    $sub_cat_name = $sub_category->name;
                    $html_inner .= '<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="'.$sub_category_id.'">
										<label class="form-check-label" for="'.$sub_category_id.'">'.$sub_cat_name.'</label>
									</div>';
                }
                $html_inner .= '</div>';
            } else {
                $isset_sub_class = '';
                $html_inner = '<input class="form-check-input" type="checkbox" value="" id="'.$category_id.'">
								<label class="form-check-label" for="'.$category_id.'">'.$cat_name.'</label>';
            }
            $html .= '<div class="form-check border-bottom py-2 '.$isset_sub_class.'"> '.$html_inner.' </div>';
        }
    }
    $wrapper = '<div class="form-check border-bottom py-2">
					<input class="form-check-input" type="checkbox" value="" id="user_announcements">
					<label class="form-check-label" for="user_announcements">Мои объявления</label>
				</div>' . $html;
    echo $wrapper;
}
function filter_single_product_bottom( $type, $categories = [] ) {
    $categories_list = isset($_POST['categories_ids']) ? $_POST['categories_ids'] : $categories;
    if ( !$categories_list ) {
        $categories_list = [ ];
    }

    $data_query = [
        'status'    => 'publish',
        'limit'     => 4,
        'product_category_id' => $categories_list
    ];
    $products = wc_get_products( $data_query);

    if ( in_array( 'user_announcements', $categories ) ) {
        unset($data_query['product_category_id']);

        $data_query['author'] = get_current_user_id();

        $products_author = wc_get_products($data_query);
        foreach ($products_author as $key => $product) {
            $products[] = $product;
        }
    }

    ob_start();
    foreach ($products as $_product) {
        $thumbnail_url = get_the_post_thumbnail_url( $_product->get_id() );
        if ( !$thumbnail_url) $thumbnail_url = wc_placeholder_img_src('thumb');
        ?>
        <div class="d-flex mb-5">
            <div class="flex-shrink-0"><img class="img-fluid img-flex-card rounded me-3" src="<?= $thumbnail_url ?>" alt=""></div>
            <div class="flex-grow-1 py-0">
                <div class="row">
                    <div class="col-xl-7"><a class="d-block fw-bold" href="<?php echo get_post_permalink($_product->get_id()) ?>"><?php echo $_product->get_name() ?></a>
                        <p class="fs-6 mb-2">Купить абонемент или билет на занятие</p>
                        <?php if( current_user_can('edit_pages') ) { ?>
                            <a class="link-success redact" href="ge<?php echo get_edit_post_link($_product->get_id()) ?>">Редактировать</a>
                        <?php } ?>
                        <div class="mb-3">
                            <div class="collapse" id="addDescrCard">
                                <div class="card card-body px-0">
                                    <textarea class="form-control" id="textareaCardDescription" name="" cols="30" rows="2"></textarea>
                                </div>
                                <button class="btn btn-sm btn-secondary">Добавить </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="d-flex flex-column justify-content-center align-items-start">

                            <h5 class="text-danger text-nowrap m-0"><?php echo $_product->get_price() . ' ' . get_woocommerce_currency_symbol()?></h5>
                            <?php if ( $_product->get_regular_price() ) { ?>
                                <p class="text-decoration-line-through"><?php echo $_product->get_regular_price() . ' ' . get_woocommerce_currency_symbol() ?></p>
                            <?php }?>

                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="count d-flex flex-md-wrap flex-nowrap">
                            <div class="count-content collapse pe-2" id="collapseCartCatalog1" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}"><span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>
                                <input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>
                            </div>
                            <div class="btn-block ms-auto" href="#collapseCartCatalog1" data-bs-toggle="collapse">
                                <button class="btn btn-accent w-100">
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
        <?php
    }
    $contetn = ob_get_contents();
    ob_end_clean();
    if ( $type == 'front' ) {
        echo  $contetn;
    } else if ( $type == 'ajax' ) {
        echo json_encode($contetn, JSON_UNESCAPED_SLASHES);
        wp_die();
    }
}