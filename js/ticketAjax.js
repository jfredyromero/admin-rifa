$(document).ready(function () {

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
                        var resultado = JSON.parse(data);
                        jQuery('[data-id="' + resultado.id_eliminado + '"]')
                            .parents("tr")
                            .remove();
                    },
                });
                Swal.fire("Eliminado!", "Registro eliminado correctamente", "success");
            }
        });
    });
});

