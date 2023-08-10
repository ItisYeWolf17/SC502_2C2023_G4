
let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
    pageLength: 3,
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
                <td>${clientes.id_propietario}</td>
                <td>${clientes.nombre_propietario}</td>
                <td>${clientes.apellido_propietario}</td>
                <td>${clientes.cedula_propietario}</td>
                <td>
                 <button class="btn-ver btn-editar" data-id=${clientes.id_propietario} href = "/update-cliente">Editar</button>
                 <button class="btn-ver" data-id=${clientes.id_propietario}>Eliminar</button></td>
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




