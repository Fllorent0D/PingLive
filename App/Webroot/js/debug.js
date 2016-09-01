var url="http://pinglive.dev/api/";
var number;
$("#rencontres #updateRencontre").click(function(){
    $("#rencontres #updateRencontre").toggleClass('disabled');
    $("#rencontres #updateRencontre").html("<i class=\"fa fa-spin fa-refresh\"></i><span id=\"percent\"></span>" );

    JSend({
        url: url+"idclubs/",
        success: function (clubs, xhr) {
            number = clubs.length;
            clubs.forEach(function(value, index){
                updateClub(value.indice, index)
            });
        },
        error: function(error)
        {
            displayError(error);
        },
        fail: function(data)
        {
            displayError(data);
        }
    });

});
function displayError(message)
{
    $("#rencontres #errorRencontre").removeClass('hiddendiv');
    $("#rencontres #errorRencontre span").append("<p>"+message+"</p>");
}
function updateClub(indice, index)
{
    JSend({
        url: url+"importRencontreClub/"+indice,
        success: function () {
            var percent = (((index/number))*100);
            $("#rencontres #percent").html(" "+ parseInt(percent) + "%");
            $("#rencontres #progressRencontre").width(percent + "%");
        },
        error: function(error)
        {
            displayError(error);
        },
        fail: function(data)
        {
            displayError(data);
        }
    });
}
//Joueurs
$("#joueurs #updateRencontre").click(function(){
    $("#joueurs #updateRencontre").toggleClass('disabled');
    $("#joueurs #updateRencontre").html("<i class=\"fa fa-spin fa-refresh\"></i><span id=\"percent\"></span>" );

    JSend({
        url: url+"idclubs/",
        success: function (clubs, xhr) {
            number = clubs.length;
            clubs.forEach(function(value, index){
                updateJoueur(value.indice, index+1)
            });
        },
        error: function(error)
        {
            displayErrorJoueurs(error);
        },
        fail: function(data)
        {
            displayErrorJoueurs(data);
        }
    });

});
function displayErrorJoueurs(message)
{
    $("#joueurs #errorRencontre").removeClass('hiddendiv');
    $("#joueurs #errorRencontre span").append("<p>"+message+"</p>");
}
function updateJoueur(indice, index)
{
    JSend({
        url: url+"importJoueurs/"+indice,
        success: function () {
            var percent = (((index/number))*100);
            $("#joueurs #percent").html(" "+ parseInt(percent) + "%");
            $("#joueurs #progressRencontre").width(percent + "%");
            console.log(index);
            if(index == number){
                $("#joueurs #updateRencontre").toggleClass('disabled');
                $("#joueurs #percent").html("Fini");
            }

        },
        error: function(error)
        {
            displayErrorJoueurs(error);
        },
        fail: function(data)
        {
            displayErrorJoueurs(data);
        }
    });
}
