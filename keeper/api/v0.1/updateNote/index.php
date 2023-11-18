<?php
    include("../connection.php");
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json;charset=UTF-8');
    if($con)
    {
        $title="";
        $description="";
        $id="";
        if(isset($_GET['title']))
        {
            $title=$_GET["title"];
        }
        if(isset($_GET['description']))
        {
            $description=$_GET["description"];
        }
        if(isset($_GET['id']))
        {
            $id=$_GET["id"];
        }
        if($title!="" && $description!="" && $id!="")
        {
            $query="UPDATE `notes` SET `title`='$title',`description`='$description',`added_date`='$dateTime' WHERE `id`='$id'";
            $res=mysqli_query($con,$query);
            $res=mysqli_query($con,$query);
            if($res)
            {
                $response=(object)array();
                $response->status='updated';
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
    // Ex http://localhost/Keeper/api/v0.1/updateNote/?id=1&title=new%20year%202021&description=learn%20python,%20datastructures%20and%20react
?>
