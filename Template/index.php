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

<body class="bg-secondary">
    <?php
        session_start();
        include 'config.php';
        include 'navbar.php'; 
    ?>
    <main class="d-flex p-4 py-md-0">
        <div class="container-fluid mt-4">
            <div class="row justify-content-start">
                <!-- show all data from database -->
                <?php
                $sql = mysqli_query($connect, "SELECT * FROM game");
                while ($game = mysqli_fetch_array($sql)) {
                ?>
                    <!-- start here -->
                    <div class="d-flex flex-column" style="width:100%;">
                        <div class="d-inline-flex flex-row mb-4 bg-white rounded p-4 shadow-sm">
                            <!-- Show image here -->
                            <img src="assets/<?php echo $game['image'] ?>" class="rounded border" alt="" height="128" width="128"
                                style="object-fit : contain;">
                            <div class="media-body d-flex justify-content-center flex-column ml-4 mr-4">
                                <h3><?php echo $game['name']; ?></h3>
                                <h5 class="">Difficulty :
                                    <?php
                                    if ($game['difficulty'] == 'Easy')
                                    {
                                        echo '<span class="badge badge-pill badge-success">Easy</span>';
                                    }
                                    else if ($game['difficulty'] == 'Moderate')
                                    {
                                        echo '<span class="badge badge-pill badge-warning">Moderate</span>';
                                    }
                                    else
                                    {
                                        echo '<span class="badge badge-pill badge-danger">Hard</span>';
                                    }
                                    ?>
                                </h5>
                                <p><?php echo $game['description']; ?></p>
                            </div>
                            <!-- Validate if user already logged in or not, if user is logged in, user can delete the data -->
                            <?php
                            if (isset($_SESSION['username'])) {
                            ?>
                                <div class="d-flex justify-content-center align-items-center">
                                    <!-- Delete game using ID here -->
                                    <a class="rounded bg-danger p-2" href="delete.php?id=<?php echo $game['id']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="height: 32px; width: 32px;" fill="none"
                                            viewBox="0 0 24 24" stroke="#ffffff">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- show all data from database ends here -->
                    </div>
                <?php
                }
                ?>
            </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>