<?php
session_start();
if (empty($_SESSION["name"])) {
    header('Location:http://localhost/proge/test.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/AddItem.css">
    <link rel="stylesheet" href="css/update.css">
    <link rel="icon" href="icon/caduceus-symbol.png" sizes="32*32">
    <!--  -->
    <title>Document</title>
</head>

<body>

<?php
    include_once "inc/session.php";
    include "header.php"; 
 ?>
    <div class="AddItemGlobale">

        <h2>Update Item</h2>
        <hr>

        <div class="globale">
            <div class="addItems">
                <div class="additem">
                    <span> Name </span><input type="text" id="name" placeholder="Change Name">
                </div>
                <div class="additem">
                    <span> Quantity </span><input type="text" id="quantity">
                </div>
                <div class="additem">
                    <span>Prix </span><input type="text" id="prix" placeholder="Change Price">
                </div>

                <div class="additem">
                    <span>Data time</span> <input type="date" id="dataTime">
                </div>

                <div class="additem">
                    <span>Date Fin </span><input type="date" id="dateFin">
                </div>
            </div>

            <!--  -->

            <div class="uploadPic">
                <div class="upload">
                    <span>Description</span>
                    <textarea id="Description" placeholder="Change Description"></textarea>
                </div>
                <div class="upload">
                    <div class="uploadImage" id="images">
                        <div class="img-h3">
                            <h3>upload images</h3>
                            <img src="icon/upload.png" alt="" name='img'>
                        </div>
                        <input type="file" placeholder="upload images" id="uploadImage" style="display: none;">
                        <img src="" alt="" id="showImge">

                        <!--  
                            <img src="icon/upload.png" alt="" name='img'>
                        -->
                    </div>
                </div>
                <button class="send" id="send">Save</button>
            </div>

        </div>


    </div>

    <?php include "menu.php"; ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/include.js"></script>
    <script src="js/toggle.js"></script>
    <script src="js/updateItem.js"></script>

</body>

</html>