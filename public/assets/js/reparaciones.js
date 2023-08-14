
let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
    pageLength: 10,
    destroy: true,
    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "Ningún registro encontrado",
        info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
        infoEmpty: "Ningún registro encontrado",
        infoFiltered: "(filtrados desde _MAX_ registros totales)",
        search: "Buscar:",
        loadingRecords: "Cargando...",
        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
        }
    }
};

const initDataTable = async () => {
    if (dataTableIsInitialized) {
        dataTable.destroy();
    }

    await listReparaciones();

    dataTable = $("#datatable_reparaciones").DataTable(dataTableOptions);

    dataTableIsInitialized = true;
}
const listReparaciones = async () => {
    try {
        const response = await fetch("http://localhost:3000/api/reparaciones");
        const reparaciones = await response.json();
        console.log(reparaciones);
        let content = ``;
        reparaciones.forEach((reparaciones) => {
            content += `
            <tr>
                <td>${reparaciones.marca_vehiculo}</td>
                <td>${reparaciones.nombre_falla}</td>
                <td>${reparaciones.precio_reparacion}</td>
                <td class="contenedor-formact">
                    <div class="contenido-opciones">
                        <div>
                            <form action="/api/eliminarReparacion" method="POST">
                                <input type="hidden" name="id" value="${reparaciones.id}">
                                <input type="submit" class="btn-ver" value="Eliminar">
                            </form>
                        </div>
                        <div>
                            <form action="/updateReparacion" method="GET">
                                <input type="hidden" name="id" value="${reparaciones.id}">
                                <input type="submit" class="btn-ver" value="Editar">
                            </form>
                        </div>
                    </div>
                </td>
            </tr>`;
        });
        tableBody_reparaciones.innerHTML = content;
    } catch (ex) {
        alert(ex)

    }
};

window.addEventListener("load", async () => {
    await initDataTable();

});








