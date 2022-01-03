<?php
    $db = '';

    if(file_exists('db.json')){
        $json = file_get_contents('db.json');
        $db = json_decode($json, true);
    }
    else{
        $db = array();
    }


    $key = $_GET['id'];

    array_splice($db, $key, 1);


    $db_enc = json_encode($db);
    file_put_contents('db.json', $db_enc);

    header('Location: index.php');
?>

Sucessfuly deleted!!!