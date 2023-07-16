
let btnEnviar = document.querySelector(".btn-enviar");
let lablCorreo = document.querySelector("#correo");
let lblPassword = document.querySelector("#password");

btnEnviar.addEventListener("click", function () {

    if (lablCorreo.value == "" || lblPassword.value == "") {
        swal.fire({
            title: `Debes de completar los datos`,
            confirmButtonColor: '#0B3B59',
            icon: 'error',
            customClass: {
                popup: 'ventanaModal'
            }
        });
    } 
})