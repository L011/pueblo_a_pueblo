<?php
require_once('Conexion.php');

class Gestionescuelas extends Conexion
{
    private $escuela_id;
    private $nombre;
    private $direccion;
    private $circuito;
    private $contacto;
    private $telefono;


    // Setters
    public function set_nombre($valor)
    {
        $this->nombre = $valor;
    }
    public function set_direccion($valor)
    {
        $this->direccion = $valor;
    }
    public function set_circuito($valor)
    {
        $this->circuito = $valor;
    }
    public function set_contacto($valor)
    {
        $this->contacto = $valor;
    }
    public function set_telefono($valor)
    {
        $this->telefono = $valor;
    }
    public function set_escuelaId($valor)
    {
        $this->escuela_id = $valor;
    }

    //getters
    public function get_nombre($valor)
    {
        $this->nombre = $valor;
    }
    public function get_direccion($valor)
    {
        $this->direccion = $valor;
    }
    public function get_circuito($valor)
    {
        $this->circuito = $valor;
    }
    public function get_contacto($valor)
    {
        $this->contacto = $valor;
    }
    public function get_telefono($valor)
    {
        $this->telefono = $valor;
    }
    public function get_escuelaId($valor)
    {
        $this->escuela_id = $valor;
    }


    // Registrar nueva escuela
    public function registrarescuela()
    {
        $conexion = $this->conecta();
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $stmt = $conexion->prepare("INSERT INTO escuela 
            (nombre, direccion, circuito, contacto, telefono) 
            VALUES (:nombre, :direccion, :circuito, :contacto, :telefono)");

            $stmt->execute([
                ':nombre' => $this->nombre,
                ':direccion' => $this->direccion,
                ':circuito' => $this->circuito,
                ':contacto' => $this->contacto,
                ':telefono' => $this->telefono
            ]);

            return "escuela registrada exitosamente";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Consultar todas las escuelas
    public function consultarescuelas()
    {
        $conexion = $this->conecta();
        $stmt = $conexion->query("SELECT * FROM escuela ORDER BY nombre");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener datos de una escuela específica
    public function obtenerescuelaPorId()
    {
        $conexion = $this->conecta();
        $stmt = $conexion->prepare("SELECT * FROM escuela WHERE escuela_id = :id");
        $stmt->execute([':id' => $this->escuela_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar información de la escuela
    public function actualizarescuela()
    {
        $conexion = $this->conecta();
        try {
            $stmt = $conexion->prepare("UPDATE escuela 
            SET nombre = :nombre,
                direccion = :direccion,
                contacto = :contacto 
            WHERE escuela_id = :id");

            $stmt->execute([
                ':nombre' => $this->nombre,
                ':direccion' => $this->direccion,
                ':contacto' => $this->contacto,
                ':id' => $this->escuela_id
            ]);

            return "Información actualizada correctamente";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Eliminar escuela (con validación de matrículas)
    public function eliminarescuela()
    {
        $conexion = $this->conecta();
        try {
            $conexion->beginTransaction();

            // Verificar si tiene matrículas registradas
            $stmtMatriculas = $conexion->prepare("SELECT COUNT(*) FROM MatriculaEscolar WHERE escuela_id = :id");
            $stmtMatriculas->execute([':id' => $this->escuela_id]);

            if ($stmtMatriculas->fetchColumn() > 0) {
                throw new Exception("No se puede eliminar, tiene matrículas asociadas");
            }

            // Verificar si tiene despachos asignados
            $stmtDespachos = $conexion->prepare("SELECT COUNT(*) FROM DetalleDespacho WHERE escuela_id = :id");
            $stmtDespachos->execute([':id' => $this->escuela_id]);

            if ($stmtDespachos->fetchColumn() > 0) {
                throw new Exception("No se puede eliminar, tiene despachos asociados");
            }

            // Eliminar la escuela
            $conexion->prepare("DELETE FROM escuela WHERE escuela_id = :id")
                ->execute([':id' => $this->escuela_id]);

            $conexion->commit();
            return "escuela eliminada correctamente";
        } catch (PDOException $e) {
            $conexion->rollBack();
            return "Error: " . $e->getMessage();
        } catch (Exception $e) {
            $conexion->rollBack();
            return $e->getMessage();
        }
    }
}
