<?php

    $db = '';

    if(file_exists('db.json')){
        $json = file_get_contents('db.json');
        $db = json_decode($json, true);
    }
    else{
        $db = array();
    }

    
    $key1 = '';
    $data = '';
    $entries = array();

    if(isset($_POST['search'])){
        $key1 = $_POST['search'];
        //$data = $db[(int)$key1];

        //array_push($entries, $data);

       // var_dump($data);
       
       foreach ($db as $key => $obj):
            if ($obj['author'] == $key1){
                array_push($entries, $db[$key]);
            }
        endforeach;
    }

?>



<!DOCTYPE html>
    
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Book Store</title>
    </head>

    <body>
        <div>
            <h2>Search Results</h2>
        </div>
        <div>
        <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Availablity</th>
                    <th>ISBN</th>
                    <th>Pages</th>
                </tr>
                <?php foreach ($entries as $key => $obj) : ?>

                    <tr class="obj-row">
                        
                        <td class="obj-item"><?php echo $key; ?></td>
                        <td class="obj-item"> <?php echo $obj['title']; ?> </td>
                        <td class="obj-item"><?php echo $obj['author']; ?></td>
                        <td class="obj-item"><?php echo $obj['available']; ?></td>
                        <td class="obj-item"><?php echo $obj['isbn']; ?></td>
                        <td class="obj-item"><?php echo $obj['pages']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>