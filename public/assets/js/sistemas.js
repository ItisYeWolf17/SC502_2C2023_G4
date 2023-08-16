
let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
    pageLength: 10,
    destroy: true,
    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "Ningún sistema encontrado",
        info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
        infoEmpty: "Ningún sistema encontrado",
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

    await listsistemas();

    dataTable = $("#datatable_sistemas").DataTable(dataTableOptions);

    dataTableIsInitialized = true;
}
const listsistemas = async () => {
    try {
        const response = await fetch("http://localhost:3000/api/sistemas");
        const sistemas = await response.json();
        console.log(sistemas);
        let content = ``;
        sistemas.forEach((sistemas) => {
            content += `
            <tr>
                <td>${sistemas.id}</td>
                <td>${sistemas.nombre_sistema}</td>
                <td class="contenedor-formact">
                    <div class="contenido-opciones">
                        <div>
                            <form action="/api/eliminarSistema" method="POST">
                                <input type="hidden" name="id" value="${sistemas.id}">
                                <input type="submit" class="btn-ver" value="Eliminar">
                            </form>
                        </div>
                        <div>
                            <form action="/updateSistema" method="GET">
                                <input type="hidden" name="id" value="${sistemas.id}">
                                <input type="submit" class="btn-ver" value="Editar">
                            </form>
                        </div>
                    </div>
                </td>
            </tr>`;
        });
        tableBody_sistemas.innerHTML = content;
    } catch (ex) {
        alert(ex)

    }
};

window.addEventListener("load", async () => {
    await initDataTable();

});








