<?php

$Validation_Params = array(
    'username'      =>  [
                            'pattern'   => '/^[A-z0-9_\-]{3,16}$/',
                            'bad_value' => '',
                            'error'     => '*'
                        ],
    'pass'          =>  [   
                            'pattern'   => '/^(?=.*\d)(?=.*\W)(?=.*[A-Z]).{8,}$/',
                            'bad_value' => '',
                            'error'     => '*'
                        ],
    'name'          =>  [
                            'pattern'   => '/^([A-z]{1,}\-?\s?[A-z]{1,})+$/',
                            'bad_value' => '',
                            'error'     => '*'
                        ],
    'email'         =>  [
                            'pattern'   => '/^[A-z][A-z0-9_\.\-]{2,32}@([A-z0-9\.\-]{3,15})(\.[A-z]{2,8}){1,2}$/',
                            'bad_value' => '',
                            'error'     => '*'
                        ],                 
);

require './Models/SignupModel.php';

$validation = false;
$messageSignup = '';

if (!isset($_POST['reset'])){

    if (isset($_POST['SubmitSignup'])) {
        
        $_POST['username'] = strtolower($_POST['username']);
        $_POST['email'] = strtolower($_POST['email']);

        $validation = true;
        
        foreach ($Validation_Params as $field => $condition){
        
            if (validate($_POST[$field], $condition['pattern'])){
                $validation *= true;
            } else {
                $validation *= false;
                $Validation_Params[$field]['error'] = "Your $field is not correct";
                $Validation_Params[$field]['bad_value'] = $_POST[$field];
            }
        }
        
        if ($validation) {
            if (checkExist('username', $_POST['username'])) {
                $Validation_Params['username']['error'] = "Your username already existed";
                $Validation_Params['username']['bad_value'] = $_POST['username'];
                $validation = false;
            }
            if (checkExist('email', $_POST['email'])) {
                $Validation_Params['email']['error'] = "Your email already existed";
                $Validation_Params['email']['bad_value'] = $_POST['email'];
                $validation = false;
            }
        }

        if ($validation) {
            $messageSignup = 'Your inscription was saved successfully';

            $username = $_POST['username'];
            $password = $_POST['pass'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $date = date('Y-m-d H:i:s', time());

            insertUser($username, $password, $name, $email, $date);
            
        } else {
            $messageSignup = 'Error: Your information was not correct';
        }

        require './Views/SignupView.php';
    
    } else {
        require './Views/SignupView.php';
    }

} else {
    require './Views/SignupView.php';
}
