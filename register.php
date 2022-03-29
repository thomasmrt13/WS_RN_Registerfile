<?php
    /* Connection au server */

    $co=mysqli_connect("localhost", "root", "");
    $db=mysqli_select_db($co, "<DATABASE_NAME>");

    /* Itercept les requetes post */

    $content = file_get_contents('php://input');
    $decode = json_decode($content, true);

    /* Assigner les valeurs de la requête aux variables */

    $user_email = $decode['Email'];
    $user_password = $decode['Password'];

    /* Requête sql pour inserer un nouvel utilisateur dans la table */

    $query = "insert into <TABLE_NAME>(Email, Password) values('$user_email', '$user_password')";

    /* Récuprer les  infos de la requête*/
    
    $request = mysqli_query($co, $query);
    
    if ($request)
    {
        $Message = "User registered";
    }
    else
    {
        $Message = "Server Error";
    }
    $response[] = array("Message"=>$Message);
    echo json_encode($response);
?>
