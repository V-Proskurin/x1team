<?php
/*
Template Name: Сreate Vendor Product
*/


get_header();


if ( function_exists( 'YITH_Vendors' ) )  {



$vendor = yith_get_vendor('current', 'user');
?>
    <div class="container-sm text-md-center my-md-0 my-4">
        <h1 class="fs-2"><?php the_title(); ?></h1>
        <div class="row mt-4">
            <div class="col-lg-6 mx-md-auto my-md-4 mb-5">
                <form id="createVendorProduct">
                    <div class="custom_form_field mb-3">
                        <input type="text" name="title" placeholder="Заголовок" class="form-control">
                    </div>
                    <div class="custom_form_field mb-3">
                        <textarea type="text" name="excerpt" placeholder="Краткое описание" class="form-control"></textarea>
                    </div>
                    <div class="custom_form_field mb-3">
                        <textarea type="text" name="content" placeholder="Описание" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="custom_form_field mb-3">
                        <input type="text" name="regular_price" placeholder="Цена" class="form-control">
                    </div>
                    <div class="custom_form_field mb-3">
                        <input type="text" name="sale_price_field" placeholder="Акционная цена" class="form-control">
                    </div>
                    <div class="custom_form_field text-start">
                        <label for="fruits">Категория:</label>
                        <?php

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
                                    $html_inner = '<a class="d-block collapsed" data-bs-toggle="collapse" href="#collapseCatalogItem'.$category_id.'" role="button" aria-controls="collapseCatalogItem'.$category_id.'">
                                                    <input class="form-check-input" type="checkbox" name="cat_product[]" value="'.$category_id.'" id="'.$category_id.'">
                                                    <label class="form-check-label" for="'.$category_id.'">'.$cat_name.'</label>
                                                    <div class="form-check-arrow"></div>
                                                </a>
                                                <div class="collapse show" id="collapseCatalogItem'.$category_id.'">
                                                ';
                                    foreach($sub_cats as $sub_category) {
                                        $sub_category_id = $sub_category->term_id;
                                        $sub_cat_name = $sub_category->name;
                                        $html_inner .= '<div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="cat_product[]" value="'.$sub_category_id.'" id="'.$sub_category_id.'">
                                                        <label class="form-check-label" for="'.$sub_category_id.'">'.$sub_cat_name.'</label>
                                                    </div>';
                                    }
                                    $html_inner .= '</div>';
                                } else {
                                    $isset_sub_class = '';
                                    $html_inner = '<input class="form-check-input" type="checkbox" name="cat_product[]" value="'.$category_id.'" id="'.$category_id.'">
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
                    <div class="custom_form_field text-start">
                        <div class="form-check border-bottom py-2 ">
                            <input class="form-check-input" type="checkbox" name="create_chat" value="1" id="create_chat">
                            <label class="form-check-label" for="create_chat">Создать чат</label>
                        </div>
                    </div>
                    <input type="hidden" name="vendor_id" value="<?php echo $vendor->slug; ?>" />
                    <button type="submit" class="btn btn-primary btn-lg col-md-4 col-12 my-3">Создать</button>
                </form>
            </div>
        </div>
    </div>

<?php
} else {
    echo "Плагин вендора не установлен";
}


get_header();

?>