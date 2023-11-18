<?php
    include("../connection.php");
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json;charset=UTF-8');
    if($con)
    {
        $id="";
        if(isset($_GET['id']))
        {
            $id=$_GET["id"];
        }
        if($id!="")
        {
            $query="DELETE FROM `notes` WHERE `id`='$id'";
            $res=mysqli_query($con,$query);
            if($res)
            {
                $response=(object)array();
                $response->status='deleted';
                http_response_code(200);
                echo json_encode( $response,JSON_PRETTY_PRINT);
            }
            else
            {
                $response=(object)array();
                $response->status='failed';
                http_response_code(404);
                echo json_encode( $response,JSON_PRETTY_PRINT);
            }
        }
    }
    // Ex http://localhost/Keeper/api/v0.1/deleteNote/?id=1
?>
