<?php
require_once('Conexion.php');

class escuela extends Conexion
{
    private $escuela_id;
    private $nombre;
    private $direccion;
    private $circuito;
    private $contacto;
    private $telefono;
    private $matricula;


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
    public function set_matricula($valor)
    {
        $this->matricula = $valor;
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
    } public function get_matricula($valor)
    {
        $this->matricula = $valor;
    }


    // Registrar nueva escuela
    public function registrarescuela()
    {
        $conexion = $this->conecta();
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $stmt = $conexion->prepare("INSERT INTO escuela 
                (nombre, direccion, contacto, circuito, telefono) 
                VALUES (:nombre, :direccion, :contacto, :circuito, :telefono)");

                $stmt->execute([
                    ':nombre' => $this->nombre,
                    ':direccion' => $this->direccion,
                    ':contacto' => $this->contacto,
                    ':circuito' => $this->circuito,
                    ':telefono' => $this->telefono
                ]);

            $escuela_id = $conexion->lastInsertId();
    
            // Insertar matrícula
            $stmtMatricula = $conexion->prepare("INSERT INTO matriculaescuela 
                (escuela_id, fecha_registro, cantidad_alumnos) 
                VALUES (:escuela_id, CURDATE(), :cantidad)");
            
            $stmtMatricula->execute([
                ':escuela_id' => $escuela_id,
                ':cantidad' =>  $this->matricula
            ]);

            $respuesta = array('mensaje' => 'Escuela registrada exitosamente');
            echo json_encode($respuesta);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Consultar todas las escuelas
    public function consultarEscuelasCompletas() {
    $conexion = $this->conecta();
    $sql = "SELECT e.escuela_id, e.nombre, e.circuito, e.contacto, e.telefono, 
                   IFNULL(m.cantidad_alumnos, 0) as matricula
            FROM escuela e
            LEFT JOIN (
                SELECT escuela_id, MAX(fecha_registro) as ultima_fecha
                FROM matriculaescuela
                GROUP BY escuela_id
            ) ultima ON e.escuela_id = ultima.escuela_id
            LEFT JOIN matriculaescuela m ON m.escuela_id = ultima.escuela_id 
                                        AND m.fecha_registro = ultima.ultima_fecha
            ORDER BY e.nombre";
    
    $stmt = $conexion->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    // Obtener datos de una escuela específica
    public function obtenerescuelaPorId()
    {
        $conexion = $this->conecta();
        $sql = "SELECT e.*, IFNULL(m.cantidad_alumnos, 0) as matricula
                FROM escuela e
                LEFT JOIN (
                    SELECT escuela_id, MAX(fecha_registro) as ultima_fecha
                    FROM matriculaescuela
                    GROUP BY escuela_id
                ) ultima ON e.escuela_id = ultima.escuela_id
                LEFT JOIN matriculaescuela m ON m.escuela_id = ultima.escuela_id 
                                            AND m.fecha_registro = ultima.ultima_fecha
                WHERE e.escuela_id = :id";
        $stmt = $conexion->prepare($sql);
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
?>