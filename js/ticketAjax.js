$(document).ready(function () {

    $("#btnCreateTicket").click(function (e) {

        e.preventDefault();

        let form = $("#formCreateTicket");
        let formData = form.serialize();
        let formMethod = form.attr("method");
        let formAction = form.attr("action");

        console.log(formData);
        console.log(formMethod);
        console.log(formAction);

        $.ajax({
            type: formMethod,
            data: formData,
            url: formAction,
            dataType: "json",

            success: function (data) {
                console.table(data);
                if (data.respuesta == "exito") {
                    Swal.fire({
                        title: "CORRECTO",
                        text: "Registro Exitoso",
                        icon: "success",
                    }).then((result) => {
                        window.location.href = "readTicket.php";
                    });
                } else if (data.respuesta == "error") {
                    Swal.fire({
                        title: "Oops...",
                        text: "La memebresía no esta disponible",
                        icon: "error",
                    });
                } else {
                    Swal.fire({
                        title: "Oops...",
                        text: "Algo salió mal contacta al admin",
                        icon: "error",
                    });
                }
            },
        })
    })


    $(".borrar_registro").on("click", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        var tipo = $(this).attr("data-tipo");

        console.log(id);
        console.log(tipo);

        Swal.fire({
            title: "¿Seguro que desea eliminar este registro?",
            text: "Esta accion no se podrá deshacer",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Eliminar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    data: {
                        id: id,
                        registro: "eliminar",
                    },
                    url: tipo + "Model.php",
                    success: function (data) {
                        console.table(data)             
                        jQuery('[data-id="' + data.id_eliminado + '"]').parents("tr").remove();
                    },
                });
                Swal.fire("Eliminado!", "Registro eliminado correctamente", "success");
            }
        });
    });
});

