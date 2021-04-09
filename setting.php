<?php include_once "inc/session.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/setting.css">
    <link rel="icon" href="icon/caduceus-symbol.png" sizes="32*32">
    <title>Document</title>
</head>
<body>
<?php include"header.php";?>

    <div class="sittinges-uploade">
        <h2>sittinges</h2>
        <hr>
        <div class="uploade" id="showFile">
            <h3>Uploage</h3>
            <input type="file" name="img" id="uploade">
            <img id="showImg" src="" alt="">
        </div>
        <div class="name">
            <button class="send" id="send">Send</button>
        </div>

    </div>


<?php include"menu.php";?>
</body>
<script src="js/toggle.js"></script>
    <script src="js/setting.js"></script>
</html>