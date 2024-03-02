$(document).ready(function () {
  /**/
  $(".invalid-feedback").hide();

  if ($("#list-preguntas")) {
    $.ajax({
      type: "GET",
      url: "/backend/user/mostrar-usuario.php",
      success: function (data) {
        $("#tabla").html(data);
        $(".update").on("click", function (e) {
          e.preventDefault();
          $("#myModal").modal("show");
          let id_Usuario = $(this).attr("id_Usuario");
          let nombre = $(this).attr("nombre");
          let apellido = $(this).attr("apellido");
          $("#id_Usuario").val(id_Usuario);
          $("#nombre").val(nombre);
          $("#apellido").val(apellido);
          $("#Actualizar").on("click", function (e) {
            $(".invalid-feedback").hide();
            $("input").removeClass("is-invalid");
            const expresiones = {
              usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
              nombre: /^[a-zA-ZÀ-ÿ\s]+$/, //
            };

            let nombre = $("#nombre");
            let apellido = $("#apellido");
            let isValidDate = Date.parse(fecha_nacimiento.val());
            if (
              nombre.val().trim() == null ||
              nombre.val().trim().length == 0 ||
              !expresiones.nombre.test(nombre.val().trim())
            ) {
              nombre.addClass("is-invalid");

              $("#nombre_invalido").show();
            } else if (
              apellido.val().trim() == null ||
              apellido.val().trim().length == 0 ||
              !expresiones.nombre.test(apellido.val().trim())
            ) {
              apellido.addClass("is-invalid");

              $("#apellido_invalido").show();
            }  else {
              $.ajax({
                type: "POST",
                data: $("#form_actualizar").serialize(),
                url: "../../backend/user/actualizar-usuario.php",
                success: function (data) {
                  alert(data);
                  location.reload();
                },
                error: function (request, status, error) {
                  alert(request.responseText);
                },
              });
            }
          });
        });
        $(".delete").on("click", function (e) {
          e.preventDefault();

          var r = confirm("Esta seguro que desea eliminarlo!");
          if (r == true) {
            let id_Usuario = $(this).attr("id_Usuario");
            $.ajax({
              type: "POST",
              data: "id_Usuario=" + id_Usuario,
              url: "../../backend/user/eliminar-usuario.php",

              success: function (data) {
                alert(data);
                location.reload();
              },
              error: function (request, status, error) {
                alert(request.responseText);
              },
            });
          }
        });
      },
      error: function (request, status, error) {
        alert(request.responseText);
      },
    });
  }

  $("#form_agregar").on("submit", function (e) {
    e.preventDefault();
    $(".invalid-feedback").hide();
    $("input").removeClass("is-invalid");
    const expresiones = {
      usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
      nombre: /^[a-zA-ZÀ-ÿ\s]+$/, //
      password: /^.{4,12}$/, // 4 a 12 digitos.
      correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
      telefono: /^\d{7,14}$/, // 7 a 14 numeros.
    };

    let nombre = $("#nombre");
    let apellido = $("#apellido");
    
    if (
      nombre.val().trim() == null ||
      nombre.val().trim().length == 0 ||
      !expresiones.nombre.test(nombre.val().trim())
    ) {
      nombre.addClass("is-invalid");

      $("#nombre_invalido").show();
    } else if (
      apellido.val().trim() == null ||
      apellido.val().trim().length == 0 ||
      !expresiones.nombre.test(apellido.val().trim())
    ) {
      apellido.addClass("is-invalid");

      $("#apellido_invalido").show();
    
    } else {
      $.ajax({
        type: "POST",
        data: $("#form_agregar").serialize(),
        url: "../../backend/user/agregar-usuario.php ",

        success: function (data) {
          alert(data);
        },
        error: function (request, status, error) {
          alert(request.responseText);
        },
      });
    }
  });
});
