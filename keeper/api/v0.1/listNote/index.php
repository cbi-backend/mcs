<?php
    include("../connection.php");
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json;charset=UTF-8');
    if($con)
    {
        $id="";
        $query="SELECT * FROM `notes`";
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $query.=" WHERE id='$id'";
        }
        else 
        {
            $query.=" ORDER BY `title`";
        }
        if($res=mysqli_query($con,$query))
        {
            $ouput=[];
            while($row=mysqli_fetch_array($res))
            {
                $row_data=(object)array();
                $row_data->title=$row[1];
                $row_data->description=$row[2];
                $row_data->addedDate=$row[3];
                array_push($ouput,$row_data);
            }
            $out=(object)array();
            $out->result=$ouput;
            http_response_code(200);
            echo  json_encode($out);
        }
    }
    // http://localhost/Keeper/api/v0.1/listNode/
    // http://localhost/Keeper/api/v0.1/listNode/?id=1
?>
