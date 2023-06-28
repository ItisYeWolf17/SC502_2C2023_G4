
let dataTable;

let dataTableIsInitialized = false;

const dataTableOptions = {

    pageLength: 3,

    destroy: true,

    language: {

        lengthMenu: "Mostrar _MENU_ registros por página",

        zeroRecords: "Ningún usuario encontrado",

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

    await listUsers();




    dataTable = $("#table_clientes").DataTable(dataTableOptions);

    dataTableIsInitialized = true;

}

const listUsers = async () => {

    try {

        const response = await fetch("https://jsonplaceholder.typicode.com/users");

        const users = await response.json();

        console.log(users);

        let content = ``;

        users.forEach((user, index) => {

            content += `

            <tr>
                <td>${index + 1}</td>
                <td>${user.username}</td>
                <td>${user.name}</td>
                <td>2012313312313</td>
                <td>${user.phone}</td>
                <td>${user.email}</td>
                <td>
                    <div class = "botones-funciones">
                        <button class= "editar">
                            <div class="icono">
                                <i class="fa-solid fa-pen-clip"></i>
                            </div>  
                        </button>
                        <button class= "delete">
                        <div class="icono">
                            <i class="fa-solid fa-trash"></i>
                        </div>  
                    </button>
                    <button class= "archivo">
                    <div class="icono">
                        <i class="fa-solid fa-file"></i>
                    </div>  
                </button>
                    </div>
                </td>
            </tr> `;

        });

        tBody_clientes.innerHTML = content;

    } catch (ex) {

        alert(ex);

    }

};

window.addEventListener("load", async () => {

    await initDataTable();

});




