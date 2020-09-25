<?php
    //Se inicia o restaura la sesión

    
 
    include "conexionBD.php";
    
    $file = $_FILES['cv']; //Asignamos el contenido del parametro a una variable para su mejor manejo
		
    $temName = $file['tmp_name']; //Obtenemos el directorio temporal en donde se ha almacenado el archivo;
    $fileName = $file['name']; //Obtenemos el nombre del archivo
    $fileExtension = substr(strrchr($fileName, '.'), 1); //Obtenemos la extensión del archivo.
    
    //Comenzamos a extraer la información del archivo
    $fp = fopen($temName, "rb");//abrimos el archivo con permiso de lectura
    $contenido = fread($fp, filesize($temName));//leemos el contenido del archivo
    //Una vez leido el archivo se obtiene un string con caracteres especiales.
    $contenido = addslashes($contenido);//se escapan los caracteres especiales
    fclose($fp);//Cerramos el archivo

    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $hoy = date('Y-m-d');

    $justificativo = $con->query("INSERT INTO concolaborador (cv) VALUES ($fileName');


    