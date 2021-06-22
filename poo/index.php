<?php
include_once("polimorfismo/soporte.php");

$soporte = new Soporte();
$soporte->asistencias = 25;
$soporte->setSueldo(30000);
echo 'El sueldo del funcionarios de soporte Juan Perez es de : ' . $soporte->calcularSueldo();




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
 