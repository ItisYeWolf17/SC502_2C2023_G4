

let btnCreaCodigo = document.querySelector(".abrir-codigo");

btnCreaCodigo.addEventListener("click", function () {
    swal.fire({
        title: 'Añadir Cliente',
        html: ` 
        <div class="formulario-crear">
        <form class="formulario" method = "POST" action = /crear enctype="multipart/form-data">
            <div class="campo">
                <label class="campo__label" for="nombre_propietario">Nombre del Cliente</label>
                <input class="campo__field" type="text" name="nombre_propietario" placeholder="Alexander"
                    id="nombre_propietario">
            </div>
            <div class="campo">
                <label class="campo__label" for="apellido_propietario">Apellido del Cliente</label>
                <input class="campo__field" type="text" name="apellido_propietario" placeholder="Cantillo Aguilar"
                    id="apellido_propietario">
            </div>
            <div class="campo">
                <label class="campo__label" for="cedula_propietario">Cedula del Cliente</label>
                <input class="campo__field" type="text" name="cedula_propietario" placeholder="207530987" id="cedula_propietario">
            </div>

            <div class="campo">
                <button type="submit">Agregar<button/>
            </div>


          
        </form>
    </div>`,
        showCancelButton: true,
        confirmButtonColor: '#0B3B59',
        customClass: {
            popup: 'ventanaModal-inventario'
        }
    });
})

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
                <td><button class="btn-ver" data-id=${clientes.id_propietario}>Docs</button> 
                <button class="btn-ver btn-editar" data-id=${clientes.id_propietario}>Editar</button>
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




