
let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
    pageLength: 10,
    destroy: true,
    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "Ningún falla encontrado",
        info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
        infoEmpty: "Ningún falla encontrado",
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

    await listfallas();

    dataTable = $("#datatable_fallas").DataTable(dataTableOptions);

    dataTableIsInitialized = true;
}
const listfallas = async () => {
    try {
        const response = await fetch("http://localhost:3000/api/fallas");
        const fallas = await response.json();
        console.log(fallas);
        let content = ``;
        fallas.forEach((fallas) => {
            content += `
            <tr>
                <td>${fallas.id}</td>
                <td>${fallas.nombre_falla}</td>
                <td>${fallas.precio_reparacion_iva}</td>
                <td>${fallas.nombre_sistema}</td>
                <td class="contenedor-formact">
                    <div class="contenido-opciones">
                        <div>
                            <form action="/api/eliminarFalla" method="POST">
                                <input type="hidden" name="id" value="${fallas.id}">
                                <input type="submit" class="btn-ver" value="Eliminar">
                            </form>
                        </div>
                        <div>
                            <form action="/updateFalla" method="GET">
                                <input type="hidden" name="id" value="${fallas.id}">
                                <input type="submit" class="btn-ver" value="Editar">
                            </form>
                        </div>
                    </div>
                </td>
            </tr>`;
        });
        tableBody_fallas.innerHTML = content;
    } catch (ex) {
        alert(ex)

    }
};

window.addEventListener("load", async () => {
    await initDataTable();

});








