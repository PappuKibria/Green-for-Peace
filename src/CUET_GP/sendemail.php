<?php
   

    session_cache_limiter( 'nocache' );
    header( 'Expires: ' . gmdate( 'r', 0 ) );
    header( 'Content-type: application/json' );
    use App\Utility\Utility;


    $to         = 'greenforpeace.cuet@gmail.com';  // put your email here

    $email_template = 'simple.html';

    $subject    = strip_tags($_POST['subject']);
    $email       = strip_tags($_POST['email']);
    //$phone      = strip_tags($_POST['phone']);
    $name       = strip_tags($_POST['name']);
    $message    = nl2br( htmlspecialchars($_POST['message'], ENT_QUOTES) );
    $result     = array();


    if(empty($name)){

        $result = array( 'Error! Name is empty.' );
        echo json_encode($result );
        die;
        Utility::redirect('contact.php');
    } 

    if(empty($email)){

        $result = array( 'Error! Email is empty.' );
        echo json_encode($result );
        die;
        Utility::redirect('contact.php');
    } 

    if(empty($message)){

         $result = array( 'Error! Message body is empty.' );
         echo json_encode($result );
         die;
        Utility::redirect('contact.php');
    }
    


    $headers  = "From: " . $name . ' <' . $email . '>' . "\r\n";
    $headers .= "Reply-To: ". $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


    $templateTags =  array(
        '{{subject}}' => $subject,
        '{{email}}'=>$email,
        '{{message}}'=>$message,
        '{{name}}'=>$name,
        //'{{phone}}'=>$phone
        );


    $templateContents = file_get_contents( dirname(__FILE__) . '/email-templates/'.$email_template);

    $contents =  strtr($templateContents, $templateTags);

    if ( mail( $to, $subject, $contents, $headers ) ) {
        $result = array( 'Thank You! Your email has been delivered.' );
        Utility::redirect('contact.php');
    } else {
        $result = array( 'Error! Cann\'t Send Mail.'  );
        Utility::redirect('contact.php');
    }

    echo json_encode( $result );

    die;