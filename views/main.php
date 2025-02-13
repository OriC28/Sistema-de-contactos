<!--Esta vista es la página principal que contendrá el listado de contactos-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
    
    <title>Contact System</title>
</head>
<body>
    <header>
        <h1>Contact System</h1>
    </header>
    <main>
        <!-- CONTAINER DEL BOTÓN ADD -->
        <section class="add-container">
            <div class="button-add">
                <span><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/plus-math.png" alt="add"/></span>
                <a href="">Add contact</a>
            </div>

        </section>
        <!-- CONTAINER CON LAS BARRAS DE BUSQUEDA Y FILTRO -->
        <section class="search-container">
            <!-- BARRA DE BUSQUEDA -->
            <div class="search-bar">
                <input type="search" placeholder="Search...">
                <button id="search-icon">
                    <img width="30" height="30" src="https://img.icons8.com/fluency-systems-filled/30/search.png" alt="search"/>
                </button>
            </div>
            <!-- BARRA DE FILTROS -->
            <section class="filter-bar">
                <div id="filter-label">
                    <span><img width="30" height="30" src="https://img.icons8.com/forma-regular/30/filter.png" alt="filter"/></span>
                    <label for="">Filter by:</label>
                </div>
                <!-- CONTAINER DE BOTONES DE FILTRO -->
                <div id="filter-buttons-container">
                    <button class="button-filter" onclick="toggleSelection(this)">Names</button>
                    <button class="button-filter" onclick="toggleSelection(this)">Email</button>
                    <button class="button-filter" onclick="toggleSelection(this)">Company</button>
                </div>
                <!-- SCRIPT PARA MANTENER SELECCIONADO LOS BOTONES DE FILTRO -->
                <script>
                    function toggleSelection(element) {
                        var options = document.querySelectorAll('.button-filter');
                        options.forEach(function(option) {
                            option.classList.remove('selected');
                        });
                        element.classList.add('selected');
                    }
                </script>   
            </section>
            <!-- MENSAJE DE ERROR TIPO WARNING -->
            <div class="warning">
                <p>Contact not found.</p>
            </div>
        </section>
        <!-- CONTAINER TABLA DE CONTACTOS -->
        <section class="table-container">
            <table>
                
                <thead>
                    <tr>
                        <th>Names</th>
                        <th>Surnames</th>
                        <th>Company name</th>
                        <th>Rol</th>
                        <th>E-mail</th>
                        <th>Phone Number</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- DATOS INDIVIDUALES DE LOS ESTUDIANTES REGISTRADOS-->
                <!-- <?php
                    foreach ($students as $index => $data):
                        $name =  htmlspecialchars(trim($data['primer_nombre_estudiante'])) . " " . htmlspecialchars(trim($data['segundo_nombre_estudiante'])) . " " 
                                . htmlspecialchars(trim($data['primer_apellido_estudiante'])) . " " . htmlspecialchars(trim($data['segundo_apellido_estudiante']));
                        $cedula = (int) trim($data['cedula']);
                        $name_encrypted = base64_encode(openssl_encrypt($name, "aes-256-cbc", $key, 0, $iv));
                        $ci_encrypted = base64_encode(openssl_encrypt($cedula, "aes-256-cbc", $key, 0, $iv));
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars(trim($data['cedula']));?></td>
                        <td><?php echo htmlspecialchars(trim($data['primer_apellido_estudiante'])) . " " . htmlspecialchars(trim($data['segundo_apellido_estudiante']));?></td>
                        <td><?php echo htmlspecialchars(trim($data['primer_nombre_estudiante'])) . " " . htmlspecialchars(trim($data['segundo_nombre_estudiante']));?></td>
                        <td><?php echo htmlspecialchars(trim($data['correo_electronico']));?></td>
                        <td>
                            <div class="options">
                                <button class="add-button" type="button"><a href="index.php?controller=studentData&action=getRowData&site=addnotes&id=<?= urlencode($ci_encrypted);?>&n=<?= urlencode($name_encrypted); ?>">Agregar</a></button>
                                <button class="edit-button" type="button"><a href="index.php?controller=studentData&action=getRowData&site=editnotes&id=<?= urlencode($ci_encrypted);?>&n=<?= urlencode($name_encrypted); ?>">Editar</a></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach;?> -->
                </tbody>
            </table>
            <div class="pagination">
                <button><img width="15" height="15" src="https://img.icons8.com/ios-glyphs/30/less-than.png" alt="left"/></button>
                <label for="">1/10</label>
                <button><img width="15" height="15" src="https://img.icons8.com/ios-glyphs/30/more-than.png" alt="right"/></button>
            </div>
        </section>
    </main>
    <footer>
        <p>footer</p>
    </footer>
</body>
</html>