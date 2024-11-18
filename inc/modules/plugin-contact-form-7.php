<?php

if (function_exists('wpcf7_sanitize_form')) {

    add_action('wp_head', 'omdl_get_wpcf7_form_details', 10);
    function omdl_get_wpcf7_form_details()
    { ?>

        <script>
            document.addEventListener('DOMContentLoaded', function(){

                window.dataLayer = window.dataLayer || [];

                const forms = document.querySelectorAll( '.wpcf7' );
                NodeList.prototype.forEach = Array.prototype.forEach;
                forms.forEach(form => {

                    form.addEventListener('wpcf7submit', function(e){
                        dataLayer.push({
                            event: 'wpcf7_submit',
                            wpcf7FormDetail: e.detail,
                        })
                    }, false)

                    form.addEventListener('wpcf7invalid', function(e){
                        dataLayer.push({
                            event: 'wpcf7_invalid',
                            wpcf7FormDetail: e.detail,
                        })
                    }, false)

                    form.addEventListener('wpcf7spam', function(e){
                        dataLayer.push({
                            event: 'wpcf7_spam',
                            wpcf7FormDetail: e.detail,
                        })
                    }, false)

                    form.addEventListener('wpcf7mailsent', function(e){
                        dataLayer.push({
                            event: 'wpcf7_mail_sent',
                            wpcf7FormDetail: e.detail,
                        })
                    }, false)

                    form.addEventListener('wpcf7mailfailed', function(e){
                        dataLayer.push({
                            event: 'wpcf7_mail_failed',
                            wpcf7FormDetail: e.detail,
                        })
                    }, false)

                });

            });
        </script>

    <?php }

}
