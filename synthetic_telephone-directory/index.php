<!--
    Author: David Alberto Guzmán
    Course: DESARROLLO WEB CON PHP (3151356) 
    Evidence: Taller “Uso de arreglos”
-->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Directorio Telefónico</title>

        <!-- Estilos de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Estilos de DataTables -->
        <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

        <style>
            /*
                Esta hoja de estilos en CSS mejora la tabla.
            */

            /* Estilo general del body */
            body {
                background-color: #f8f9fa;
                padding: 20px;
                font-family: Arial, sans-serif;
            }

            /* Contenedor de la tabla */
            .container {
                max-width: 900px;
                background: white;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                margin: auto;
            }

            /* Estilo de la tabla */
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center; /* Centra el contenido horizontalmente */
            }

            /* Estilo de los encabezados */
            th {
                background-color: #007bff;
                color: white;
                padding: 15px; /* Espaciado interno más grande */
                text-align: center;
                vertical-align: middle; /* Centra verticalmente */
                font-size: 16px;
            }

            /* Estilo de las celdas */
            td {
                padding: 15px; /* Ajusta el padding para evitar que el texto quede pegado al borde */
                border-bottom: 1px solid #ddd;
                text-align: center; /* Centra horizontalmente */
                vertical-align: middle; /* Centra verticalmente */
                font-size: 14px;
            }

            /* Alternancia de color en filas para mejor visibilidad */
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            /* Efecto hover para destacar la fila seleccionada */
            tr:hover {
                background-color: #d0e2ff;
            }
        </style>


    </head>
    <body>

        <div class="container">
            <h2 class="text-center my-4">📞 Directorio Telef&oacutenico Sint&eacutetico</h2>

            <table id="tablaDirectorio" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Direcci&oacuten</th>
                        <th>Tel&eacutefono</th>
                        <th>Fecha de Cumplea&ntildeos</th>
                        <th>Color Favorito</th>
                        <th>Significado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    /**
                     * Arreglo de nombres para que se puedan elegir de manera "aleatoria".
                     */
                    $nombresPosibles = array(
                        "Carlos", "María", "Juan", "Andrea", "Luis", "Ana", "Pedro", "Laura", "Jorge", "Gabriela",
                        "Fernando", "Camila", "Santiago", "Valentina", "Ricardo", "Paula", "Daniel", "Isabel", "Oscar", "Sofía"
                    );

                    /**
                     * Arreglo de colores para que se puedan elegir de manera "aleatoria".
                     */
                    $coloresPosibles = array(
                        "Rojo" => "Pasión y energía",
                        "Azul" => "Tranquilidad y confianza",
                        "Verde" => "Naturaleza y esperanza",
                        "Amarillo" => "Riqueza y alegría",
                        "Negro" => "Elegancia y misterio",
                        "Blanco" => "Pureza e inocencia",
                        "Naranja" => "Creatividad y entusiasmo",
                        "Morado" => "Sabiduría y espiritualidad",
                        "Rosa" => "Amor y ternura",
                        "Gris" => "Equilibrio y neutralidad",
                        "Turquesa" => "Frescura y serenidad",
                        "Violeta" => "Lujo y sofisticación",
                        "Celeste" => "Paz y armonía",
                        "Marrón" => "Calidez y estabilidad",
                        "Dorado" => "Riqueza y exclusividad",
                        "Plateado" => "Modernidad y innovación",
                        "Beige" => "Simplicidad y tranquilidad",
                        "Fucsia" => "Diversión y creatividad",
                        "Índigo" => "Misterio e intuición",
                        "Oliva" => "Sabiduría y paz"
                    );

                    /**
                     * Se define el directorio teléfonico con valores pseudoaleatorios.
                     * El bucle for es para crear registros hasta la cantidad definida
                     * en la variable numeroDeRegistros
                     */
                    $numeroDeRegistros = 100;
                    $directorioTelefonico = [];
                    for ($i = 1; $i <= $numeroDeRegistros; $i++) {
                        // Elegimos un color aleatorio del array de colores posibles
                        // hay una probabilidad del 25% de que haya no haya un color favorito.
                        $numeroAleatorio = rand(1,100);
                        if($numeroAleatorio >= 1 && $numeroAleatorio <= 25)
                        {
                            $colorSeleccionado = "Indiferente";
                        }
                        else
                        {
                            $colorSeleccionado = array_rand($coloresPosibles);
                        }

                        // Verificamos si el color existe en el array de significados
                        $significadoColor = isset($coloresPosibles[$colorSeleccionado]) 
                                ? $coloresPosibles[$colorSeleccionado] 
                                : "No se encuentra el significado";

                        // Agregar el registro al directorio telefónico
                        array_push(
                                $directorioTelefonico,
                                [
                                    "Nombre" => $nombresPosibles[array_rand($nombresPosibles)]
                                    . " " . $nombresPosibles[array_rand($nombresPosibles)],
                                    "Direccion" => "CL " . rand(1, 100)
                                    . " #" . rand(1, 100)
                                    . "-" . rand(1, 100),
                                    "Telefono" => rand(3000000000, 3999999999),
                                    "Cumpleanhos" => sprintf("%02d", rand(1, 30))
                                    . "/" . sprintf("%02d", rand(1, 12))
                                    . "/" . rand(1990, 2025),
                                    "Color Favorito" => $colorSeleccionado,
                                    "Significado" => $significadoColor
                                ],
                        );
                    }

                    /**
                     * Acá va el bucle foreach que recorre los datos del arreglo
                     * directorioTelefonico y los agrega a la tabla
                     * el contador servirá para mostrar el identificador del usuario.
                     */
                    $counter = 1;
                    foreach ($directorioTelefonico as $datosUsuario) {
                        echo "<tr>
                                <td>$counter</td>
                                <td>{$datosUsuario["Nombre"]}</td>
                                <td>{$datosUsuario["Direccion"]}</td>
                                <td>{$datosUsuario["Telefono"]}</td>
                                <td>{$datosUsuario["Cumpleanhos"]}</td>
                                <td>{$datosUsuario["Color Favorito"]}</td>
                                <td>{$datosUsuario["Significado"]}</td>
                              </tr>";
                        $counter++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Librería de jQuery (debe ir antes de DataTables) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Librerías de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Librerías de DataTables -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


        <script>
            // Espera a que el documento HTML esté completamente cargado antes de ejecutar el código
            $(document).ready(function () {

                // Inicializa la tabla con DataTables en el elemento con ID 'tablaDirectorio'
                $('#tablaDirectorio').DataTable({
                    // Fuerza la paginación en 5 registros por página
                    "pageLength": 5,

                    // Opciones para cambiar la cantidad de registros por página
                    "lengthMenu": [5, 10, 25, 50],
                    
                    // Permite cambiar la cantidad de registros por página
                    "lengthChange": true, 

                    // Habilita la paginación (para dividir la tabla en páginas)
                    "paging": true,

                    // Permite ordenar las columnas al hacer clic en los encabezados
                    "ordering": true,

                    // Muestra información sobre la cantidad de registros y páginas
                    "info": true,

                    // Habilita el cuadro de búsqueda para filtrar los resultados en la tabla
                    "searching": true,

                    // Personaliza los textos de DataTables para que aparezcan en español
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por página", // Texto para seleccionar cantidad de registros por página
                        "zeroRecords": "No se encontraron resultados", // Mensaje si no hay coincidencias en la búsqueda
                        "info": "Mostrando página _PAGE_ de _PAGES_", // Texto con la información de la página actual
                        "infoEmpty": "No hay registros disponibles", // Texto si no hay registros en la tabla
                        "infoFiltered": "(filtrado de _MAX_ registros totales)", // Texto si se está aplicando un filtro de búsqueda
                        "search": "Buscar:", // Texto del cuadro de búsqueda

                        // Personaliza los botones de paginación
                        "paginate": {
                            "first": "Primero", // Texto del botón para ir a la primera página
                            "last": "Último", // Texto del botón para ir a la última página
                            "next": "Siguiente", // Texto del botón de "Siguiente"
                            "previous": "Anterior"  // Texto del botón de "Anterior"
                        }
                    }
                });
            });
        </script>


    </body>
</html>
