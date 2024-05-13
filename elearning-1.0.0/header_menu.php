<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img src="img/TDT_logo.png" alt="tdt logo">
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link active">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="resources.php" class="nav-item nav-link">Resources</a>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
            <?php
            if (isset($_SESSION['email'])) {
            ?>
                <a href="admin.php" class="nav-item nav-link">Admin</a>


            <?php
            }
            ?>

            <?php
            if (isset($_SESSION['email'])) {
            ?>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a href="logout_script.php" class="nav-link"><i class="fa fa-sign-out"></i>Logout</a></li>
                    <li class="nav-item"><a class="nav-link " data-placement="bottom" data-toggle="popover" data-trigger="hover" data-content="<?php echo $_SESSION['email'] ?>"><i class="fa fa-user-circle "></i></a></li>
                </ul>
            <?php
            } else {
            ?>
                <a href="login.html" class="nav-item nav-link">Login</a>
            <?php
            }
            ?>

        </div>

    </div>
</nav>
<!-- Navbar End -->