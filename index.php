<?php

        $email;$comment;$captcha;
        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }if(isset($_POST['password'])){
          $email=$_POST['password'];
        }if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
       // $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcLSw8UAAAAAMb3GyLfvs7NZKUEv2wP_Uy2QV1y&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);  // Local
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcPmxEUAAAAAL0Bf6nt28fwOT-jzY9fCN91JjfM&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);  // Production
        if($response.success==false)
        {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        }else
        {
          echo '<h2>Thanks for posting comment.</h2>';
        }
?>
