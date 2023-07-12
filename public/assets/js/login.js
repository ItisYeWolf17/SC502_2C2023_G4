
let btnEnviar = document.querySelector(".btn-enviar");
let lablCorreo = document.querySelector("#mail");
let lblPassword = document.querySelector("#password");

btnEnviar.addEventListener("click", function(event){
    event.preventDefault(); //Para evitar que la pagina parpadee cuando el btn es submit
    if(lablCorreo.value == "bcantillo@ufide.com" && lblPassword.value == "hola123"){
        window.location.href ='principal.html';
    }else{
        console.log(lablCorreo.value);
        swal.fire({
            title: `Correo o clave incorrectas`,
            confirmButtonColor: '#0B3B59',
            icon: 'error',
            customClass:{
                popup:'ventanaModal'
            }
        });     
    }
})