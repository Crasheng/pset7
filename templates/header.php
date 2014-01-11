<!DOCTYPE html>

<html>

    <head>

        <link href="../public/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../public/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../public/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>

        <script src="../public/js/jquery-1.10.2.min.js"></script>
        <script src="../public/js/bootstrap.min.js"></script>
        <script src="../public/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <a href="/public/index.php"><img alt="C$50 Finance" src="../public/img/logo.gif"/></a>
            </div>

            <div id="middle">
                <ul class="nav nav-pills">
                    <li><a href="looking_up.php">Look up</a></li>
                    <li><a href="buy.php">Buy</a></li>
                    <li><a href="sell.php">Sell</a></li>
                    <li><a href="history.php">History</a></li>
                    <li><a href="logout.php"><b>Log out</b></a></li>
                </ul>


