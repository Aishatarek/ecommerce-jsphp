
    <!--header-->
    <header>
        <p>Lansing, Delta Township 6334 W. Saginaw, Suite D</p>
        <h5>+1 800 123 4567</h5>
    </header>
    <!--NavBar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../contact.php">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
            </ul>

            <h5 class="logo">
                Reprizo
            </h5>
            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username'] ?? 'Account'; ?>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            echo ' <a class="dropdown-item" href="../logout.php">Logout</a>';
                        } else {
                            echo '
                    <a class="dropdown-item" href="../signin.php">Sign in</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../register.php">Register</a>
                    ';
                        }
                        ?>


                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../displayCart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../wishlist.php">WishList</a>
                </li>

            </ul>

        </div>
    </nav>