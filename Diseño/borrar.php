CREATE TABLE colaborador (
               id INT NOT NULL  AUTO_INCREMENT,
	nombre VARCHAR(25) NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(10) NOT NULL,
	fechaRegistro DATETIME NOT NULL,
	activo TINYINT NOT NULL,
                telefono INT NOT NULL,
               aptitudes_id INT,
	PRIMARY KEY(id),
	FOREIGN KEY (aptitudes_id) REFERENCES aptitudes(id)

)ENGINE = MyISAM ;

CREATE TABLE aptitudes(
id INT NOT NULL  AUTO_INCREMENT,
aptitud_id INT,
colab_id INT,
PRIMARY KEY(id),
FOREIGN KEY (aptitud_id) REFERENCES aptitud(id),
FOREIGN KEY (colab_id) REFERENCES colaborador(id)

)ENGINE =MyISAM ;
/

CREATE TABLE curso(
id INT NOT NULL  AUTO_INCREMENT,
nombreCurso VARCHAR(50),
anio INT (5),
duracion INT (4),
tiempo_id INT,
PRIMARY KEY(id),
FOREIGN KEY(tiempo_id) REFERENCES tiempo(id)
)ENGINE =MyISAM ;

CREATE TABLE tiempo(
id INT NOT NULL  AUTO_INCREMENT,
unidadTiempo VARCHAR(10),
PRIMARY KEY(id)
);

CREATE TABLE idioma(
id INT NOT NULL  AUTO_INCREMENT,
nombreIdioma VARCHAR(15),
PRIMARY KEY(id)
)ENGINE =MyISAM;

CREATE TABLE idiomas(
id INT NOT NULL  AUTO_INCREMENT,
colab_id INT,
idioma_id INT,
PRIMARY KEY(id),
FOREIGN KEY (idioma_id) REFERENCES idioma(id),
FOREIGN KEY (colab_id) REFERENCES colaborador(id)
);

INSERT INTO `provincia` (`nombreProvincia`) VALUES 
('Buenos Aires'),
('Catamarca'),
('Chaco'),
('Chubut'),
('Córdoba'),
('Corrientes'),
('Entre Ríos'),
('Formosa'),
('Jujuy'),
('La Pampa'),
('La Rioja'),
('Mendoza'),
('Misiones'),
('Neuquén'),
('Río Negro'),
('Salta'),
('San Juan'),
('Santa Cruz'),
('Santa Fe'),
('Santiago del Estero'),
('Tierra del Fuego'),
('Tucumán')
;




<div class="row row-cols-1">
    <div class="col" style="background-color:#01A0B8;margin-top:70px;">
    
      <a name="tema1"></a> 
       <br>

        <article class="text-center"  >
        <div style="background-color:#01A0B8; height:3px" ></div>
        <h2 class="text-center">Nosotros</h2>
        <div style="background-color:#01A0B8; height:3px" ></div>
           <h3>Ser el nexo entre la necesidad organizacional y la solución profesional</h3>
           <h5>
           Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.
         </h5>
         </article>

  </div>
      <div class="col" style="background-color:#FAFAFA;">
 
         <a name="tema2"></a>
           
        
        <article class="text-center"  >
           <br>
           <div style="background-color:#01A0B8; height:3px" ></div>
           <h2 class="text-center">Experiencia</h2>
           <div style="background-color:#01A0B8; height:3px" ></div>
           <h5>
         Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, "consecteur", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de "de Finnibus Bonorum et Malorum" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, "Lorem ipsum dolor sit amet..", viene de una linea en la sección 1.10.32

El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.
   Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, "consecteur", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de "de Finnibus Bonorum et Malorum" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, "Lorem ipsum dolor sit amet..", viene de una linea en la sección 1.10.32

El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.
Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, "consecteur", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de "de Finnibus Bonorum et Malorum" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, "Lorem ipsum dolor sit amet..", viene de una linea en la sección 1.10.32

El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.
Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, "consecteur", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de "de Finnibus Bonorum et Malorum" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, "Lorem ipsum dolor sit amet..", viene de una linea en la sección 1.10.32

El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.
   </h5>
         </article>
         
  
    </div>
 <div class="col" style="background-color:#01A0B8;">
   <a name="tema3"></a>
    <div class="container contactenos">

    <h1 >CONTACTENOS</h1><br><br>
            
 <form action="mailto:marianalucialopez@hotmail.com" method="post" enctype="text/plain" >
      <div class="form-group row">
                <div class="col-sm-6 form-group">
                      <input type="text"  id="nomb" name="nomb" placeholder="Nombre">
                </div>
                   <div class="col-sm-6 form-group">
                     <input type="text"  id="email"   name="email" maxlength="47" placeholder= "Email" required >
            </div>
             </div>

    <div class="form-group row">
                <div class="col-sm-6 form-group">
       
        <select name="selectProv" id="selectProv">
                          <option disabled selected >Seleccionar Provincia</option>
                            <?php
                                  $con = new mysqli("localhost","root","","consultora");

                                  $consultaD = $con->query("SELECT * FROM `provincia`");
                                

                                  while ($provincias = $consultaD->fetch_assoc()) {
                                      $provincia['nombreProvincia'] = utf8_encode($provincias['nombreProvincia']);

                                      echo "<option value='".$provincias['id']."'>".$provincia['nombreProvincia']."</option>";

                                  }
                        
                            ?>
                    </select>
                    </div>
                         </div>

    <div class="form-group row">
           <div class="text-center col-sm-12">
            
                      
                            <textarea name="mensaje"  id="mensaje" placeholder="Conocimientos" ></textarea>
                           
                         </div>
                         </div>
        <input type="submit" value="Enviar" id="boton" class="btn btn-lg btn-primary" style="background-color:#2874A6" > 
</form>
 </div> 
   </div>
   </div> 