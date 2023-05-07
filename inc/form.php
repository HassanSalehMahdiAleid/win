<?php
  $firstName =       "";
  $lastName =        "";
  $email =           "";
$errors = [

    'firstNameError' => '',
    'lastNameError'  => '',
    'emailError'     => '',
];

if (isset($_POST['submit'])) {

    $firstName =        $_POST['firstName'];
    $lastName =         $_POST['lastName'];
    $email =            $_POST['email'];


    
   
    //تحقق الأسم الأول
    if(empty($firstName)){
       $errors['firstNameError'] = 'يرجى ادخال الاسم الاول';

    }    
    //تحقق الأسم الأخير 
    if(empty($lastName)){
        $errors['lastNameError'] = 'يرجى ادخال الاسم الاخير';
    }    
    //تحقق الأيميل    
    if(empty($email)){
        $errors['emailError'] = 'يرجى ادخال الايميل';   
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['emailError'] = 'يرجى ادخال ايميل صحيح';   
    }

    
    //تحقق لا يود أخطاء
    if(!array_filter($errors)){
     
        $firstName =        mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName =         mysqli_real_escape_string($conn, $_POST['lastName']);
        $email =            mysqli_real_escape_string($conn, $_POST['email']);

        $sql = "INSERT INTO users(firstName, lastName, email)
            VALUE ('$firstName' ,'$lastName', '$email') ";

if(mysqli_query($conn, $sql)){
    header('location: ' . $_SERVER['PHP_SELF']);
}else{
    echo 'Error: ' . mysqli_error($conn);
}
    }
 
}