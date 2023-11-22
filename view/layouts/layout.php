<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="resources/css/style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?controller=client">Client</a></li>
            <li><a href="index.php?controller=user&function=index">Nouvel Utilisateur</a></li>
        </ul>
    </nav>
    <div class="container">
        <?php echo $content; ?>
    </div>

</body>

</html>