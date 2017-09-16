<?php
mail()

sendmail_from =$_POST['owneremail'] ;
{
 $to = "janeshbehera17@gmail.com";
 $subject = "Repair";
 $body = $_POST['description'];
 if (mail($to, $subject, $body)) {
   echo("<p>Email successfully sent!</p>");
  } else {
   echo("<p>Email delivery failed…</p>");
  }
  }
 ?>