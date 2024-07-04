<?php

echo '<pre>';

if ( ! function_exists( 'YITH_Vendors' ) )  {
    echo "Плагин вендора не установлен";
} else {
    $current_user = wp_get_current_user();
    $user_login =  $current_user->user_login;
    $user_email =  $current_user->user_email;
    $user_firstname =  $current_user->user_firstname;
    $user_lastname =  $current_user->user_lastname;
    $user_display_name =  $current_user->display_name;
    $user_id =  $current_user->ID;



    // var_dump( get_user_meta($user_id) );


    $terms = get_terms( [
        'taxonomy' => 'yith_shop_vendor',
        'hide_empty' => false,
    ] );

    foreach ($terms as $key => $value) {
        $terms_meta = get_term_meta( $value->term_id );
        # code..
        // var_dump($terms_meta);
    }



    $vendor = yith_get_vendor( $user_id, 'user' );
    echo "Продажи вашего магазина " . $vendor->term->name;
    echo "<br><br><br>";
    if ( $vendor->id ) {

        // var_dump($vendor);
        $vendor_id = $vendor->term->term_id;
        $orders = wc_get_orders( array(
            // 'customer_id' => $user_id,
            'limit' => -1,
            'meta_key'      => 'vendor_id',
            'meta_value'    => $vendor_id,
        ) );



        foreach ($orders as $key => $order) {
            // var_dump($order);
            $info =  "ID: ". $order->get_id() . " | Покупатель: " . $order->get_billing_first_name() . ' ' . $order->get_billing_last_name() ." | Цена продажи: " . $order->get_total();
            foreach ( $order->get_items() as $item_id => $item ) {
                // $product_id = $item->get_product_id();
                // $variation_id = $item->get_variation_id();
                // $product = $item->get_product(); // see link above to get $product info
                $product_name = $item->get_name();
                $quantity = $item->get_quantity();
                // $subtotal = $item->get_subtotal();
                // $total = $item->get_total();
                // $tax = $item->get_subtotal_tax();
                // $tax_class = $item->get_tax_class();
                // $tax_status = $item->get_tax_status();
                // $allmeta = $item->get_meta_data();
                // $somemeta = $item->get_meta( '_whatever', true );
                // $item_type = $item->get_type(); // e.g. "line_item", "fee"

                $info .=  " | Товар: $product_name <br>";

            };
            echo $info;
        }

    } else {
        echo "Вы не являетесь продавцом или ваш товар ещё ни кто не купил";
    }

}


echo '</pre>';
