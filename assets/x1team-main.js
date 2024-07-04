jQuery(function ($) {
    $(document).ready(function () {

        // Copy Link Product
        $('#copyLinkProduct').on('click', function() {
            $(this).find('span').css('display','flex')


            navigator.clipboard.writeText( window.location.href );


            setTimeout(() => {
                $(this).find('span').css('display','none');
            }, 2000);


        });

    });
});