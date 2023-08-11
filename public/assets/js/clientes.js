
let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
    pageLength: 10,
    destroy: true,
    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "Ningún cliente encontrado",
        info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
        infoEmpty: "Ningún cliente encontrado",
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

    await listclientes();

    dataTable = $("#datatable_clientes").DataTable(dataTableOptions);

    dataTableIsInitialized = true;
}
const listclientes = async () => {
    try {
        const response = await fetch("http://localhost:3000/api/clientes");
        const clientes = await response.json();
        console.log(clientes);
        let content = ``;
        clientes.forEach((clientes) => {
            content += `
            <tr>
                <td>${clientes.id}</td>
                <td>${clientes.nombre_propietario}</td>
                <td>${clientes.apellido_propietario}</td>
                <td>${clientes.cedula_propietario}</td>
                <td class="contenedor-formact">
                    <div class="contenido-opciones">
                        <div>
                            <form action="/api/eliminarCliente" method="POST">
                                <input type="hidden" name="id" value="${clientes.id}">
                                <input type="submit" class="btn-ver" value="Eliminar">
                            </form>
                        </div>
                        <div>
                            <form action="/updateClient" method="GET">
                                <input type="hidden" name="id" value="${clientes.id}">
                                <input type="submit" class="btn-ver" value="Editar">
                            </form>
                        </div>
                    </div>
                </td>
            </tr>`;
        });
        tableBody_clientes.innerHTML = content;
    } catch (ex) {
        alert(ex)

    }
};

window.addEventListener("load", async () => {
    await initDataTable();

});




