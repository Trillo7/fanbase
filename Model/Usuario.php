<?php


class Usuario {
    private $id;
    public $usuario;
    private $nombre;
    private $email;
    private $password;
    private $rango;
    private $texto;
    private $activo;
    private $imagen;
    private $idadmob;

    public function __construct($usuario, $nombre, $email, $password, $rango, $texto, $activo,$imagen) {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rango = $rango;
        $this->texto = $texto;
        $this->activo = $activo;
        $this->imagen=$imagen;
    }

    public function setAdmob($admob){
        $this->idadmob = $admob;
    }

    public function getAdmob(){
        return $this->idadmob;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
}