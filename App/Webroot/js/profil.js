
$(function() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: parseFloat(document.getElementById('map').getAttribute("latitude")), lng: parseFloat(document.getElementById('map').getAttribute("longitude"))},
        scrollwheel: true,
        zoom: 15
    });
    var marker = new google.maps.Marker({
        position: {lat: parseFloat(document.getElementById('map').getAttribute("latitude")), lng: parseFloat(document.getElementById('map').getAttribute("longitude"))},
        map: map,
    });

});