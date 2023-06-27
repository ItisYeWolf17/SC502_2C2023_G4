let btnLink = document.querySelectorAll(".link");
btnLink.forEach((btn,i)=>{
    btn.addEventListener("click", function(){
        if(btn.getAttribute("href") == "#"){
            swal.fire({
                title: 'Este servicio aún no se encuentra disponible',
                confirmButtonColor: '#0B3B59',
                icon:'error',
                customClass:{
                    popup:'ventanaModal'
                }
            })
        }
    })
})


