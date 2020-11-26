function editar(id) {
        eval("debugger;");
        var datos = {
            id: id
        }
        
        $.ajax({
            url: 'obtenerDatosCliente.php',
            type: 'POST',
            async: false,
            data: datos,
            success: function(datosRecibidos) {
                json = JSON.parse(datosRecibidos);
                //alert(datosRecibidos);
                document.getElementById('editarNombre').value = json.nombreFuncion;
                document.getElementById('editarEmail').value = json.emailFuncion;
                document.getElementById('editarTelefono').value = json.telFunction;
                document.getElementById('editarPlazo').value = json.plazoFunction;
                document.getElementById('editarEmpresa').value = json.empresaFunction; 
                document.getElementById('editarId').value = id;                    
            }
        });
    }