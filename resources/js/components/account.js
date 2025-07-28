import $ from 'jquery';

$(function () {
    setInterval(function () {
        $("#authModalBtn span")
            .animate({ opacity: 0.5 }, 300)
            .animate({ opacity: 1 }, 300);
    }, 3000);
});