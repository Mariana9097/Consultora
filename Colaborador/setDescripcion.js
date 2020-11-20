/*function setearPublicacion(id){
    var datosEntrada = {
        idTarea: id
    }
    $.ajax({
        url:'buscarDescripcion.php',
        type: 'POST',
        data: datosEntrada,
        success: function(datosRecibidos) {
            json = JSON.parse(datosRecibidos);
            document.getElementById('mdescripcion').value = json.descripcion;
           
        }
    });
}

function limpiarModal(){
    document.getElementById('mdescripcion').value = "";
    
}

function resultC(id){
	var datosEntrada = {
        idColab: id
    }
    $.ajax({
        url:'buscarEstCurso.php',
        type: 'POST',
        data: datosEntrada,
        success: function(datosRecibidos) {
            json = JSON.parse(datosRecibidos);
            //document.getElementById('mestudios').value = json.arrayestudios;
            document.getElementById('mcursos').value = json;
           
        }
    });
}

*/
    /*var datosEntrada = {
        idColab: id
    }
    */
    var xhr = new XMLHttpRequest();
    xhr.open('GET','borrar.php');
    xhr.onload = function(data){
        if(xhr.status==200){
            console.log(data);
            var json = JSON.parse(xhr.responseText);
            var template = ``;
            json.map(function(){
                template += `
                    <h6>${json.id}y</h6>
                    <h6>${json.nombreCurso}j</h6>
                    `;
                return template;
            });
            console.log(data.id);
            document.getElementById('mcursos').innerHTML = json;
        }else{
            console.log("Existe error");
        }
    }
    xhr.send();
