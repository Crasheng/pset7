<?php
    
    //configuration
    require("../includes/config.php");
    
    require_once("PHPMailer/class.phpmailer.php"); 



    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //sure from empty
        if(empty($_POST["username"]))
        {
            apologize("Enter Your choosen Username");
        }
        if(empty($_POST["password"]) || empty($_POST["confpass"]))
        {
            apologize("Check your passowrd forms");
        }
        if($_POST["password"] !== $_POST["confpass"])
        {
            apologize("Passwords not compatiable");
        }
        
        //insert user into DB
        $insert = query("INSERT INTO users (username, hash, cash) values (?, ?, 10000.0)", $_POST["username"], crypt($_POST["password"]));

        //check if there's already similar username 
        if($insert === false)
        {
            apologize("Duplicated username");
        }
        
        //get last added "id"
        $rows = query("SELECT LAST_INSERT_ID() AS id");
    
        //for session remebering 
        $_SESSION["id"] = $rows[0]["id"];
  
/*
        $to = $_POST["e_mail"];
        $subject = "test";
        $message = "hello";
        $from = "eng.ahmed91@hotmail.com";
        $headers = "From". $from;
        mail($to, $subject, $message, $headers);

  */
        
        $mail = new PHPMailer();

        $mail->isSMTP();

        $mail->Host = "smtp.mydomain.com 25;smtp.mydomain.com;smtp.comcast.smtp;smtp.vodafone.com.eg;smtp.gmail.com;mail.hotmail.com";

        $mail->From = "eng.ahmed91@hotmail.com";

        $mail->addAddress($_POST["e_mail"]);

        //die($_POST["e_mail"]);

        $mail->Subject = "Congratulation";

        $mail->Body = "Just now!,For try!";

        if(!$mail->Send() === false)
            die($mail->ErrorInfo ."\n");
        

        //redirct
        redirect("/");
    }
    else
    {
        render("register.php", ["title" => "Registeration"]);
    }



?>
