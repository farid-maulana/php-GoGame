<nav class="navbar navbar-expand-lg navbar-dark bg-dark">    
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" href="index.php">GoGame</a>
            </li>
            <!-- view before user logged in -->
            <?php
            if (isset($_SESSION['username'])) {
            ?>
                <!-- start here -->
                <li class="nav-item">
                    <a class="nav-link" href="./postGame.php">Post Game</a>
                </li>
                <!-- end here -->
            <?php
            }
            ?>
        </ul>
        <ul class="navbar-nav">
            <!-- view after user logged in -->
            <?php
            if (isset($_SESSION['username'])) {
            ?>
                <!-- start here -->
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php">Log out</a>
                </li>
                <!-- end here -->
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="./login.php">Login</a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>
