jQuery(function ($) {


    $(document).ready(function() {

        var $productGallery = $('.product-gallery'),
            $productCover =  $('.product-cover');

        $('#createVendorProduct').on('submit', function(e) {
            console.log(e);
            e.preventDefault();
            var fd = new FormData( $(this)[0] );
            fd.append( 'action', 'create_vendor_product' );
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                method: 'POST',
                processData: false,
                contentType: false,
                data: fd,
                // data: {
                //     'action': 'create_vendor_product',
                //     'form_data': fd
                // }
            }).done(data => {
                window.location = data;
                //$(this)[0].reset();
                console.log(data);
            }).fail(data => {
                console.log(data);
            });
        })

        $('#updateVendorProduct').on('click', function (e) {
            let productCategory = [];


            $('.cat_product:checked').each( ( k, inp ) => {
                productCategory.push( $(inp).val() )
            })

            let $images = $('.product-gallery').find('.image'),
                imagesId = [];

            if ($images.length) {
                $images.each(function () {
                    imagesId.push($(this).attr('data-image-id'));
                })
            }
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                method: 'POST',
                data: {
                    'action': 'update_vendor_product',
                    'productID': $(this).data('post_id'),
                    'productTitle': $('[name="product-title"]').val(),
                    'productDescription': $('[name="product-description"]').val(),
                    'productPrice': $('[name="product-price"]').val(),
                    'productRegularPrice': $('[name="product-regular-price"]').val(),
                    'productCategory': productCategory,
                    'productImages': imagesId,
                    'productVideo': $('[name="product-video"]').val(),
                }
            }).done(data => {
                window.location.reload();
            }).fail(data => {
                //console.log(data);
            })
        });


        $('#uploadImagesInput').on('change', function(){
            var uploadFiles = $(this),
                formData = new FormData();
            for (var key in uploadFiles[0].files) {
                formData.append('files[]', uploadFiles[0].files[key]);
            }
            formData.append('action', 'vendor_product_file_upload');
            formData.append('uploadSecurity', $('#fileupload_nonce').val());
            formData.append('productId', productId)

            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                method: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                dataType : 'json',
                enctype: 'multipart/form-data',
                data: formData
            }).done(data => {
                if (data.success !== 'false') {
                    for (let key in data.images) {
                        $productGallery.find('.row').append('<div class="image" data-image-id="'+ key +'">' +
                            '<img src="'+ data.images[key] +'" alt="image" />' +
                            '<button type="button" class="btn-close" aria-label="Close"></button>' +
                            '</div>');
                        imageRemoveInit($productGallery.find('[data-image-id="'+ key +'"]'));
                    }
                    $productGallery.show();
                }
            }).fail(data => {
                //console.log(data);
            })
        });


        $('#uploadCoverInput').on('change', function () {
            var uploadFile = $(this),
                formData = new FormData();
            formData.append('file', uploadFile[0].files[0]);
            formData.append('action', 'vendor_product_cover_upload');
            formData.append('uploadSecurity', $('#coverupload_nonce').val());
            formData.append('productId', productId)
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                method: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                dataType : 'json',
                enctype: 'multipart/form-data',
                data: formData
            }).done(data => {
                if (data.success !== 'false') {
                    $productCover.css('background-image', 'url(' + data.image + ')');
                }
            }).fail(data => {
                //console.log(data);
            })
        });

        imageRemoveInit($productGallery.find('.image'));

        function imageRemoveInit($elem) {
            $elem.each(function () {
                $(this).find('.btn-close').on('click', function () {
                    let $parent = $(this).parent('.image');
                    $.ajax({
                        url: '/wp-admin/admin-ajax.php',
                        method: 'POST',
                        dataType : 'json',
                        data: {
                            'action': 'vendor_product_file_remove',
                            'productID': productId,
                            'imageID': $parent.attr('data-image-id'),
                            'removeSecurity': $('#fileuremove_nonce').val()
                        }
                    }).done(data => {
                        if (data.success !== 'false') {
                            $parent.remove();
                            if ($productGallery.find('.image').length < 1) {
                                $productGallery.hide();
                            }
                        }
                    }).fail(data => {
                        //console.log(data);
                    })
                });
            });
        }

    });


}); // jQuery End