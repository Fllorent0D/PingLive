var url="http://pinglive.dev/api/";

(function($) {
    fetchCategories();
    $("select#divisions").empty();
    $("select#series").empty();
    $("select#journees").empty();

    $("select#series").material_select('destroy');
    $("select#divisions").material_select('destroy');
    $("select#journees").material_select('destroy');

})(jQuery);
$.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    }
});
$("select#categories").on("change", function(e){
    $("select#divisions").empty();
    $("select#series").empty();
    $("select#journees").empty();
    $("select#series").material_select('destroy');
    $("select#divisions").material_select('destroy');
    $("select#journees").material_select('destroy');
    $("select#series").material_select('destroy');
    hideCalendar();
    fetchDivisions($("select#categories").val())
});
$("select#divisions").on("change", function(e){
    $("select#series").empty();
    $("select#journees").empty();
    $("select#series").material_select('destroy');
    $("select#journees").material_select('destroy');
    hideCalendar();

    fetchSeries (encodeURIComponent($("select#divisions").val()));
});
$("select#series").on("change", function(e){
    hideCalendar();
    $("select#journees").empty();
    $("select#journees").material_select('destroy');

    fetchJournee($("select#series").val());
});
$("select#journees").on("change", function(e){

   fetchCalendrier($("select#series").val(), $("select#journees").val())
});
function hideCalendar()
{
    $("#noDate").removeClass('hiddendiv');
    $("#loading").addClass('hiddendiv');
    $("#rencontres").addClass('hiddendiv');

}
function fetchCategories()
{
    JSend({
        url: url+"categories/",
        success: function (categories, xhr) {
            categories.forEach(function(categorie){
                var option = $("<option>", {"value" : categorie.id, "text" : categorie.nom})
                $("select#categories").append(option);
                $("select#categories").material_select();

            })
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
function fetchDivisions(categorie)
{
    $("select#divisions").material_select();

    JSend({
        url: url+"divisions/"+categorie,
        success: function (divisions, xhr) {
            $("select#divisions").append($("<option>", {"disabled" :"disabled", "selected" : "selected", "text":"Choisissez une division"}));

            divisions.forEach(function(division){
                var option = $("<option>", {"value" : division.nom, "text" : division.nom})
                $("select#divisions").append(option);
                $("select#divisions").prop("disabled", false);
                $("select#divisions").material_select();
            })
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
function fetchSeries(division)
{
    $("select#series").material_select();

    JSend({
        url: url+"series/"+$("select#categories").val()+"/"+division,
        success: function (series, xhr) {
            $("select#series").append($("<option>", {"disabled" :"disabled", "selected" : "selected", "text":"Choisissez une série"}));

            series.forEach(function(serie){
                var option = $("<option>", {"value" : serie.id, "text" : serie.serie})
                $("select#series").append(option);
                $("select#series").prop("disabled", false);
                $("select#series").material_select();
            })
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
function fetchJournee(serie)
{
    $("select#journees").material_select();

    JSend({
        url: url+"journees/"+serie,
        success: function (journees, xhr) {
            $("select#journees").append($("<option>", {"disabled" :"disabled", "selected" : "selected", "text":"Choisissez une journée"}));
            journees.forEach(function(journee){
                var option = $("<option>", {"value" : journee.journee, "text" : journee.journee});
                $("select#journees").append(option);
                $("select#journees").prop("disabled", false);
                $("select#journees").material_select();
            })
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

function fetchCalendrier(serie, journee){
    $("#noDate").addClass('hiddendiv');
    $("#loading").removeClass('hiddendiv');
    JSend({
        url: url+"rencontre/"+serie+"/"+journee,
        success: function (rencontres, xhr) {
            $("#rencontres tbody").empty();
            rencontres.forEach(function(value)
            {
                var newline = $("<tr><td>"+value.feuille_match+"</td><td>"+value.date_match+"</td><td>"+value.visite+" "+value.lettre_visite+"</td><td>"+value.visiteur+" "+value.lettre_visiteur+"</td><td>0-0</td><td><a class=\"waves-effect waves-light btn indigo m-b-xs\">Détails</a></td></tr>");
                $("#rencontres tbody").append(newline);

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
    $("#rencontres").animateCss("fadeIn");
    $("#loading").addClass('hiddendiv');
    $("#rencontres").removeClass('hiddendiv');

}