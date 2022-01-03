<?php
    $db = '';

    if(file_exists('db.json')){
        $json = file_get_contents('db.json');
        $db = json_decode($json, true);
    }
    else{
        $db = array();
    }


    if(isset($_GET['title'])){
        $data = array(
            'title' => htmlspecialchars( $_GET['title']),
            'author' => $_GET['author'],
            'available' => $_GET['available'] === "true",
            'pages' => $_GET['pages'],
            'isbn' => $_GET['isbn']
        );

        array_push($db, $data);

        $db_enc = json_encode($db);
        file_put_contents('db.json', $db_enc);

        header('Location: index.php');
    }

?>
    
<!DOCTYPE html>
    
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>New Book</title>
    </head>

    <body> 
    <form action="" method="get">
        <div>
            <label>Title</label>
            <input type="text" name="title" />
        </div>
        <div>
            <label>Author</label>
            <input type="text" name="author" />
        </div>
        <div>
            <label>Available</label>
            <input type="text" name="available" />
        </div>
        <div>
            <label>Pages</label>
            <input type="text" name="pages" />
        </div>
        <div>
            <label>ISBN</label>
            <input type="text" name="isbn" />
        </div>
        <input type="submit" value="Create"/>
    </form>

        
    </body>
</html>
