<?php
/**
 * Plantilla de bloque personalizado para mostrar datos JSON.
 *
 * @param array $block Los ajustes y atributos del bloque.
 */

// Obtener la URL del JSON del campo del bloque.
// Si no se ha definido el campo, se usa una URL por defecto.
$json_url = block_field( 'json_url', false ); // 'false' para obtener el valor, no imprimirlo.

if ( empty( $json_url ) ) {
    // Fallback si el campo está vacío o no existe, usa la URL por defecto.
    $json_url = 'https://fp064.techlab.uoc.edu/~uocx3/producto3/public/api/reservas/zonas';
}

// Realizar la solicitud HTTP al endpoint JSON.
$response = wp_remote_get( $json_url );

// Verificar si hubo un error en la solicitud.
if ( is_wp_error( $response ) ) {
    echo '<p>Error al cargar los datos: ' . esc_html( $response->get_error_message() ) . '</p>';
} else {
    // Obtener el cuerpo de la respuesta.
    $body = wp_remote_retrieve_body( $response );
    // Decodificar el JSON en un array asociativo.
    $data = json_decode( $body, true );

    // Verificar si hubo un error al decodificar el JSON.
    if ( json_last_error() !== JSON_ERROR_NONE ) {
        echo '<p>Error al decodificar los datos JSON. El formato puede ser incorrecto.</p>';
        // Para depuración, puedes mostrar el contenido bruto del body:
        // echo '<pre>' . esc_html( $body ) . '</pre>';
    } elseif ( ! empty( $data ) && is_array( $data ) ) {
        // Si los datos son válidos y no están vacíos, mostrarlos.
        echo '<div class="listado-zonas-reservas">';
        echo '<h2>Resumen de Zonas de Reserva</h2>';
        echo '<ul>';
        // Iterar sobre cada elemento en el array de datos.
        foreach ( $data as $zona ) {
            // Verificar que las claves esperadas existen antes de mostrarlas.
            if ( isset( $zona['zona'], $zona['numero_traslados'], $zona['porcentaje'] ) ) {
                echo '<li>';
                echo '<strong>Zona:</strong> ' . esc_html( $zona['zona'] ) . '<br>';
                echo '<strong>Número de Traslados:</strong> ' . esc_html( $zona['numero_traslados'] ) . '<br>';
                echo '<strong>Porcentaje:</strong> ' . esc_html( $zona['porcentaje'] ) . '%';
                echo '</li>';
            }
        }
        echo '</ul>';
        echo '</div>';
    } else {
        // Si no se encontraron datos o el formato es inesperado.
        echo '<p>No se encontraron datos de zonas de reserva o el formato es inesperado.</p>';
    }
}
?>
