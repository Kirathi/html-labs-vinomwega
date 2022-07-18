<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <meta name = "author" content="vincent">
        <title>Get in touch</title>
       <style media ="screen">
        .error{
            color: red;
            border-color: red;
        }
        nav>ul{
            list-style: none;
        }

        </style>

     <link rel = "stylesheet" href = "css/contact.css">
    </head>
    <body>
    <nav>
        <ul>
            <li> <a href = "index.php"> Home </a></li>
        </ul>
        </nav>

    <!--difference between empty /count -->
    <?php if(!empty($_SESSION['errors'])): ?>

      <p>The form has error(s)</p>
      <ul>
        
       <?php  $fields_width_errors = []; ?>
            
        <?php foreach($_SESSION['errors'] as $key => $error): 
           $fields_width_errors[] = "document.getElementByID('$key').classList.add('error');";
            ?>

            <li class = 'error'><?php echo $error; ?> </li>
            <?php endforeach; ?>
         <!--first run $letter- a -->
          <!--second run $letter- b -->
           <!--third run $letter- c -->
           <?php $fields_with_errors_str = implode("",$fields_width_errors); ?>
    </ul>
     
      
        <?php endif; ?>

        <form id = "contact-form" name = "contact-form"method = "post" action = "process.php"> <!--GET-is-secure 
            POST - is encrypted-->
             
            <label id= "label-full-name"for="full-name">Name</label>
            <input required type='text' id = "full-name" name="full-name"  class="" value ="<?php echo @$_SESSION['data']['full-name']; ?>" />

            <label for="email" id = "EM">Email</label>
            <input required type='email' id = "email" name="email" class="" value ="<?= @$_SESSION['data']['email'] ?>">

            <label id="label-phone" for="phone">Phone</label>
            <input required type='text' id = "phone" name="phone" class="" value ="<?= @$_SESSION['data']['phone'] ?>">

            <label id="label-github" for="github">@Github</label>
            <input required type='text' id = "github" name="github" class="" value ="<?= @$_SESSION['data']['github'] ?>">

            <input onclick="validateInput();" type="submit" value="Submit">

                
        </form> 
        
        <script src="js/script.js"></script>
        <?php if(!empty($_SESSION['errors'])): ?>
             
        <script type = "text/javascript">
               <?= $fields_with_errors_str; ?>
       </script>
        <?php endif;?>

    </body>
</html>