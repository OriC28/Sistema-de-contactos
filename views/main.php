<!--Esta vista es la página principal que contendrá el listado de contactos-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" href="../assets/css/styles.css?v=<?php echo time(); ?>">
=======
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
    
>>>>>>> 7415dd04a43722834727b14478bb04619f12bb2a
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
<<<<<<< HEAD
            <div class="warning"></div>
        </section>
        <!-- CONTAINER TABLA DE CONTACTOS -->
        <section class="table-container">
            <table id="table">
                <thead>
                    <tr>
                        <th>#</th>
=======
            <div class="warning">
                <p>Contact not found.</p>
            </div>
        </section>
        <!-- CONTAINER TABLA DE CONTACTOS -->
        <section class="table-container">
            <table>
                
                <thead>
                    <tr>
>>>>>>> 7415dd04a43722834727b14478bb04619f12bb2a
                        <th>Names</th>
                        <th>Surnames</th>
                        <th>Company name</th>
                        <th>Rol</th>
                        <th>E-mail</th>
                        <th>Phone Number</th>
                        <th>Options</th>
                    </tr>
                </thead>
<<<<<<< HEAD
                <!--AQUÍ SE INSERTARÁN LOS DATOS-->
                <tbody id="tbody"></tbody>
            </table>
            <!-- PAGINACIÓN-->
            <div class="pagination">
                <button id="prev"><img width="15" height="15" src="https://img.icons8.com/ios-glyphs/30/less-than.png" alt="left"/></button>
                <label id="pageInfo"></label>
                <button id="next"><img width="15" height="15" src="https://img.icons8.com/ios-glyphs/30/more-than.png" alt="right"/></button>
            </div>
        </section>
    </main>
    <!--FOOTER-->
    <footer>
        <p>footer</p>
    </footer>
    <!--SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
    crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
=======
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
>>>>>>> 7415dd04a43722834727b14478bb04619f12bb2a
</body>
</html>