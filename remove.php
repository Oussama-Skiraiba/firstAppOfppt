<?php include_once "inc/session.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/remove.css">
    <link rel="icon" href="icon/caduceus-symbol.png" sizes="32*32">
    <title>Document</title>
</head>

<body>
    <?php include "header.php"; ?>

    <div class="remove">
        <h2>remove</h2>
        <hr>
        <div class="content-remove">
            <div class="box-pack">
                <div class="head">
                    <div class="name">
                        Name
                    </div>

                    <div class="des">
                        Quantity
                    </div>

                    <div class="price">
                        Price
                    </div>

                    <div class="icon">
                        Option
                        <!-- <img src="icon/rubbish-bin.png" alt=""> -->
                    </div>

                </div>

                <div class="body" id="body">
                    <!-- <div class="row" id="row">
                        <div class="name">
                            test1
                        </div>

                        <div class="des">
                            test1
                        </div>

                        <div class="price">
                            test2
                        </div>

                        <div class="icon">
                        <img src="icon/trash-bin.png" alt="">
                        </div>
                    </div> -->

                    


                </div>

            </div>
        </div>
    </div>

    <?php include "menu.php"; ?>

</body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/toggle.js"></script>
    <script src="js/remove.js"></script>
</html>