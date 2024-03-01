$(document).ready(function(){
    $(".invalid-feedback")

    if ($("#tabla")) {
        $.ajax({
            type: "GET",
            url: "./php/mostrar-empleado.php",
            success: function(data){
                $("#tabla").html(data);
                $(".update").on("click", function(e){
                    e.preventDefault();
                    $("#myModal").modal('show');
                    let idUser = $(this).attr("id_User")
                    let name = $(this).attr("name")
                    let email  = $(this).attr("email");
                    let password =  $(this).attr("password");
                    let rolAdmin  = $(this).attr("rol_admin");
                    $("#id")
                })

            }  // Url a la que ha
        })
    }

})