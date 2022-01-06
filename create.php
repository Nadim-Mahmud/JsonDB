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
        'available' => $_GET['available'],
        'pages' => $_GET['pages'],
        'isbn' => $_GET['isbn']
    );

    array_push($db, $data);

    $db_enc = json_encode($db);
    file_put_contents('db.json', $db_enc);

    $added = true;

    header('Location: index.php');
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="create-body">

    <?php include 'navbar.html'; ?>

    <h1 class="title-ad mt-3" style="text-align:center; font-family: 'Times New Roman', Times, serif; font-weight: bold; margin-bottom: 30px;"> Enter book informations</h1>

    <!-- Styled -->

    <!-- create new item -->

    <div class="form-container">
        <form action="" method="GET">

            <div class="form-left form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Title" name="title" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for=>Author</label>
                    <input type="text" class="form-control" placeholder="Author" name="author" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Avilability</label>
                    <select class="form-control" name="available" required>
                        <option value="true" Selected>True</option>
                        <option value="false">False</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Pages</label>
                    <input type="number" class="form-control" placeholder="Pages" name="pages" required>
                </div>
                <div class="form-group col-md-6">
                    <label>ISBN</label>
                    <input type="number" class="form-control" placeholder="ISBN" name="isbn" required>
                </div>
            </div>


            <button type="submit" class="form-sub btn btn-success ">Create</button>
        </form>

    </div>


    <!-- bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</body>

</html>