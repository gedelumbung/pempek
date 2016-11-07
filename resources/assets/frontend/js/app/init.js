/** JQuery */
$.ajaxSetup({ headers: {'X-CSRF-Token': fn.csrf} });

$(document).ready(function() {
    fn.initEvents(document);
});