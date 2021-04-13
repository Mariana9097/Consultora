function editarCliente(id) {
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
                document.getElementById('editarCuil').value = json.cuilFuncion;
                document.getElementById('editarTelefono').value = json.telFuncion;
                document.getElementById('editarId').value = id; 
                document.getElementById('bajaId').value = id   
                          
            }
        });
}


function editarClientePorEmpresa(id) {
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
                document.getElementById('editarTelefono').value = json.telFuncion;
                document.getElementById('editarEmail').value = json.emailFuncion;
                document.getElementById('editarPlazo').value = json.plazoFuncion;
                document.getElementById('selecteditarEmpresaCliente').value = json.empresaFuncion;
                document.getElementById('editarId').value = id; 
                document.getElementById('bajaId').value = id   
                          
            }
        });
}


function editarFactura(id) {
        eval("debugger;");
        var datos = {
            id: id
        }
        
        $.ajax({
            url: 'obtenerDatosFactura.php',
            type: 'POST',
            async: false,
            data: datos,
            success: function(datosRecibidos) {
                json = JSON.parse(datosRecibidos);
                
                if(json.retencionFuncion==1){
                    var retencion="Si";
                }else{
                    var retencion="No";
                }
                document.getElementById('editarNroFact').value = json.nrofactFuncion;
                document.getElementById('editarFecha').value = json.fechaFuncion;
                document.getElementById('selecteditarClienteFact').value = json.idclienteFuncion;
                document.getElementById('editarTotal').value = json.montoFuncion;
                document.getElementById('selecteditarEmpresaFact').value = json.idempresaFuncion;
                document.getElementById('editarIdFact').value = id;  
                document.getElementById('bajaId').value = id ;
            }
            
    });
}


function estadoFactura(id,idest){

    if(idest==2){
        document.getElementById('labelestado').innerHTML = "Pasar a COBRADA";

        var f = new Date();
        document.getElementById('idfactestado').value = id;
        document.getElementById('idestado').value = idest;
        document.getElementById('agacreditacion').innerHTML = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
        document.getElementById('agretencion').value = 1;
        document.getElementById('btnVolverPendiente').disabled=true;
        
    }
    else{
        document.getElementById('labelestado').innerHTML = "Ya se encuentra COBRADA, se puede editar los datos de pago";
        
        eval("debugger;");
        var datos = {
            id: id
        }
        
       $.ajax({
            url: 'obtenerEstadoFactura.php',
            type: 'POST',
            async: false,
            data: datos,
            success: function(datosRecibidos) {
                json = JSON.parse(datosRecibidos);

                document.getElementById('idfactestado').value = id;
                document.getElementById('idestado').value = idest;
                document.getElementById('agacreditacion').value = json.acreditacionFuncion;
                document.getElementById('agformapago').value = json.formapagoFuncion;
                document.getElementById('agretencion').value = json.retencionFuncion;
                document.getElementById('volverId').value = id;
             }
        });
    }
}

//Validar que no se coloque el mismo nombre de cliente en el agregar
function validarNombreCliente(){
    var elem = document.getElementById('agnombre').value;
    var rtdo = false;
    var msg = "";
    
        var datos = {
            nombre: elem
        }

        $.ajax({
            url:'buscarNombreCliente.php',
            type: 'POST',
            async: false,
            data: datos,
            success:function(datosRecibidos) {
                json = JSON.parse(datosRecibidos);
                rtdo =json;
                if(json){
  
                }else{
                    msg = "Ese nombre de cliente ya se encuentra registrado";  
                    
                }
            }
        })

    setValitationMesage('msjValidacionNombreCliente', rtdo, msg);
    return rtdo;
    
}

//Validar que no se coloque el mismo cuil de cliente en el agregar
function validarCuilCliente(){
    var elem = document.getElementById('agcuil').value;
    var rtdo = false;
    var msg = "";
    
        var datos = {
            cuil: elem
        }

        $.ajax({
            url:'buscarCuilCliente.php',
            type: 'POST',
            async: false,
            data: datos,
            success:function(datosRecibidos) {
                json = JSON.parse(datosRecibidos);
                rtdo =json;
                if(json){
  
                }else{
                    msg = "Ese cuil ya se encuentra registrado para otro cliente";  
                    
                }
            }
        })

    setValitationMesage('msjValidacionCuilCliente', rtdo, msg);
    return rtdo;
    
}

//Validar que no se coloque el mismo nombre de cliente en el editar
function validarNombreClienteEditar(){
    var elem = document.getElementById('editarNombre').value;
    var id = document.getElementById('editarId').value;
    var rtdo = false;
    var msg = "";
    
        var datos = {
            nombre: elem,
            id : id
        }

        $.ajax({
            url:'buscarNombreCliente.php',
            type: 'POST',
            async: false,
            data: datos,
            success:function(datosRecibidos) {
                json = JSON.parse(datosRecibidos);
                rtdo =json;
                if(json){
                    
                }else{
                    msg = "Ese nombre de cliente ya se encuentra registrado";  
                    
                }
            }
        })

    setValitationMesage('msjValidacionNombreClienteEditar', rtdo, msg);
    return rtdo;
    
}


