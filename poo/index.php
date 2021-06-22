<?php

// TRANSPORTES NO ANIMALES
    
// Clase Trasporte

    // largo
    // ancho
    // peso
    // color
    // capacidad_carga
    // tipo_carga
    // combustible
    // recorrido
    // medio (aire, tierra, agua)
    // tipo (tierra: camioneta, agua: crucero, aire: avion )
    // motor
    // HP(caballos de fuerza)
    // marca
    // modelo
    // velocidad_max

// Clase Transporte_Terrestre

    // Ruedas

// Clase Transporte_Aéreo

    // Tipo de fuselaje
    // Tren de aterrizaje (rudas - flotadores)
    // Sesores ({1=altimetro - 2=barometros - 3=termicos ... etc} :: codiguera) 

        // Clase Sensores

            // ID (DENOMINACION/NOMBRE) (HABILITADO/ACTIVO)

// Clase Transporte_Marítimo
           


     class Persona
     {

        
       /*  function __construct()
        {
             $nombre="Agustín";
         $apellido="Toya";

            $this->Saludo($nombre,$apellido);
        } */
        /*Caso 1, constructor tiene los atributos creados en él.
        Luego los manda a la función, que sin el "this", no anda. */
        
     public function __construct($nom, $ape)
        {
            $this->Saludo($nom,$ape);
        }
 
       public function __construct_pepe()
       
        {
            $this->Saludo("Hola");
        }

        public function Saludo($nombre, $apellido){
            echo "Hola " . $nombre . " " . $apellido; 
            //El echo solo puede existir dentro de una función
        }

    
        
     }
     $obj = new Persona();
     //$obj->Saludo('German', 'Garamendia');

