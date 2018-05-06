<?php

/**
 * Representa el la estructura de las Alumnoss
 * almacenadas en la base de datos
 */
require 'Database.php';

class Consultas{
    function __construct(){
    
}

    
    /**
     * Insertar un nuevo Alumno
     *
     * @param $nombre      nombre del nuevo registro
     * @param $direccion dirección del nuevo registro
     * @return PDOStatement
     */
    public static function insert( $mensaje, $correo){
        // Sentencia INSERT
        $comando = "INSERT INTO tbl_quejas ( " . "str_mensaje," . " str_correo)" . " VALUES( ?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(  array( $mensaje,  $correo) );

    }

    
   
    public static function insert_ganador( $nombre, $correo, $puntos){
        // Sentencia INSERT
        $comando = "INSERT INTO tbl_ganadores ( " . "str_nombre," . "str_correo," . "str_fichas)" . " VALUES( ?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(  array( $nombre,  $correo,  $puntos) );

    }
    
    
         /**
     select para obtener el regalo
     *
     * @param $str_codigo Identificador del regalo
     * @return mixed
     */
    public static function getById($str_codigo){
        // Consulta de la tabla Alumnos
        $consulta = "SELECT * FROM tbl_regalos WHERE str_codigo = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($str_codigo));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
/**
     * Eliminar el registro con el identificador especificado
     *
     * @param $str_id_regalo identificador de la tabla Regalos
     * @return bool Respuesta de la eliminación
     */
    public static function delete($str_id_regalo){
        // Sentencia DELETE
        $comando = "DELETE FROM tbl_regalos WHERE str_id_regalo=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($str_id_regalo));
    }
    
  
}

?>
