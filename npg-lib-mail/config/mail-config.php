<?php

/* npg-lib is a simple library based on another popular PHP library; PHPMailer, AJAX, and PHP. 'npg' library is developed by Ayodeji to help PHP newbies EASILY deploy an 
email-only login system in their site using pre-built scripts and little coding. NPG => NO PASSWORD GANG :) 

* THIS PART IS STRICTLY FOR MAILING, AND CAN BE USED INDEPENDENTLY FOR OTHER PURPOSES BESIDES SENDING OTP CODES

* PHP Version 7.2. 
* @see https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project

USAGE: require $_SERVER["DOCUMENT_ROOT"]."/npg-lib/config/mail-config.php";

* This will only enable mailing features, ensure you're using the modded PHPMailer file in the npg-lib folder you downloaded, the normal PHPMailer Library won't work!

=============================================================================================================================================================
============= ONLY INCLUDE THIS SCRIPT AFTER YOU HAVE DEFINED YOUR RECEIPIENTS' EMAIL AND NAME, EDIT '$email' AND '$first' ACCORDINGLY ======================
=============================================================================================================================================================
*/


//EDIT THESE

$host_address = 'mail.example.com or example.com (for namecheap)'; //This is your mailing host address ex: mail.yoursite.com

$host_name = $host_address;

$acc_name = 'Test Address'; //This will be shown as the sender's name eg. Google, John Doe

$acc_username = 'test@test-site.net'; //This is the email account you created in cPnael ex: account@yoursite.com

$acc_password = 'SponGeBobLovEsPAtRiCk'; //This is the password to that email account you created in cPanel

$mail_subject = 'Monthly Newsletter'; //This is the subject of your mail

$body_html = 'YOUR HTML CODE FOR THE MESSAGE HERE'; //This is your message/body with HTML 

$body_no_html = 'YOUR MESSAGE WITHOUT HTML FOR UNSUPPORTED DEVICES'; //This is your message/body without HTML for unsupported devices

$default_path = $_SERVER['DOCUMENT_ROOT']; //This is your website's root folder; usually public_html. DO NOT EDIT THIS.

$custom_path = '/npg-lib/PHPMailer/'; /* Delete 'npg-lib/PHPMailer' and replace it with your npg-lib PHPMailer location path if you moved it out of the npg-lib folder,
                               ex. $custom_path = "/PHPMailer/"; means
                              the PHPMailer library folder is in the root directory, that is 'public_html/PHPMailer',
                              $custom_path = "/mail/PHPMailer/"; means 
                              the PHPMailer library folder is in the 'mail' folder under public_html, that is 'public_html/mail/PHPMailer'
                              BOTH FIRST & LAST FORWARD SLASHES (/) ARE ESSENTIAL */

$full_path = $default_path.$custom_path;

/*===============================================================================================================================================================
==== DO   NOT  EDIT  THIS  PART ================================================================================================== DO   NOT  EDIT  THIS  PART====
==== DO   NOT  EDIT  THIS  PART ================================================================================================== DO   NOT  EDIT  THIS  PART====
==== DO   NOT  EDIT  THIS  PART ================================================================================================== DO   NOT  EDIT  THIS  PART====
================================================================================================================================================================*/

//DO NOT EDIT THESE

  $dir_ph1 = $full_path.'src/Exception.php';
  $dir_ph2 = $full_path.'src/PHPMailer.php';
  $dir_ph3 = $full_path.'src/SMTP.php';


  use PHPMailer\PHPMailer\PHPMailer;

  require("$dir_ph1");
  require("$dir_ph2");
  require("$dir_ph3");



//This is the mailing account setup portion

      $mail = new PHPMailer; //$mail->SMTPDebug = 3;      // Enable verbose debug output
      $mail->isSMTP();     // Set mailer to use SMTP
      $mail->Host = $host_address;
      $mail->SMTPAuth = true;   // Enable SMTP authentication
      $mail->Username = $acc_username;
      $mail->Password = $acc_password;
      $mail->SMTPSecure = 'ssl';        // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465;      // TCP port to connect to or 25 for non secure
      $mail->SMTPDebug = 4;
      $mail->setFrom($acc_username, $acc_name);
      $mail->addAddress($email, $first);   //The recipient, these variables will be set by you in YOUR own script after collecting the POST data
      $mail->isHTML(true);            // Set email format to HTML
      $mail->Subject = $mail_subject;
      $mail->Body    = $body_html; //EDIT THIS WITH YOUR CUSTOM HTML AND CSS
      $mail->AltBody = $body_no_html; //FOR DEVICES WITHOUT HTML SUPPORT


      //PASTE $mail->send(); IN YOUR MAIN SCRIPT AFTER ALL VARIABLES HAVE BEEN DEFINED AND THIS SCRIPT HAS BEEN INCLUDED
?>