<?php
/**
 * Obtiene el detalle de un alumno especificado por
 * su identificador "str_codigo"
 */

require 'Consultas.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['str_codigo'])) {

        // Obtener parámetro str_codigo
        $parametro = $_GET['str_codigo'];

        // Tratar retorno
        $retorno = Consultas::getById($parametro);


        if ($retorno) {

            $codigo_regalo["estado"] = 1;		// cambio "1" a 1 porque no coge bien la cadena.
            $codigo_regalo["codigo_regalo"] = $retorno;
            // Enviar objeto json del alumno
            print json_encode($codigo_regalo);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '2',
                    'mensaje' => 'No se obtuvo el registro'
                )
            );
        }

    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'estado' => '3',
                'mensaje' => 'Se necesita un identificador'
            )
        );
    }
}