//Validar que no se coloque el mismo cuil de cliente en el editar
function validarCuilClienteEditar(){
    var elem = document.getElementById('editarCuil').value;
    var id = document.getElementById('editarId').value ;
    var rtdo = false;
    var msg = "";
    
        var datos = {
            cuil: elem,
            id : id
        }

        $.ajax({
            url:'buscarCuilCliente.php',
            type: 'POST',
            async: false,
            data: datos,
            success:function(datosRecibidos) {
                json = JSON.parse(datosRecibidos);
                rtdo =json;
                if(json){
                    
                }else{
                    msg = "Ese cuil ya se encuentra registrado para otro cliente";  
                    
                }
            }
        })

    setValitationMesage('msjValidacionCuilClienteEditar', rtdo, msg);
    return rtdo;
    
}


function setValitationMesage(elementID, rtdo, msg){
    if(rtdo == false){
        document.getElementById(elementID).style.visibility='visible';
        document.getElementById(elementID).style.display='contents';
        document.getElementById(elementID).style.color = "Red"
        document.getElementById(elementID).innerHTML = msg;
    }else{
        document.getElementById(elementID).style.visibility='hidden';
        document.getElementById(elementID).style.display='none';
    }
      
}

//Si hay mensajes se deshabilita el botón submit

function validarCamposAgregarCliente(){
    var nombre = validarNombreCliente();
    var cuil = validarCuilCliente();
    
    if(nombre && cuil){
        document.getElementById('btnAgregarCliente').disabled = true;
        return true;
    }
    return false;
}

function validarCamposEditarCliente(){
    var nombre = validarNombreClienteEditar();
    var cuil = validarCuilClienteEditar();
   
    if(nombre && cuil){
       document.getElementById('btnEditarCliente').disabled = true;
        return true;
    }
    return false;
}


var slideIndex = 1;
showSlides(slideIndex);
var rtdosFinales = [];

function registrarAlumno(aux, datosfact, email) {
    eval("debugger;");
    var arregloDatos = datosfact.split('-');
    var email = email;
    var fechaEmision = arregloDatos[0];
    var nroFact = arregloDatos[1];
    var monto = arregloDatos[2];

    var facturas = [email, fechaEmision, nroFact, monto];
    rtdosFinales.push(facturas);
    return;
}

//generarTablaResumen();
//registrarAlumno(btnNombre, legajoAlum);


function generarTablaResumen() {
    var idCurso = document.getElementById('idCurso').value;


    var contenido = "";
    contenido += "<div class='my-3 jumbotron overflow-auto' style='background-color:PowderBlue;'>";
 
    //Get the count of facturas.
    var factCount = rtdosFinales[0].length;

   
    contenido += "<h5>Se enviarán notificaciones a las siguientes empresas</h5>";
   
    //Add the data rows.
    for (var i = 0; i < rtdosFinales.length; i++) {
        contenido += "<tr>";
        for (var j = 0; j < columnCount; j++) {
            contenido += "<td id='" + i + "-" + j + "'>";
            contenido += rtdosFinales[i][j];
            contenido += "</td>";
        }

        contenido += "<td>";
        contenido += "<button type='button' class='btn btn-warning' onclick='cambiar(" + i + ")'>";
        contenido += "<i class='fa fa-retweet'></i>";
        contenido += "</button> ";
        contenido += "</td>";
        contenido += "</tr>";
    }
    
    contenido += "</tbody>";
    contenido += "</table>";
    contenido += "<form class='form-group' method='POST' action='enviarMail.php' onsubmit='confirmar()' enctype='multipart/form-data' role='form'>"//"<form action='darPresente.php' method='post' onsubmit='confirmar()'>";
    contenido += "<input type='text' hidden id='arregloDatos' name='arregloDatos'>";
    contenido += "<input type='text' hidden id='idCursoEnviar' name='idCursoEnviar'>";
    
    contenido += "<div class='my-4'>";
    contenido += "<i class='fa fa-times'></i> Cancelar";
    contenido += "</a> ";
    
    contenido += "<button type='submit' class='btn btn-primary btn-lg' id='btnConfirmar' style='padding:5px 70px'>Enviar";
    contenido += "<i class='far fa-share-square'></i>";
    contenido += "</button> ";
     
    contenido += "</form>";
    contenido += "</div>";
    document.getElementById("dvTable").innerHTML = contenido;
}

function cambiar(fila) {
    //eval("debugger;");
    var filaR = fila + 1;
    var tabla = document.getElementById('tabladatos');
    var valor = tabla.rows[filaR].cells[3].innerHTML;

    if (valor == "Presente") {
        tabla.rows[filaR].cells[3].innerHTML = "Ausente";
        rtdosFinales[fila][3] = "Ausente";
        //alert(rtdosFinales[fila][3]);
    } else {
        tabla.rows[filaR].cells[3].innerHTML = "Presente";
        rtdosFinales[fila][3] = "Presente";
        //alert(rtdosFinales[fila][3]);
    }
    
}

function checkear(id) {
    //eval("debugger;");
    document.getElementById('id').innerHTML=0;
    
    if (document.getElementById("id").value==1){
    document.getElementById(id).value=0;
    }else{
    document.getElementById("id").style.background="grey";
    }

    
}

function confirmar() {
    document.getElementById('arregloDatos').value = JSON.stringify(rtdosFinales);
    var idCurso = document.getElementById('idCurso').value;
    document.getElementById('idCursoEnviar').value = idCurso;
    return true;
    
}

