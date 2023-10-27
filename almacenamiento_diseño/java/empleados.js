document.addEventListener('DOMContentLoaded', function() {
    const boton2 = document.getElementById('btn_cerrar_AP');
    const boton3 = document.getElementById('g_v');
    const boton4 = document.getElementById('cerrar_venta');
    const boton5 = document.getElementById('t_e');
    const boton6 = document.getElementById('cerrar_formtotal');
    const boton7 = document.getElementById("a_p");
    const boton8 = document.getElementById("cerrar_provee");
    const panel1 = document.getElementById('panel_oculto');
    const panel2 = document.getElementById('generarVenta');
    const panel3 = document.getElementById('form_consultar');
    const panel4 = document.getElementById("form_prove");
    var id = document.getElementById('campoPanelActualizar1');
    var nombre = document.getElementById('campoPanelActualizar2');
    var apellido = document.getElementById('campoPanelActualizar3');
    var cantidad_inicial = document.getElementById('campoPanelActualizar4');
    var rowIndex;
    var tabla = document.getElementById('tabla');
    var nombreE = document.getElementById("nombreEmpleado");
    var apellidoE = document.getElementById("apellidoEmpleado");
    var correoE = document.getElementById("correoEmpleado");
    var cantidadFE = document.getElementById("cantidadEmpleado");
    var btn_añadirE = document.getElementById("añadirEmpleado");
    var aviso_empleado = document.getElementById("aviso_registroEmpleados");
    var boton_actualizar = document.getElementById("boton_actualizar_empleado");
    var cerrar = document.getElementById("boton_cerrar");
    var actualizar_aviso = document.getElementById("aviso_actualizar");

    boton_actualizar.addEventListener('click', function(event){
        event.preventDefault();
        var uid = id.value;
        var unombre = nombre.value;
        var uapellido = apellido.value;
        var cant_inicial = cantidad_inicial.value;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                actualizar_aviso.innerHTML = "";
                var a = this.responseText;
                if (a == "1"){
                    actualizar_aviso.innerHTML = "<h3>Actualizado correctamente</h3>";
                    panel1.style.maxHeight = panel1.scrollHeight + 'px';
                }
                else
                {
                    actualizar_aviso.innerHTML = "<h3>Error, No se pudo actualizar</h3>";
                    panel1.style.maxHeight = panel1.scrollHeight + 'px';
                }
                
            }
        };
        xhr.open("GET", "php/actualizar_empleado.php?id=" + uid + "&nombre=" + unombre + "&apellido=" + uapellido + "&cantidad=" + cant_inicial , true);
        xhr.send();
    })

    cerrar.addEventListener('click', function(){
        location.reload();
    })

    btn_añadirE.addEventListener('click', function(event){
        event.preventDefault();
        var var1 = nombreE.value;
        var var2 = apellidoE.value;
        var var3 = correoE.value;
        var var4 = cantidadFE.value;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                
                aviso_empleado.innerHTML = "";
                var a = this.responseText;
                if (a == "1"){
                    aviso_empleado.innerHTML = "<h3>Añadido correctamente</h3>";
                    nombreE.value = "";
                    apellidoE.value = "";
                    correoE.value = "";
                    cantidadFE.value = "";
                    location.reload();
                }
                else
                {
                    aviso_empleado.innerHTML = "<h3>Error, No se pudo añadir</h3>";
                }
            }
        }
        xhr.open("GET","php/añadirEmpleado.php?dato1=" + var1 + "&dato2=" + var2 + "&dato3=" + var3 + "&dato4=" + var4 , true);
        xhr.send();

    })

    tabla.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-info')) {
            panel1.style.display = 'block';
            panel1.style.maxHeight = panel1.scrollHeight + 'px';
            var row = event.target.closest('tr');
            var fila = row.rowIndex;

            var id_usu = $('#tabla tr:eq(' + fila + ') td:eq(0)').text();
            var nombre_usu = $('#tabla tr:eq(' + fila + ') td:eq(1)').text();
            var apellido_usu = $('#tabla tr:eq(' + fila + ') td:eq(2)').text();
            var cantidad_usu = $('#tabla tr:eq(' + fila + ') td:eq(3)').text();

            id.value = id_usu;
            nombre.value = nombre_usu;
            apellido.value = apellido_usu;
            cantidad_inicial.value = cantidad_usu;

        }
    });

    boton2.addEventListener('click', function() {
        panel1.style.display = 'none';
        panel1.style.maxHeight = '0';
    });
    boton3.addEventListener('click', function(){
        panel2.style.display = 'block'
    })
    boton4.addEventListener('click', function(){
        panel2.style.display = 'none';
    })
    boton5.addEventListener('click', function(){
        panel3.style.display = 'block'
    })
    boton6.addEventListener('click', function(){
        panel3.style.display = 'none';
    })
    boton7.addEventListener('click', function(){
        panel4.style.display = 'block';
    })
    boton8.addEventListener('click', function(){
        panel4.style.display = 'none';
    })

    tabla.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-danger')) {
            panel_eliminar.style.display = 'block';
            var row = event.target.closest('tr');
            var fila = row.rowIndex;

            var valorid = $('#tabla tr:eq(' + fila + ') td:eq(0)').text();
            nombre_eliminar_producto = $('#tabla tr:eq(' + fila + ') td:eq(1)').text();

        }
    });
});