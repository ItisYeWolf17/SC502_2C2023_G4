

let btnCreaCodigo = document.querySelector(".abrir-codigo");

btnCreaCodigo.addEventListener("click", function () {
    swal.fire({
        title: 'Apertura Codigo',
        html: ` 
        <div class="formulario-crear">
        <form class="formulario">
            <div class="campo">
                <label class="campo__label" for="codigo">Código</label>
                <input class="campo__field" type="text" name="codigo" id="codigo" placeholder="250087">
            </div>
            <div class="campo">
                <label class="campo__label" for="nombre-producto">Nombre del artículo</label>
                <input class="campo__field" type="text" name="nombre-producto" placeholder="Pastillas de Freno Bosch"
                    id="nombre-producto">
            </div>
            <div class="campo">
                <label class="campo__label" for="codigo-cabys">Codigo Cabys</label>
                <input class="campo__field" type="text" name="codigo-cabys" placeholder="4292104010200"
                    id="codigo-cabys">
            </div>
            <div class="campo">
                <label class="campo__label" for="cuota-iva">Cuota I.V.A</label>
                <input class="campo__field" type="text" name="cuota-iva" placeholder="13" id="cuota-iva">
            </div>
            <div class="campo">
                <label class="campo__label" for="precioB-producto">Costo sin I.V.A</label>
                <input class="campo__field" type="text" name="precioB-producto" placeholder="28575"
                    id="precioB-producto">
            </div>
            <div class="campo">
                <label class="campo__label" for="utilidad-producto">Margen de Utilidad</label>
                <input class="campo__field" type="text" name="utilidad-producto" placeholder="25"
                    id="utilidad-producto">
            </div>
            <div class="campo">
                <label class="campo__label" for="precioB-cliente">Precio al Cliente sin I.V.A</label>
                <input class="campo__field" type="text" name="precioB-cliente" placeholder="35720.75"
                    id="precioB-cliente">
            </div>
            <div class="campo">
                <label class="campo__label" for="precioN-cliente">Precio al Cliente con I.V.A</label>
                <input class="campo__field" type="text" name="precioN-cliente" placeholder="40365" id="precioN-cliente">
            </div>

            <div class="campo"><label class="campo__label" for="cantidad-inventario">Stock</label><input
                    class="campo__field" type="text" name="cantidad-inventario" placeholder="25"
                    id="cantidad-inventario"> 
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

