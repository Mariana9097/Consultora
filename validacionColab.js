function validarPass()
    {
   
    var contrasenna = document.getElementById('pass').value;
    var rtdo = validar_clave(contrasenna);
    var msg = "";

    if(rtdo == true)
    {
        msg ='Cotraseña fuerte';
    }
    else
    {
        msg = 'La contraseña ingresada no es fuerte';
    }

    changeColor('pass', rtdo);
    setValitationMesage('msjValidacionPass', rtdo, msg);
    validar();
    
    }

  
   function validar_clave(contrasenna)
   {
    if(contrasenna.length >= 8)
    {       
        return true;
        
    }
    else{
       return false; 
    }
    
    }

	function validarTel(){
  
    var telefono= document.getElementById('telColab').value;
    rtdo = numbers(telefono);
    var msg = "";
        
        if(rtdo == false){
          msg = "Solo numeros";  
        }

     changeColor('telColab', rtdo);
     setValitationMesage('msjValidacionTel', rtdo, msg);
     validar();
     
	}


	function validarNombre(){

    var elem = document.getElementById('nombre').value;
    var cantLetras = elem.length;
    var rtdo = false;
    var msg = "";
    
    if(cantLetras >= 3 && cantLetras < 20){
        rtdo = letters(elem);
        
        if(rtdo == false){
            msg = "En el Nombre solo van letras";  
        }
    }else{
        msg= "El nombre debe contener más de 3 y menos de 20 letras ";
        
    }
    
    changeColor('nombre', rtdo);
    setValitationMesage('msjValidacionNombre', rtdo, msg);
    validar();
}
	
function validarApellido(){
    
    var elem = document.getElementById('apellido').value;
    var cantLetras = elem.length;
    var rtdo = false;
    var msg = "";
    
    if(cantLetras >= 3 && cantLetras < 20){
        rtdo = letters(elem);
        
        if(rtdo == false){
            msg = "En el Nombre solo van letras";  
        }
    }else{
        msg= "El nombre debe contener más de 3 y menos de 20 letras ";
        
    }
     
    changeColor('apellido', rtdo);
    setValitationMesage('msjValidacionNombre', rtdo, msg);
    validar();
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

  
function letters(letras){
	var patron = /^[A-Za-zd-\s]*$/;
	return patron.test(letras);
}

function numbers(nros){
	var patron = /^[0-9]*$/;
	return patron.test(nros);
}


function changeColor(elementID, rtdo){
    if(rtdo == false){
            document.getElementById(elementID).style.backgroundColor = "white";
            document.getElementById(elementID).style.color = "Black";
        }else{
            document.getElementById(elementID).style.backgroundColor = "azure";  
            document.getElementById(elementID).style.color = "Black";
        }
}

function validar(){
    
    var nomb= document.getElementById('nombre').style.backgroundColor;
    var pass= document.getElementById('pass').style.backgroundColor;
    var tel= document.getElementById('telColab').style.backgroundColor;
    var apel= document.getElementById('apellido').style.backgroundColor;
  
    
   
    if(pass == "azure" && nomb == "azure" && tel == "azure" && apel == "azure" ){
       document.getElementById('boton').disabled=false; 
    }else{
        document.getElementById('boton').disabled=true;  
    }
    
 }        






