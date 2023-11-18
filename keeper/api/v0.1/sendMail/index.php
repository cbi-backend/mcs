<?php
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json;charset=UTF-8');
    $from="";
    $to="";
    $subject="";
    $body="";
    if(isset($_GET['from']))
    {
        $from=$_GET['from'];
    }
    if(isset($_GET['to']))
    {
        $to=$_GET['to'];
    }
    if(isset($_GET['subject']))
    {
        $subject=$_GET['subject'];
    }
    if(isset($_GET['body']))
    {
        $body=$_GET['body'];
    }
    if($from!="" && $to!="" && $subject!="" && $body!="")
    {
        //$to_email = "manimaran7470@gmail.com";
        //$subject = "Simple Email Test via PHP";
        //$body = "Hi, This is test email send by PHP Script";
        $headers = "From: $from";

        if (mail($to, $subject, $body, $headers)) {
            $response=(object)array();
            $response->status='Email successfully sent';
            http_response_code(200);
            echo json_encode( $response,JSON_PRETTY_PRINT);
        } else {
            $response=(object)array();
            $response->status='Email sending failed';
            http_response_code(404);
            echo json_encode( $response,JSON_PRETTY_PRINT);
        }
    }
    //  http://localhost/Keeper/api/v0.1/sendMail/?from=manimaranbhuwaneshwaran@gmail.com&to=abhisheckrajavpy@gmail.com&subject=Happy new year&body=need leads innovation,innovation needs creativity,all are contributes in finding solution, lets join with us to find a solution 
?>