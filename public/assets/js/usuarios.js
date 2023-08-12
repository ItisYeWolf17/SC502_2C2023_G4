

let btnCreaCodigo = document.querySelector(".abrir-codigo");



let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
    pageLength: 5,
    destroy: true,
    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "Ningún usuario encontrado",
        info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
        infoEmpty: "Ningún usuario encontrado",
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

    await listUsuarios();

    dataTable = $("#datatable_users").DataTable(dataTableOptions);

    dataTableIsInitialized = true;
}
const listUsuarios = async () => {
    try {
        const response = await fetch("http://localhost:3000/api/usuarios");
        const usuarios = await response.json();
        console.log(usuarios);
        let content = ``;
        usuarios.forEach((usuarios) => {
            content += `
            <tr>
                <td>${usuarios.id}</td>
                <td>${usuarios.nombre_usuario}</td>
                <td>${usuarios.apellido_usuario}</td>
                <td>${usuarios.cedula_usuario}</td>
                <td>${usuarios.idRol}</td>
                <td>${usuarios.correo}</td>
                <td class="contenedor-formact">
                    <div class="contenido-opciones">
                            <div>
                            <form action="/api/eliminarUsuario" method="POST">
                                <input type="hidden" name="id" value="${usuarios.id}">
                                <input type="submit" class="btn-ver" value="Eliminar">
                            </form>
                        </div>
                        <div>
                            <form action="/updateUser" method="GET">
                                <input type="hidden" name="id" value="${usuarios.id}">
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




