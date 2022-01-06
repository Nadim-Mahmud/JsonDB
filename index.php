<?php
$db = '';

if (file_exists('db.json')) {
    $json = file_get_contents('db.json');
    $db = json_decode($json, true);
} else {
    $db = array();
}

?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Shelf</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <?php include 'navbar.html';?>

  
    <!-- <h1 class="title">Book Shelf</h1> -->


    <!-- <div class="container search-pr">
        <div class="row">
            <div class="col-sm-10">
                <form action="search.php" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="search" placeholder="Search anything">
                        <input type="submit" class="btn btn-primary" type="button" value="Search"></input>
                    </div>
                </form>
            </div>
            <div class="col-sm-2">
                <a class="add-entry" href="<?php //echo 'create.php' ?>">
                    <button class="btn btn-success">Add Entry</button>
                </a>
            </div>
        </div>
    </div> -->
    <div class="table-container">
        <table class="table-main table table-striped table-sm">
            <thead class="table-head">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Title</th>
                    <th scope="col" class="text-center">Author</th>
                    <th scope="col" class="text-center">Available</th>
                    <th scope="col" class="text-center">ISBN</th>
                    <th scope="col" class="text-center">Pages</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="">
                <?php foreach ($db as $key => $obj) : ?>

                    <tr class="">

                        <th scope="row" class="text-center"><?php echo $key; ?></th>
                        <td class="text-center"> <?php echo $obj['title']; ?> </td>
                        <td class="text-center"><?php echo $obj['author']; ?></td>
                        <td class="text-center"><?php echo $obj['available'] ? 'YES' : 'NO'; ?></td>
                        <td class="text-center"><?php echo $obj['isbn']; ?></td>
                        <td class="text-center"><?php echo $obj['pages']; ?></td>
                        <td class="text-center">
                            <a href="<?php echo 'delete.php?' . 'id=' . $key; ?>" onclick="return confirm('Are you sure?')">
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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