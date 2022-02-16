<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="index.css">
  <title>Document</title>
</head>

<body>
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
          <a class="nav-link" href="index.php">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">Shop</a>
        </li>
        <?php
        if (isset($_SESSION['role'])) {
          if ($_SESSION['role'] == 'admin') { ?>
            <li class="nav-item">
              <a class="nav-link" href="dashboard/dashboard.php">Dashboard</a>
            </li>
        <?php  }
        }
        ?>
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
              echo ' <a class="dropdown-item" href="logout.php">Logout</a>';
            } else {
              echo '
                    <a class="dropdown-item" href="signin.php">Sign in</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="register.php">Register</a>
                    ';
            }
            ?>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.php">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="displayCart.php">Cart(
            <?php
            echo  count($Cart->getData('cart'))
            ?>
            )</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="wishlist.php">WishList(
            <?php
            echo count($Cart->getData('wishlist'))
            ?>
            )</a>
        </li>


      </ul>

    </div>
  </nav>