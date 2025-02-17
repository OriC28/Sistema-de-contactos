<?php

/**
 * Forbidden Access Page
 *
 * This file serves as a custom 403 Forbidden error page. It sets the HTTP response code to 403
 * and displays a styled error message to inform users that they do not have permission to access
 * the requested resource.
 *
 * @package    ClientAPI\Errors
 * @author     Oriana Colina <orianacolina.perea@gmail.com>>
 * @version    1.0.0
 * @license    MIT
 */

// Set the HTTP response code to 403 (Forbidden)
http_response_code(403);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <style>
        /**
         * Global body styling.
         *
         * Sets the background color for the entire page.
         */
        body {
            background-color: #B3CBCB;
        }

        /**
         * Error container styling.
         *
         * Styles the container that holds the error message. It centers the content
         * and applies a background color and border radius.
         */
        .error-container {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 
                         'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 
                         'Open Sans', 'Helvetica Neue', sans-serif;
            justify-self: anchor-center;
            justify-items: center;
            align-items: center;
            background-color: #B3CBCB;
            margin-top: 150px;
            border-radius: 30px;
        }

        /**
         * Heading and paragraph styling.
         *
         * Applies red color to the <h1> element within the error container.
         */
        .error-container h1{
            color: red;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Forbidden</h1>
        <h2>You don't have permission to access this resource (Error 403).</h2>
    </div>
</body>
</html>