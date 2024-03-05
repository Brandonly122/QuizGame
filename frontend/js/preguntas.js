$(document).ready(function () {
    /**/
    $(".invalid-feedback").hide();

    if ($("#preguntas")) {
        $.ajax({
        type: "GET",
        url: "../../../backend/pregunta/mostrar-pregunta.php",
        success: function (data) {
            $("#preguntas").html(data);
        
        },
        error: function (request, status, error) {
            alert(request.responseText);
        },
        });
    }
});