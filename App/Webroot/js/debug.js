var url="http://pinglive.dev/api/";

$("#updateRencontre").click(function(){
    $("#updateRencontre").toggleClass('disabled');

    var request = $.ajax({
        url: url+"idclubs/",
        method: "GET",
        dataType : "json"
    });

    request.done(function( msg ) {
        msg.forEach(function(value, index){

            var requestUpdate = $.ajax({
                url: url+"rencontreClub/"+value.indice,
                method: "GET",
            });
            requestUpdate.done(function(){
                var percent = (((index/msg.length))*100);
                console.log(percent);
                $("#progressRencontre").width(percent + "%");

            });
            requestUpdate.fail(function( jqXHR, textStatus ) {
                console.log(textStatus, jqXHR);
            });

        });
    });

    request.fail(function( jqXHR, textStatus ) {
        console.log(textStatus);
    });

});