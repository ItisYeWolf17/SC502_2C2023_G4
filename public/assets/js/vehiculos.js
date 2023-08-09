
let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
    pageLength: 3,
    destroy: true,
    buttons: [
        'copy', 'excel', 'pdf'
    ],
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

    await listVehiculos();

    dataTable = $("#datatable_vehiculos").DataTable(dataTableOptions);

    dataTableIsInitialized = true;
}
const listVehiculos = async () => {
    try {
        const response = await fetch("http://localhost:3000/api/vehiculos");
        const vehiculos = await response.json();
        console.log(vehiculos);
        let content = ``;
        vehiculos.forEach((vehiculos) => {
            content += `
            <tr>
                <td>${vehiculos.id_vehiculo}</td>
                <td>${vehiculos.placa_vehiculo}</td>
                <td>${vehiculos.marca_vehiculo}</td>
                <td>${vehiculos.year_vehiculo}</td>
                <td>${vehiculos.Propietarios_id_propietario}</td>
                <td>
                 <button class="btn-ver btn-editar" data-id=${vehiculos.id_vehiculo}>Editar</button>
                 <button class="btn-ver" data-id=${vehiculos.id_vehiculo}>Eliminar</button></td>
            </tr>`;
        });
        tableBody_vehiculos.innerHTML = content;
    } catch (ex) {
        alert(ex)

    }
};

window.addEventListener("load", async () => {
    await initDataTable();

});




