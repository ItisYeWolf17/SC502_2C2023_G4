

let btnCreaCodigo = document.querySelector(".abrir-codigo");



let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
    pageLength: 10,
    destroy: true,
    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "Ningún producto encontrado",
        info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
        infoEmpty: "Ningún producto encontrado",
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

    await listProductos();

    dataTable = $("#datatable_users").DataTable(dataTableOptions);

    dataTableIsInitialized = true;
}
const listProductos = async () => {
    try {
        const response = await fetch("http://localhost:3000/api/inventario");
        const productos = await response.json();
        console.log(productos);
        let content = ``;
        productos.forEach((productos) => {
            content += `
            <tr>
                <td>${productos.id}</td>
                <td>${productos.nombre_producto}</td>
                <td>${productos.costo_iva}</td>
                <td>${productos.cantidad}</td>
                <td>${productos.precio_cliente}</td>
                <td class="contenedor-formact">
                    <div class="contenido-opciones">
                            <div>
                            <form action="/api/eliminarProducto" method="POST">
                                <input type="hidden" name="id" value="${productos.id}">
                                <input type="submit" class="btn-ver" value="Eliminar">
                            </form>
                        </div>
                        <div>
                            <form action="/updateInventory" method="GET">
                                <input type="hidden" name="id" value="${productos.id}">
                                <input type="submit" class="btn-ver" value="Editar">
                            </form>
                        </div>
                    </div>
                 </td>
            </tr>`;
        });
        tableBody_users.innerHTML = content;
    } catch (ex) {
        alert(ex)

    }
};

window.addEventListener("load", async () => {
    await initDataTable();

});

