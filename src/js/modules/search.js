document.addEventListener('DOMContentLoaded', function () {
    let searchFormId = 'searchform'; // WP default search form id
    let searchForm = document.getElementById(searchFormId);
    if (searchForm) {
        searchForm.addEventListener('submit', function () {
            window.dataLayer = window.dataLayer || [];
            dataLayer.push({event: 'search'});
        });
    }
});
