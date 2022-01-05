<?php 
    session_start();
    include 'config.php';

    if (!isset($_SESSION['username'])) {
        header("location: login.php");
    }

    if (isset($_POST['submit']))
    {
        $name = $_POST['title'];
        $description = $_POST['description'];
        $difficulty = $_POST['game_option'];

        if ($name == "" || $name == null) {
            $_SESSION["error"] = "Title should not be empty";
        }

        $ekstensi =  array('png','jpg','jpeg');
        $filename = $_FILES['input_file']['name'];
        $ukuran = $_FILES['input_file']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if(!in_array($ext, $ekstensi)) {
            $_SESSION["error"] = "File Extension Must be 'jpg' or 'png' or 'jpeg'!";
            header("location:postGame.php");
        } else {
            if($ukuran < 2044070){		
                move_uploaded_file($_FILES['input_file']['tmp_name'], 'assets/'.$filename);
                $sql = "INSERT INTO game(name, description, image, difficulty) VALUES ('$name', '$description', '$file', '$difficulty')";
                mysqli_query($connect, $sql);
                header("location:index.php");
            }else{
                $_SESSION["error"] = "Image Size Must Not be More Than 2MB !";
                header("location:postGame.php");
            }
        }
    }
?>
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
    <link rel="stylesheet" href="/css/post_game.css">
</head>

<body class="bg-secondary">
    <?php 
        include 'navbar.php'; 
    ?>
    <main class="d-flex align-items-center min-vh-100 py-3">
        <div class="container d-flex justify-content-center">
            <div class="d-flex flex-column justify-content-between">
                <div class="card two bg-white px-5 py-4 mb-3">
                    <form action="" method="POST" enctype="multipart/form-data" style="padding-top: 15px;">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title">
                            <label class="form-control-placeholder" for="title">Title</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="description" name="description"
                                autocomplete="off">
                            <label class="form-control-placeholder" for="description">Description</label>
                            <div style="text-align: right; font-size: 70%">
                                <label id="word-counter"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-for-difficulty" for="difficulty">Difficulty</label>
                            <input type="radio" name="game_option" id="difficulty_easy" value="Easy"
                                style="margin-left: 10px;">
                            <label for="difficulty_easy" style="padding-right: 20px;">Easy</label>
                            <input type="radio" name="game_option" id="difficulty_moderate" value="Moderate">
                            <label for="difficulty_moderate" style="padding-right: 20px;">Moderate</label>
                            <input type="radio" name="game_option" id="difficulty_intermediate" value="Intermediate">
                            <label for="difficulty_intermediate">Intermediate</label>

                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                        name="input_file">
                                    <label class="custom-file-label" for="inputGroupFile01"
                                        style="margin-top: -20px">Choose Image</label>
                                </div>
                            </div>
                        </div>
                        <div class="error-message">
                            <!-- show error here -->
                            <?php if(isset($_SESSION["error"]))echo $_SESSION["error"]; ?>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg mt-1 mb-2" name="submit" type="submit">
                            <span>Post Game<i class="fas fa-long-arrow-alt-right ml-2"></i></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="./js/post.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>