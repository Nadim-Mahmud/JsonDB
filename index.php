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
    <title>Book Store</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>

    <h1 class="title">Book Shelf</h1>

    <div class="search-bar ">
        <form action="search.php" method="post">

            <label style="font-size: large;">Seach by Author : </label>
            <input type="text" class="input-field" name="search" />
            <input type="submit" class="input-field" value="Search" />
        </form>
    </div>

    <div class="create-btn">
        <a href="<?php echo 'http://localhost:8000/' . '/' . 'create.php' ?>">
            <button class="btn btn-success">Add Entry</button>
        </a>
    </div>

    <br>
    <div>
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
                            <a href="<?php echo 'http://localhost:8000/' . '/' . 'delete.php?' . 'id=' . $key; ?>" onclick="return confirm('Are you sure?')">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- bootstrap scripts -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>