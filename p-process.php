<?php //Openning tag
session_start();


// 1. get that data

//print echo

//var_dump($_SERVER);


//Key-value pairs
//PriNt_R($_POST); //Holds the data input by the user


//echo '<br/>';
//Indexed array 1,2,3,4,5
//print_r(['Kenya','Uganda','rwanda','tanzania','south-sudan','burundi']);
//They are case insensitive

//phpinfo();


if(count($_POST) > 0){

    //make connection - require the file with that code 
    require_once 'db.php';
    //@TODO : require/include require_once/include_once(what is the difference)

    $name = $_POST['full-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $github = $_POST['github'];

    //echo'we are here';

    //2. Validating(homework) - how do you do server side validation ;)
     
    //is it there(presence of a value)  - ++"" / is_null
   /* if($name == ""){
        echo 'name is empty';
    }

    //is it in the correct format - 1(truthy),0(falsey)
    if(!preg_match("[A-Za-z]",$name)){
        echo'please enter a valid name';
    }*/
    //var_dump(filter_var('sam',FILTER_VALIDATE_EMAIL));

    $error = [];

  

    if(!filter_var($email,FILTER_VALIDATE_EMAIL )){
        //die('please enter a valid email');
        $error['email'] = "Please enter a valid  email address";
        
    }/* else if(!preg_match("[A-Za-z]",$name)){
        $error['name'] = "Please ente a valid name";
    } else if(!preg_match("^0[1-9]{9}",$phone)){
        $error['phone'] = "Please enter a valid  phone number";
    }else if(!preg_match("a-zA-Z_\-", $github)){
        $error['github'] = "Please enter a valid github username";
    }*/
if(empty($errors)){
    mysqli_select_db($db,'cv');

    $sql = "INSERT INTO `details`(`full_name`, `email`, `phone`, `github`) VALUES ('$name','$email','$phone','$github')";

    try{

      $result = mysqli_query($db,$sql); 

      //remove any errors in the session
      unset($_SESSION['errors']);
      unset($_SESSION['data']);

      //redirect
      header('Location:index.php?msg=success');

    }catch(Exception $e){

        
        $error['duplicate'] = "We have already received your record.";

        $_SESSION['errors'] = $error;  
    


        header('Location:contact.php');
    }
    //die('here');
}

    if(count($error) > 0){
        //show the messages to the user
        $_SESSION['errors'] = $error;  
        $_SESSION['data'] = $_POST;

       

        header('Location:contact.php');
    }else{
        //no problem,save the data in the database
    }
    
}
else{
    //redirect them back to the form
    header("Location:contact.php");
}