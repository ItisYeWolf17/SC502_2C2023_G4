
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
                <td>${vehiculos.id}</td>
                <td>${vehiculos.placa_vehiculo}</td>
                <td>${vehiculos.marca_vehiculo}</td>
                <td>${vehiculos.year_vehiculo}</td>
                <td>${vehiculos.idPropietario}</td>
                <td class="contenedor-formact">
                <div class="contenido-opciones">
                        <div>
                        <form action="/api/eliminar" method="POST">
                            <input type="hidden" name="id" value="${vehiculos.id}">
                            <input type="submit" class="btn-ver" value="Eliminar">
                        </form>
                    </div>
                    <div>
                        <form action="/updateVehicle" method="GET">
                            <input type="hidden" name="id" value="${vehiculos.id}">
                            <input type="submit" class="btn-ver" value="Editar">
                        </form>
                    </div>
                </div>
             </td>
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




