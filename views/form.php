<!-- Esta vista contendrá el formulario para realizar las operaciones necesarias-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Contact System</h1>
    </header>
    <main>
        <!-- CONTAINER DEL FORMULARIO  -->
        <section class="form-container">
            <h2>Personal Data</h2>
            <!-- FORMULARIO DE DATOS -->
            <form action="" class="form-data">
                <!-- CONTAINER DE LOS INPUTS DE DATOS PERSONALES -->
                <div class="personal-data-container">
                    <div class="input-section">
                        <label for="">Firt name</label>
                        <input name="firstName" type="text">
                        <!-- MENSAJE DE ERROR TIPO WARNING -->
                        <div class="warning">
                            <p>Field required.</p>
                        </div>
                    </div>
                    <div class="input-section">
                        <label for="">Last name</label>
                        <input name="lastName" type="text">
                        <!-- MENSAJE DE ERROR TIPO WARNING -->
                        <div class="warning">
                            <p>Field required.</p>
                        </div>
                    </div>
                    <div class="input-section">
                        <label for="">First surname</label>
                        <input name="firstSurname" type="text">
                        <!-- MENSAJE DE ERROR TIPO WARNING -->
                        <div class="warning">
                            <p>Field required.</p>
                        </div>
                    </div>
                    <div class="input-section">
                        <label for="">Last surname</label>
                        <input name="lastSurname" type="text">
                        <div class="warning">
                            <!-- MENSAJE DE ERROR TIPO WARNING -->
                            <p>Field required.</p>
                        </div>
                    </div>
                </div>
                <!-- CONTAINER DE LOS INPUTS DE DATOS DE EMPRESA -->
                <div class="company-data-container">
                    <div class="input-section">
                        <label for="">Company name</label>
                        <input name="companyName" type="text">
                        <!-- MENSAJE DE ERROR TIPO WARNING -->
                        <div class="warning">
                            <p>Field required.</p>
                        </div>
                    </div>
                    <div class="input-section">
                        <label for="">Company rol</label>
                        <input name="companyRol" type="text">
                        <!-- MENSAJE DE ERROR TIPO WARNING -->
                        <div class="warning">
                            <p>Field required.</p>
                        </div>
                    </div>
                    <div class="input-section">
                        <label for="">Company e-mail</label>
                        <input name="companyEmail" type="text">
                        <!-- MENSAJE DE ERROR TIPO WARNING -->
                        <div class="warning">
                            <p>Field required.</p>
                        </div>
                    </div>
                    <div class="input-section">
                        <label for="">Phone number</label>
                        <input name="phoneNumber" type="text">
                        <!-- MENSAJE DE ERROR TIPO WARNING -->
                        <div class="warning">
                            <p>Field required.</p>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Save" name="saveButton" class="button-save">
            </form>
        </section>
    </main>
    <footer>
        
    </footer>
</body>
</html>