
//Formulario registro empresa
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

function validarCuit(){
     var elem= document.getElementById('cuit').value;
     var cantLetras = elem.length;
     rtdo = false;
     var msg = "";
        
        if(cantLetras == 11){
        rtdo = numbers(elem);
        
           if(rtdo == false){
           msg = "Solo letras"; 
           }

        }else{
        msg= "Debe contener 11 digitos ";
        
    }
     
     changeColor('cuit', rtdo);
     setValitationMesage('msjValidacionCuit', rtdo, msg);
     validar();
     
}

function validarNumero(){
    var elem= document.getElementById('empleados').value;
    var cantLetras = elem.length;
     rtdo = false;
     var msg = "";
     
     if(numbers(elem)){
        rtdo = true;
     
     }else{
        msg= "Solo números ";
        
    }
    
     changeColor('empleados', rtdo);
     setValitationMesage('msjValidacionEmpleados', rtdo, msg);
     validar();

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

function changeColor(elementID, rtdo){
    if(rtdo == false){
            document.getElementById(elementID).style.backgroundColor = "white";
            document.getElementById(elementID).style.color = "Black";
        }else{
            document.getElementById(elementID).style.backgroundColor = "Azure";  
            document.getElementById(elementID).style.color = "Black";
        }
}

function validar(){
    
    var nomb= document.getElementById('nombre').style.backgroundColor;
    var pass= document.getElementById('pass').style.backgroundColor;
    var tel= document.getElementById('telColab').style.backgroundColor;
    var cuit= document.getElementById('cuit').style.backgroundColor;
    var empl= document.getElementById('empleados').style.backgroundColor;
  
    
   
    if(pass == "azure" && nomb == "azure" && tel== "azure" && cuit == "azure" && empl == "azure"){
       document.getElementById('boton').disabled=false; 
    }else{
        document.getElementById('boton').disabled=true;  
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


//Formulario Consulta
function validarTelefono(){
var telefono= document.getElementById('telCons').value;
    rtdo = numbers(telefono);
    var msg = "";
        
        if(rtdo == false){
           msg = "Solo numeros";  
        }
     
     changeColor('telCons', rtdo);
     setValitationMesage('msjValidacionTelefono', rtdo, msg);
     validar();
}

function validarContacto(){

    var elem = document.getElementById('nomCons').value;
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
    
    changeColor('nomCons', rtdo);
    setValitationMesage('msjValidacionContacto', rtdo, msg);
    validarConsulta();
}

function validarConsulta(){
    
    var nomb= document.getElementById('nomCons').style.backgroundColor;
    var tel= document.getElementById('telCons').style.backgroundColor;

  
    
   
    if(tel == "azure" && nomb == "azure"){
       document.getElementById('buttonEnviar').disabled=false; 
    }else{
        document.getElementById('buttonEnviar').disabled=true;  
    }
    
         
}