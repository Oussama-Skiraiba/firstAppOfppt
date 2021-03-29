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
    <link rel="stylesheet" href="css/qr.css">
    <title>Document</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <div class="qrScan">
        <h2> Qr Scan</h2>
        <div class="video">
            <video id="qrV"></video>
            <!-- <input type="text" disabled> -->

        </div>
    </div>
    <?php
    include "menu.php";
    ?>
</body>
<script src="./js/sweetalert.js"></script>
<script src="js/toggle.js"></script>

<script type="module">
    import QrScanner from './qrLib/qr-scanner.min.js';
    QrScanner.WORKER_PATH = './qrLib/qr-scanner-worker.min.js';
    // do something with QrScanner
    let qrVideo = document.querySelector("#qrV");
    let id;
    const qrScan = new QrScanner(qrVideo, (result) => {
        id = result;
        let fd = new FormData();
        fd.set('id', id);
        fetch("http://localhost/proge/checkItem/qrId.php", {
                method: "POST",
                body: fd
            }).then(res => res.json())
            .then(data => {
                let midicain = data.response[0];
                if (midicain == undefined) {
                    qrScan.stop();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'medicine not found',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => qrScan.start());
                } else {
                    qrScan.stop();
                    let html = `<label>Name :</label> <input type="text" value="${midicain._name}" disabled><br>
                            <label>Price :</label> <input type="text" value="${midicain._price}" disabled><br>
                            <label>Quantity :</label> <input type="text" value="${midicain._quantity}" disabled><br>
                            <img width="100" src="http://localhost/proge/upload/img/${midicain._img_url}" alt="">`;
                    swite(html, midicain._id);
                }
            })
    });
    qrScan.start();
    // 
    let swite = (h, id) => {
        Swal.fire({
            title: `<strong>Medicine N° ${id}</strong>`,
            icon: 'success',
            html: h,
            showCloseButton: true,
        })
    }
</script>

</html>