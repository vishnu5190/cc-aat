<!-- index.php -->

<?php
$connect = mysqli_connect(
    'db', # service name
    'php_docker', # username
    'password', # password
    'php_docker' # db table
);

$table_name = "php_docker_table";

$query = "SELECT * FROM $table_name";

$response = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Docker Articles</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #2c3e50; /* Darker background color */
        margin: 0;
        padding: 0;
        color: #fff; /* Light text color */
    }

    header {
        background-color: #34495e; /* Header background color */
        color: #fff;
        text-align: center;
        padding: 10px;
        margin-bottom: 20px;
    }

    nav {
        background-color: #34495e; /* Navigation background color */
        padding: 10px;
        text-align: center;
    }

    nav a {
        color: #fff;
        text-decoration: none;
        margin: 0 10px;
    }

    .article-container {
        width: 80%;
        margin: 20px auto;
        background-color: #fff; /* Article container background color */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .article {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fafafa;
    }

    .article h2 {
        color: #333;
    }

    .article p {
        color: #666;
    }

    .article img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        margin-top: 10px;
    }

    .related-articles {
        margin-top: 20px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fafafa;
        color: #000; /* Text color for Related Articles sign */
    }

    .related-article {
        margin-bottom: 15px;
    }

    .social-share a,
    .update-article a {
        display: inline-block;
        margin-right: 10px;
        color: #fff;
        background-color: #3498db;
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 4px;
    }

    .update-article a:hover {
        background-color: #2980b9;
    }

    .update-article {
        margin-top: 20px; /* Adjust the top margin as needed */
    }
</style>

</head>

<body>

    <header>
        <h3>CC AAT</h3>
        <h1>Article Page</h1>
    </header>

    <nav>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </nav>

    <div class="article-container">
        <?php
        while ($i = mysqli_fetch_assoc($response)) {
            echo '<div class="article">';
            echo '<h2 style="color: ' . getRandomColor() . ';">' . $i['title'] . '</h2>';
            echo '<p>' . $i['body'] . '</p>';
            echo '<p>Date Created: ' . $i['date_created'] . '</p>';
            echo '<p>Author: ' . $i['author'] . '</p>';
            echo '<p>Category: ' . $i['category'] . '</p>';

            // Social Media Sharing
            echo '<div class="social-share">';
            echo '<a href="https://www.facebook.com/sharer/sharer.php?u=' . urlencode('https://yourwebsite.com/article.php?id=' . $i['id']) . '" target="_blank">Share on Facebook</a>';
            echo '<a href="https://twitter.com/intent/tweet?url=' . urlencode('https://yourwebsite.com/article.php?id=' . $i['id']) . '&text=' . urlencode($i['title']) . '" target="_blank">Share on Twitter</a>';
            echo '</div>';

            // Update Article link
            echo '<div class="update-article"><a href="update.php?id=' . $i['id'] . '">Update Article</a></div>';

            echo '</div>';
            echo '<hr>';

            // Related Articles Section
            $relatedCategory = mysqli_real_escape_string($connect, $i['category']);
            $relatedID = (int) $i['id'];

            $relatedQuery = "SELECT * FROM $table_name WHERE category = '$relatedCategory' AND id != $relatedID ORDER BY date_created DESC LIMIT 3";

            $relatedResponse = mysqli_query($connect, $relatedQuery);

            if ($relatedResponse) {
                echo '<div class="related-articles">';
                echo '<h3>Related Articles</h3>';
                while ($relatedArticle = mysqli_fetch_assoc($relatedResponse)) {
                    echo '<div class="related-article">';
                    echo '<h4>' . $relatedArticle['title'] . '</h4>';
                    echo '<p>' . $relatedArticle['body'] . '</p>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<p>No related articles found.</p>';
            }
        }
        ?>
    </div>

    <?php
    function getRandomColor()
    {
        $colors = ['#3498db', '#2ecc71', '#e74c3c', '#f39c12', '#9b59b6', '#1abc9c'];
        return $colors[array_rand($colors)];
    }
    ?>

</body>

</html>
