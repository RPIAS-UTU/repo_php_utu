<?php

class Person {

    protected $cedula;    
    protected $primerNombre;
    protected $primerApellido;
    protected $property;

    public function __construct($property)
    {
        $this->property = $property;
    }



}