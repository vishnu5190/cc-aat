<!-- update.php -->

<?php
$connect = mysqli_connect(
    'db', # service name
    'php_docker', # username
    'password', # password
    'php_docker' # db table
);

$table_name = "php_docker_table";

// Handle ID parameter
if (isset($_GET['id'])) {
    $article_id = mysqli_real_escape_string($connect, $_GET['id']);

    $select_query = "SELECT * FROM $table_name WHERE id = $article_id";
    $select_result = mysqli_query($connect, $select_query);

    if ($select_result) {
        $article_data = mysqli_fetch_assoc($select_result);
    } else {
        echo "Error fetching article data: " . mysqli_error($connect);
        exit;
    }
} else {
    echo "Article updated check the database.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Article - PHP Docker Articles</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

    <header>
        <h1>Update Article</h1>
    </header>

    <h2>Article ID: <?php echo $article_data['id']; ?></h2>
    <form method="post" action="update.php">
        <label for="new_title">New Title:</label>
        <input type="text" name="new_title" value="<?php echo $article_data['title']; ?>" required>

        <label for="new_body">New Body:</label>
        <textarea name="new_body" rows="4" required><?php echo $article_data['body']; ?></textarea>

        <input type="hidden" name="article_id" value="<?php echo $article_data['id']; ?>">
        <input type="submit" value="Update Article">
    </form>

</body>

</html>
