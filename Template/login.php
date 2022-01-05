<!-- start session here -->
<!-- validate if user is logged in or not -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GoGame</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/login_bs.css">
</head>
<body>
    <?php 
    
        include 'navbar.php'; 
        include 'config.php';
        session_start();
        
        if (isset($_SESSION['username'])) {
            header("location: index.php");
        }

        if (isset($_POST['login'])) {
            unset($_SESSION["error"]);
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            if ($username == '' && $password == '') {
                $_SESSION['error'] = "username and password cannot be empty";
            } else if ($username == '') {
                $_SESSION['error'] = "username cannot be empty";
            } else if ($password == '') {
                $_SESSION['error'] = "password cannot be empty";
            }
         
            $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
            $result = mysqli_query($connect, $sql);
            if ($result->num_rows > 0) {
                session_start();
                $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $row['username'];
                header("location: index.php");
            } else {
                // $_SESSION['error'] = "You have entered your username or password incorrectly";
                header("location: login.php");
            }
        }
    ?>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0" style="margin-top:-8vh;">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="assets/Game.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h4 class="card-title font-weight-bolder">
                                GoGame
                            </h4>
                            <p class="login-card-description">Sign into your account</p>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                </div>
                                <div class="error-message">
                                <!-- show error here -->
                                    <?php
                                        if (isset($_SESSION['error'])) echo $_SESSION['error'];
                                    ?>
                                </div>
                                <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4" value="Login">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
