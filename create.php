<?php
$db = '';

if (file_exists('db.json')) {
    $json = file_get_contents('db.json');
    $db = json_decode($json, true);
} else {
    $db = array();
}


if (isset($_GET['title'])) {
    $data = array(
        'title' => htmlspecialchars($_GET['title']),
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
    <title>Add New</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body class="create-body">
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
        <input type="submit" value="Create" />
    </form>


    <!-- bootstrap scripts -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>

</html>