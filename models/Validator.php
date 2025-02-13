<?php 

class Validator{
    private $errors = array();
    /**
     * Validate each field to verify if any is empty
     */
    public function validateEmptyField(array $data){
        if(empty($data['firstName'])){
            $this->errors['firstName'] = "Name is required.";
        }
        if(empty($data['lastName'])){
            $this->errors['lastName'] = "Last name is required.";
        }
        if(empty($data['firstSurname'])){
            $this->errors['firstSurname'] = "First surname is required.";
        }
        if(empty($data['secondSurname'])){
            $this->errors['secondSurname'] = "Second surname is required.";
        }
        if(empty($data['companyName'])){
            $this->errors['companyName'] = "Company name is required.";
        }
        if(empty($data['rol'])){
            $this->errors['rol'] = "Company rol is required.";
        }
        if(empty($data['email'])){
            $this->errors['email'] = "Company email is required.";
        }
        if(empty($data['phone'])){
            $this->errors['phone'] = "Company phone is required.";
        }
    }
    /**
     * Validate each field string type
     */
    public function validateString(string $field, string $errorMessage, string $errorName){
        if(!preg_match('/^[a-zA-Z\s]*$/', $field)){
            $this->errors[$errorName] = $errorMessage;
        }
    }
    /**
     * Validate each name and surname 
     */
    public function validateNames(string $firstName, string $lastName, string $firstSurname, string $secondSurname){
        $this->validateString($firstName, "Name invalid.", "firstName");
        $this->validateString($lastName, "Last name invalid.", "lastName");
        $this->validateString($firstSurname, "First surname invalid.", "firstSurname");
        $this->validateString($secondSurname, "Second surname invalid.", "secondSurname");
    }

    /**
     * Validate email
     */
    public function validateEmail(string $email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] = "Email invalid.";
        }
    }
    /**
     * Validate phone number
     */
    public function validatePhone(string $phone){
        if(!preg_match('/^[0-9]{11}$/', $phone)){
            $this->errors['phone'] = "Phone invalid.";
        }
    }
    /**
     * Create session variable with errors
     */
    public function setErrors(){
        if(count($this->errors)> 0){
            $_SESSION['errors'] = $this->errors;
        }
    }
    /**
     * Clean all errors and session variable
     */
    public function cleanErrors(){
        $errors['errors'] = array();
        unset($_SESSION['errors']);
    }

}

