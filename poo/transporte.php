<?php
class Trasnporte
{
    // Declaración de una propiedad
    private $largo;
    private $ancho;
    

    // Declaración de un método
    public function mostrarVar() {
    // La pseudovariable $this está disponible cuando un método es invocado dentro del
    // contexto de un objeto. $this es una referencia al objeto invocador.
    echo $this->var;
    }

    /**
     * Get the value of ancho
     */ 
    public function getAncho()
    {
        return $this->ancho;
    }

    /**
     * Set the value of ancho
     *
     * @return  self
     */ 
    public function setAncho($ancho)
    {
        $this->ancho = $ancho;

        return $this;
    }
    }