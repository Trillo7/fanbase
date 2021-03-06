<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/fanbase/Controller/Conexion.php';
 require_once $_SERVER['DOCUMENT_ROOT'].'/fanbase/Model/Recomendacion.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RecomendacionController
 *
 * @author Trillo
 */
class recomendacionController {

    function __construct($id, $nombre, $descripcion, $imagen,$tipo,$plataforma1, $plataforma2,$plataforma3,$plataforma4,$linkplataforma1,$linkplataforma2,$linkplataforma3,$linkplataforma4) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->tipo = $tipo;
        $this->plataforma1 = $plataforma1;
        $this->plataforma2 = $plataforma2;
        $this->plataforma3 = $plataforma3;
        $this->plataforma4 = $plataforma4;
        $this->linkplataforma1 = $linkplataforma1;
        $this->linkplataforma2 = $linkplataforma2;
        $this->linkplataforma3 = $linkplataforma3;
        $this->linkplataforma4 = $linkplataforma4;
    }
    //Metodos 
    public function __get($name)    {        
        return  $this->$name;
    }
    public function __set($name, $value)    {        
        $this->$name = $value;    
    }

    public static function recuperarTodosJuegos(){
        try{
            $conex=new Conexion();
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                $consulta=$conex->query("SELECT * FROM recomendacion WHERE tipo='juego'");
                if($consulta!=null){
                    $productos=null;
                    while($registro=$consulta->fetch(PDO::FETCH_OBJ)){
                        $p=new recomendacion($registro->id, $registro->nombre,$registro->descripcion,$registro->imagen,$registro->tipo,$registro->plataforma1,$registro->plataforma2,$registro->plataforma3,$registro->plataforma4,$registro->linkplataforma1,$registro->linkplataforma2,$registro->linkplataforma3,$registro->linkplataforma4);
                        $productos[]=$p;
                    }
                    return $productos;

                }
               
            }catch (PDOException $p) {
                echo "Error ".$p->getMessage()."<br />";
            }  

        } catch (PDOException $p) {
            echo "Error ".$p->getMessage()."<br />";
        }  
    }

    public static function recuperarTodosSeries(){
        try{
            $conex=new Conexion();
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                $consulta=$conex->query("SELECT * FROM recomendacion WHERE tipo='seriepeli'");
                if($consulta!=null){
                    $productos=null;
                    while($registro=$consulta->fetch(PDO::FETCH_OBJ)){
                        $p=new recomendacion($registro->id,$registro->nombre,$registro->descripcion,$registro->imagen,$registro->tipo,$registro->plataforma1,$registro->plataforma2,$registro->plataforma3,$registro->plataforma4,$registro->linkplataforma1,$registro->linkplataforma2,$registro->linkplataforma3,$registro->linkplataforma4);
                        $productos[]=$p;
                    }
                    return $productos;

                }
               
            }catch (PDOException $p) {
                echo "Error ".$p->getMessage()."<br />";
            }  

        } catch (PDOException $p) {
            echo "Error ".$p->getMessage()."<br />";
        }  
    }

    public static function recuperarRecomendacion($id){
        try{
            $conex=new Conexion();
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                $consulta=$conex->query("SELECT * FROM recomendacion WHERE id=$id");
                if($consulta!=null){
                    $productos=null;
                    $registro=$consulta->fetch(PDO::FETCH_OBJ);
                        $productos=new recomendacion($registro->id,$registro->nombre,$registro->descripcion,$registro->imagen,$registro->tipo,$registro->plataforma1,$registro->plataforma2,$registro->plataforma3,$registro->plataforma4,$registro->linkplataforma1,$registro->linkplataforma2,$registro->linkplataforma3,$registro->linkplataforma4);                    
                    return $productos;
                }
               
            }catch (PDOException $p) {
                echo "Error ".$p->getMessage()."<br />";
            }  

        } catch (PDOException $p) {
            echo "Error ".$p->getMessage()."<br />";
        }  
    }
    public static function recuperarUltimaRecomendacion(){
        try{
            $conex=new Conexion();
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                $consulta=$conex->query("SELECT * FROM recomendacion order by id desc limit 1");
                if($consulta!=null){
                    $productos=null;
                    $registro=$consulta->fetch(PDO::FETCH_OBJ);
                        $productos=new recomendacion($registro->id,$registro->nombre,$registro->descripcion,$registro->imagen,$registro->tipo,$registro->plataforma1,$registro->plataforma2,$registro->plataforma3,$registro->plataforma4,$registro->linkplataforma1,$registro->linkplataforma2,$registro->linkplataforma3,$registro->linkplataforma4);                    
                    return $productos;
                }
               
            }catch (PDOException $p) {
                echo "Error ".$p->getMessage()."<br />";
            }  

        } catch (PDOException $p) {
            echo "Error ".$p->getMessage()."<br />";
        }  
    }

    public static function borrarRecomendacion($id){
        $success = true;

        try {
            $c = new Conexion();
            $c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            die('Error fatal, imposible conectar con la base de datos.');
        }
        $sql = "DELETE FROM recomendacion WHERE id=$id";

        try {
            $query = $c->query($sql);
        } catch (PDOException $ex) {
            echo "Error ".$ex->getMessage()."<br />";
            return false;

        }

        return true;
    }

    public static function insertarRecomendacion($nombre, $descripcion, $imagen,$tipo,$plataforma1, $plataforma2,$plataforma3,$plataforma4,$linkplataforma1,$linkplataforma2,$linkplataforma3,$linkplataforma4){
        $success = true;

        try {
            $c = new Conexion();
            $c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            die('Error fatal, imposible conectar con la base de datos.');
        }
        $sql = "INSERT INTO recomendacion VALUES( null, '$nombre', '$descripcion', '$imagen','$tipo','$plataforma1', '$plataforma2','$plataforma3','$plataforma4','$linkplataforma1','$linkplataforma2','$linkplataforma3','$linkplataforma4')";

        try {
            $query = $c->query($sql);
        } catch (PDOException $ex) {
            $success = false;
            echo "Error ".$ex->getMessage()."<br />";

        }

        return $success;
    }

    public static function actualizarRecomendacion($id, $nombre, $descripcion, $imagen,$tipo,$plataforma1, $plataforma2,$plataforma3,$plataforma4,$linkplataforma1,$linkplataforma2,$linkplataforma3,$linkplataforma4){
        $success = true;
    echo "actualizar";
        try {
            $c = new Conexion();
            $c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            die('Error fatal, imposible conectar con la base de datos.');
        }
        if($imagen==''){
            $sql = "UPDATE recomendacion SET nombre='$nombre', descripcion='$descripcion',tipo='$tipo',plataforma1='$plataforma1', plataforma2='$plataforma2',plataforma3='$plataforma3',plataforma4='$plataforma4',linkplataforma1='$linkplataforma1',linkplataforma2='$linkplataforma2',linkplataforma3='$linkplataforma3',linkplataforma4='$linkplataforma4' WHERE id=$id";
        }else{
            $sql = "UPDATE recomendacion SET nombre='$nombre', descripcion='$descripcion', imagen='$imagen',tipo='$tipo',plataforma1='$plataforma1', plataforma2='$plataforma2',plataforma3='$plataforma3',plataforma4='$plataforma4',linkplataforma1='$linkplataforma1',linkplataforma2='$linkplataforma2',linkplataforma3='$linkplataforma3',linkplataforma4='$linkplataforma4' WHERE id=$id";
        }
        try {
            $query = $c->query($sql);
            echo "run sql";

        } catch (PDOException $ex) {
            $success = false;
            echo "Error ".$ex->getMessage()."<br />";

        }

        return $success;
    }

    
}
