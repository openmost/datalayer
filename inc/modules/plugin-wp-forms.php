<?php

add_action('wp_head', 'omdl_get_wp_forms_form_details', 10);
function omdl_get_wp_forms_form_details()
{
    if (function_exists('wpforms_decode')) { ?>

        <script id="openmost-datalayer-wp-forms">
            document.addEventListener('DOMContentLoaded', function () {
                window.dataLayer = window.dataLayer || [];
                const forms = document.querySelectorAll('[id^="wpforms-form-"]');
                NodeList.prototype.forEach = Array.prototype.forEach;
                forms.forEach(form => {

                    form.addEventListener('submit', function () {
                        dataLayer.push({
                            event: 'wp_forms_submit',
                            wp_forms_form_detail: form,
                        })
                    })

                });

            });
        </script>

    <?php }
}
