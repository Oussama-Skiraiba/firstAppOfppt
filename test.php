<?php

    session_start();

    if(!empty($_SESSION["name"])){
        header('Location:http://localhost/proge/Homme.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="icon/caduceus-symbol.png" sizes="32*32">
    <title>Login</title>
</head>

<body />

<!-- Start Header -->
<header>
    <div class="container">
        <div class="login">
            <h1>Login</h1>
            <form action="/">
                <div class="login-info">
                    <input type="email" placeholder="Email" name="name" autocomplete="off" autofocus id="email">
                    <div class="pass">
                        <input type="password" placeholder="password" autocomplete="off" id="password">
                        <img src="icon/eye.svg" alt="" id="eye">
                    </div>
                    <input type="submit" value="login" id="submit">
                </div>
            </form>
        </div>
    </div>

</header>

<!-- End Header -->


<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // get Dom
    const password = document.querySelector("#password");
    const submit = document.querySelector("#submit");
    const email = document.querySelector("#email");
    const eye = document.querySelector('#eye');

    let messageError = (value, icon) => {
        Swal.fire({
            position: 'center',
            icon: icon,
            title: value,
            showConfirmButton: false,
            timer: 1500
        })
    }

    eye.addEventListener('click', () => {

        let attribute = password.getAttribute('type');

        if (attribute == 'password') {
            password.setAttribute('type', 'text');
            eye.src = "icon/noeye.svg";
        } else {
            password.setAttribute('type', 'password');
            eye.src = "icon/eye.svg";
        }

    });

    submit.addEventListener('click', (e) => {
        e.preventDefault();

        if (password.value.length < 4) {
            messageError('Use 6 or more characters for your password.', 'error');
            return;
        }
        if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/gi.test(email.value)) {
            messageError('your email was incorrect', 'error');
            return;
        }

        let fd = new FormData();
        fd.append('email', email.value);
        fd.append('password', password.value);

        fetch('http://localhost/proge/inc/login.php', {
                method: 'POST',
                body: fd
            })
            .then(response => response.json())
            .then(data => {
                if (data.email == false) {
                    messageError("your email doesn't  belong to an account.", 'error');
                } else {
                    if (data.password == false) {
                        messageError('your password was incorrect', 'error');
                    } else {
                        location.href = 'http://localhost/proge/Homme.php';
                    }
                }

            });
    });
</script>

</body>

</html>