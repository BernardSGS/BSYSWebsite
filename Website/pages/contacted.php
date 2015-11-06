<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Bernard Cloutier, Bruce Edouard Brazier">
<title>Biosignal Systems Concordia</title>
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="../css/template.css">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="../css/landing-page.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Navigation -->
<script type="text/javascript" src="../js/Navigation_bar.js"></script>
<script type="text/javascript" src="../js/validation.js"> </script>
<!-- banner -->
<script type="text/javascript" src="../js/banner.js"></script>
<!-- Page content -->
<!-- This code is taken directly from the agency template from bootstrap. The link is  http://startbootstrap.com/template-overviews/agency/ -->

    
        <div class="outer">
               <div class="row">
                <div class="col-lg-12 text-center">
                      <h2 class="section-heading">Contact Us</h2>
                </div>
            </div>
            <div class="inner" style="text-align: center;">                   
                    <?php                               
                           require_once('../../mysqli_connect.php'); #connection
                           
                           
                           $name=$_POST['name'];                           
                           $phoneNumber=$_POST['phone'];
                           $email=$_POST['email'];                          
                           $message=$_POST['message'];                      
                           
                                               
                           $query ="SELECT email FROM contact WHERE email='$email' "; 
                           // Check if the username exist already                          
                           
                           $response= mysqli_query($dbc,$query);  
                           
                           if(mysqli_num_rows($response) <= 0){ 
                           
                                                     // registering
                           echo "Thanks you,  we will get in contact with you as soos as possible." . $name . "  " . "<br/> You are to be contacted with these informations :";                          
                           echo "Phone Number : " . $phoneNumber . "  " . "<br/>";
                           echo "Email : " . $email . "  "  . "<br/>";
                           echo "Program : " . $program . "  "  . "<br/>";
                                                            
                           
                           // creating the  user  in the table
                           $query = "INSERT INTO contact (`user_id`, `name`, `phone_number`, `email`, `content`, `date`)
                              VALUES (null,'$name','$phoneNumber','$email','$message',NOW());";  

                           // $sql = "INSERT INTO `bsysca_wp821`.`involved` (`user_id`, `name`, `phone_number`, `email`, `program`, `content`, `date`) VALUES (NULL, \'jfyj\', \'jyfj\', \'jfyj\', \'yfjfjy\', \'fyjfyj\', \'\');";
                           
                           if (mysqli_query($dbc, $query)) {
                               echo "You have been registered successfully." . '<br/>'  ;
                           } else {
                               echo "Error: " . $query . "<br/>" . mysqli_error($dbc);
                           }
                                               
                           } else {
                           
                              // redirect
                            ?>
                         <script type="text/javascript">
                           alert("This email is taken.");
                           window.location.href = "contactus.html";
                        </script>
                        <?php                           
                           } 
                           
                           mysqli_close($dbc);  
                           
                           ?>                                       
                        </div>
                                
            
        </div>
    

<!-- Footer -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/Footer.js"></script>
</body>
</html>