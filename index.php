<?php

$db_host = "xxxxx";
$db_name = "xxxxx";
$db_user = "xxxx";
$db_pass = "xxxxxxxxx";

$conn = mysqli_connect($db_host,$db_user,$db_pass, $db_name);

if(mysqli_connect_error()){
    echo mysqli_connect_error();
    exit;
}

$sql = "SELECT *
         FROM article
         ORDER BY published_at;";

$results = mysqli_query($conn, $sql);

if($results === false) {
    echo mysqli_error($conn);
} else {
    $articles = mysqli_fetch_all($results, MYSQLI_ASSOC)

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anne's Blog</title>
</head>
<body>
    <header>
        <h1>Anne's Blog</h1>
    </header>   
    <main>
        <ul>
            <?php foreach ($articles as $article): ?>
                <article>
                    <h2><?= $article['title']; ?></h2>
                    <p><?= $article['content']; ?></p>
                </article>    
            <?php endforeach; ?>
       </ul>
   </main>

</body>
</html>
