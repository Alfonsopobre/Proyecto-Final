document.addEventListener('DOMContentLoaded', function() {
    var boton1 = document.querySelectorAll('.editar');
    const boton2 = document.getElementById('btn_cerrar_AP');
    const panel1 = document.getElementById('panel_oculto');
    var id = document.getElementById('campoPanelActualizar1');
    var nombre = document.getElementById('campoPanelActualizar2');
    var cantidad = document.getElementById('campoPanelActualizar5');
    var marca = document.getElementById('s_mk');
    var tpp = document.getElementById('s_tpp');
    var prove = document.getElementById('s_prove');
    var rowIndex;
    var formulario = document.getElementById("Formulario");
    var aviso = document.getElementById("avisos");
    var panel_eliminar = document.getElementById("panel_eliminar");
    var infor = document.getElementById("informacion");
    var btn_cerrar_eliminar = document.getElementById('btn_cerrar_eliminar');
    var btn_confirmar = document.getElementById('boton_confirmar');
    var aviso_eliminar = document.getElementById('aviso_eliminar');
    var nombre_eliminar_producto;
    var estado_producto;
    var id_precio_actualizar;
    var panel_precio = document.getElementById('panel_actualizar_precio');
    var btn_actualizar_precio = document.getElementById('boton_actualizar_precio');
    var btn_cerrar_precio = document.getElementById('btn_cerrar_actualizar_precio');
    var n_producto = document.getElementById('n_producto');
    var valor_precio = document.getElementById('valor_precio');

    tabla.addEventListener('click', function(event) {
        if (event.target.classList.contains('precio')) {
            panel_precio.style.display = 'block';
            var row = event.target.closest('tr');
            var fila = row.rowIndex;

            id_precio_actualizar = $('#tabla tr:eq(' + fila + ') td:eq(0)').text();
            var nombre_actualizar_precio = $('#tabla tr:eq(' + fila + ') td:eq(1)').text();
            var precio_total_actual = $('#tabla tr:eq(' + fila + ') td:eq(3)').text();
            valor_precio.value = precio_total_actual;

            n_producto.textContent = "";
            n_producto.textContent = "'" + nombre_actualizar_precio.toUpperCase() + "'";
        }
    });

    btn_cerrar_precio.addEventListener('click', function() {
        panel_precio.style.display = "none";
        location.reload();
    });

    btn_actualizar_precio.addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        var a = valor_precio.value;
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                aviso_eliminar.innerHTML = "";
                var a = this.responseText;
                if (a == "1"){
                    n_producto.innerHTML = "<h3>Actualizado correctamente</h3>";
                    valor_precio.value = "";
                }
                else
                {
                    n_producto.innerHTML = "<h3>Error, No se pudo actualizar</h3>";
                }
                
            }
        };
        xhr.open("GET", "php/actualizar_precio.php?variable0=" + id_precio_actualizar + "&variable1=" + a , true);
        xhr.send();
    });
    
    formulario.addEventListener("submit", function(event) {
        event.preventDefault();
        
        var formData = new FormData(this);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                aviso.innerHTML = "";
                var a = this.responseText
                aviso.innerHTML = a;
            }
        };
        xhr.open("POST", "php/actualizar_producto.php", true);
        xhr.send(formData);

    });

    for (var i = 0; i < boton1.length; i++) {
        boton1[i].addEventListener('click', function () {
            panel1.style.display = 'block';
            panel1.style.maxHeight = panel1.scrollHeight + 'px';
            var row = this.parentNode.parentNode;
            rowIndex = row.rowIndex;

            var valorid = $('#tabla tr:eq(' + rowIndex  + ') td:eq(0)').text();
            var valornombre = $('#tabla tr:eq(' + rowIndex  + ') td:eq(1)').text();
            var valorcantidad = $('#tabla tr:eq(' + rowIndex  + ') td:eq(2)').text();
            var valormarca = $('#tabla tr:eq(' + rowIndex  + ') td:eq(6)').text();
            var valortpp = $('#tabla tr:eq(' + rowIndex  + ') td:eq(8)').text();
            var valorprove = $('#tabla tr:eq(' + rowIndex  + ') td:eq(10)').text();

            id.value = valorid;
            nombre.value = valornombre;
            cantidad.value = valorcantidad;
            var valores = [valormarca,valortpp,valorprove];

            marca.innerHTML = "";
            tpp.innerHTML = "";
            prove.innerHTML = "";

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    var respuesta = JSON.parse(this.responseText);
                    marca.innerHTML = respuesta[0];
                    tpp.innerHTML = respuesta[1];
                    prove.innerHTML = respuesta[2];

                }
            };
            xhttp.open("GET","php/actualizar_selects.php?valor=" + valores, true);
            xhttp.send();

        });
    }
    boton2.addEventListener('click', function() {
        panel1.style.display = 'none';
        panel1.style.maxHeight = '0';
        location.reload();
    });

    tabla.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-danger')) {
            panel_eliminar.style.display = 'block';
            var row = event.target.closest('tr');
            var fila = row.rowIndex;

            var valorid = $('#tabla tr:eq(' + fila + ') td:eq(0)').text();
            nombre_eliminar_producto = $('#tabla tr:eq(' + fila + ') td:eq(1)').text();
            estado_producto = $('#tabla tr:eq(' + fila + ') td:eq(7)').text();

            infor.textContent = "";
            infor.textContent = "Estas seguro de cambiar el estado de este producto con el nombre '" + nombre_eliminar_producto.toUpperCase() + "'";
        }
    });

    btn_cerrar_eliminar.addEventListener('click', function() {
        panel_eliminar.style.display = "none";
        location.reload();
    });

    btn_confirmar.addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                aviso_eliminar.innerHTML = "";
                var a = this.responseText;
                alert
                if (a == "1"){
                    aviso_eliminar.innerHTML = "<h3>Cambiado correctamente</h3>";
                }
                else
                {
                    aviso_eliminar.innerHTML = "<h3>Error, No se pudo cambiar de estado</h3>";
                }
                
            }
        };
        xhr.open("GET", "php/actualizar_estado_producto.php?variable0=" + nombre_eliminar_producto + "&variable1=" + estado_producto, true);
        xhr.send();
    });
});