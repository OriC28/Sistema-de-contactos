<?php
/**
 * Form View
 *
 * This file contains the HTML structure for the client contact form.
 * It includes fields for personal and company data, along with error messages
 * and a submit button. The form is styled using an external CSS file and uses
 * jQuery for client-side interactions.
 *
 * @package    ClientAPI\Views
 * @author     Genesys Alvarado <gnesyuwu@gmail.com>
 * @version    1.0.0
 * @license    MIT
 */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link to the external CSS file with a cache-busting query string -->
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
    <!-- Include jQuery library for client-side scripting -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
            crossorigin="anonymous"></script>
    <title>Contact System</title>
</head>
<body>
    <!-- Header section -->
    <header>
        <h1>Contact System</h1>
    </header>

    <!-- Main content section -->
    <main>
        <!-- Form container -->
        <section class="container-form">
            <!-- Client data form -->
            <form id="client-form" method="POST">
                <!-- Personal data section -->
                <div class="form-data">
                    <div class="data-container">
                        <h3>Personal Data</h3>
                        <!-- Hidden input for client ID -->
                        <input type="hidden" id="clientId">
                        
                        <!-- First name input -->
                        <div class="input-section">
                            <label for="firstName">First name</label>
                            <div class="input">
                                <input id="firstName" name="firstName" type="text">
                            </div>
                            <!-- Warning message for validation errors -->
                            <div class="warning">
                                <p></p>
                            </div>
                        </div>

                        <!-- Last name input -->
                        <div class="input-section">
                            <label for="lastName">Last name</label>
                            <div class="input">
                                <input id="lastName" name="lastName" type="text">
                            </div>
                            <!-- Warning message for validation errors -->
                            <div class="warning">
                                <p></p>
                            </div>
                        </div>

                        <!-- First surname input -->
                        <div class="input-section">
                            <label for="firstSurname">First surname</label>
                            <div class="input">
                                <input id="firstSurname" name="firstSurname" type="text">
                            </div>
                            <!-- Warning message for validation errors -->
                            <div class="warning">
                                <p></p>
                            </div>
                        </div>

                        <!-- Second surname input -->
                        <div class="input-section">
                            <label for="secondSurname">Last surname</label>
                            <div class="input">
                                <input id="secondSurname" name="secondSurname" type="text">
                            </div>
                            <!-- Warning message for validation errors -->
                            <div class="warning">
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <!-- Company data section -->
                    <div class="data-container">
                        <h3>Company Data</h3>
                        
                        <!-- Company name input -->
                        <div class="input-section">
                            <label for="companyName">Company name</label>
                            <div class="input">
                                <input id="companyName" name="companyName" type="text">
                            </div>
                            <!-- Warning message for validation errors -->
                            <div class="warning">
                                <p></p>
                            </div>
                        </div>

                        <!-- Company role input -->
                        <div class="input-section">
                            <label for="rol">Company role</label>
                            <div class="input">
                                <input id="rol" name="rol" type="text">
                            </div>
                            <!-- Warning message for validation errors -->
                            <div class="warning">
                                <p></p>
                            </div>
                        </div>

                        <!-- Company email input -->
                        <div class="input-section">
                            <label for="email">Company e-mail</label>
                            <div class="input">
                                <input id="email" name="email" type="text">
                            </div>
                            <!-- Warning message for validation errors -->
                            <div class="warning">
                                <p></p>
                            </div>
                        </div>

                        <!-- Phone number input -->
                        <div class="input-section">
                            <label for="phone">Phone number</label>
                            <div class="input">
                                <input id="phone" name="phone" type="text">
                            </div>
                            <!-- Warning message for validation errors -->
                            <div class="warning">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit button -->
                <input type="submit" value="Save" id="submit" name="submit" class="button-save">
            </form>

            <!-- Include JavaScript files for form handling and other scripts -->
            <script src="../assets/js/formScript.js"></script>
            <script src="../assets/js/scripts.js"></script>
        </section>
    </main>

    <!-- Footer section -->
    <footer>
        <p></p>
    </footer>
</body>
</html>
