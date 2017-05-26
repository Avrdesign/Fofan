/**
 * Created by alexandrzanko on 5/26/17.
 */
console.log("Hello from zanko");

$(document).ready(function () {
    $('#textSuccessful').fadeOut(200, function () {
    });

    $(".navbar-toggle").on("click", function () {
        $(this).toggleClass("active");
    });
});