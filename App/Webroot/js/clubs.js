/**
 * Created by florentcardoen on 24/08/16.
 */
var url="http://pinglive.dev/api/";
(function($) {
    var element = $('#informations'),
        originalY = element.offset().top;

    // Space between element and top of screen (when scrolling)
    var topMargin = 20;

    // Should probably be set in CSS; but here just for emphasis
    element.css('position', 'relative');

    $(window).on('scroll', function(event) {
        var scrollTop = $(window).scrollTop();

        element.stop(false, false).animate({
            top: scrollTop < originalY
                ? 0
                : scrollTop - originalY + topMargin
        }, 100);
    });
})(jQuery);

$.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    }
});
$(".province").click(function(e){
    e.preventDefault();
    param = ($(this).data('id'));
    $("#provinces .active").removeClass('active');
    $(this).parent().addClass('active');
    var request = $.ajax({
        url: url+"listeclubs/"+param,
        method: "GET",
        dataType : "json"
    });

    request.done(function( msg ) {
        $("ul#clubs").empty();

        $.each(msg, function(index, club){
            var newcell = $("<a>",{"href":"#", "class":"collection-item club","text":club.nom, "data-id":club.id});
            $("ul#clubs").append(newcell);
        });
        $("#clubs").animateCss("animated fadeIn");

    });

    request.fail(function( jqXHR, textStatus ) {
        console.log(textStatus);
    });
});

$("#clubs").on("click", ".club", function(e){
    e.preventDefault();
    param = ($(this).data('id'));

    var request = $.ajax({
        url: url+"infosclub/"+param,
        method: "GET",
        dataType : "json"
    });

    request.done(function( msg ) {

        $("*#informations td").html("");
        $("#responsables").empty();

        $.each(msg.infos, function(index, value){
            if(value == '1')
                value = $('<i>',{"class":"material-icons", "text":"check"})
            else if(value == '0')
                value = $('<i>',{"class":"material-icons", "text":"close"})

            if (value.length == 0 || value == null)
                value = $('<small>',{"text":"Aucune information"})
            $("#"+index).html(value);
        });
        console.log(msg.infos.latitude);

        $.each(msg.membres, function(index, club){

            var newtitle = $("<h5>", {"class" : "", "text" : club.prenom + " " + club.nom});
            var newdescri = $("<p>", {"class" : "", "text" : club.fonction});
            var newligne = $("<div>", {"class" : "row"});
            newligne.append(newtitle);
            newligne.append(newdescri);
            $("#responsables").append(newligne);

        });
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: parseFloat(msg.infos.latitude), lng: parseFloat(msg.infos.longitude)},
            scrollwheel: true,
            zoom: 15
        });
        var marker = new google.maps.Marker({
            position: {lat: parseFloat(msg.infos.latitude), lng: parseFloat(msg.infos.longitude)},
            map: map,
            label: msg.infos.nom
        });
    });

    request.fail(function( jqXHR, textStatus ) {
        console.log(textStatus);
    });});

