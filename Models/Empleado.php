<?php
require_once 'Conexion.php';

class Empleado extends Conexion
{

    private $pdo;

    public function __CONSTRUCT()
    {
        $this->pdo = parent::getConexion();
    }
    public function login($data = [])
    {
        try {
            $consulta = $this->pdo->prepare("CALL SPU_LOGIN(?)");
            $consulta->execute(
                array($data['user'])
            );

            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Tokencrear($data = [])
    {
        try {
            $consulta = $this->pdo->prepare("CALL SPU_TOKEN_CREAR(?,?)");
            $consulta->execute(
                array(
                    $data['user'],
                    $data['token']
                )    
            );

            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function actualizarcontraseña($data = [])
    {
        try {
            $consulta = $this->pdo->prepare("CALL SPU_ACTUALIZAR_CONTRASEÑA(?,?)");
            $consulta->execute(
                array(
                    $data['user'],
                    $data['pass']
                )    
            );

            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function add($data = [])
    {
        try {
            $consulta = $this->pdo->prepare("CALL SPU_registro(?,?,?,?)");
            $consulta->execute(
                array(
                    $data['nombres'],
                    $data['apellidos'],
                    $data['nom_user'],
                    $data['pass_user']
                )
            );
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Token_verificar($data = [])
    {
        try {
            $consulta = $this->pdo->prepare("CALL SPU_TOKEN(?)");
            $consulta->execute(
                array($data['user'])
            );

            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

// $empleado = new Empleado();
// $registro = $empleado->Token_verificar(["user" => "jesusmattaramos@gmail.com"]);
// echo json_encode($registro);