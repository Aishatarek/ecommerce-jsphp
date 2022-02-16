<?php
include('../functions.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $user_id = $_SESSION['user_id'];
        $post_id = $_POST['post_id'];
        $description = "'" . $_POST['description'] . "'";
        $Comment->addComment($user_id, $post_id, $description);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="../../index.css">
    <title>Document</title>
</head>

<body>
    <?php
    include('../headerr.php');
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            include('../sidenavv.php');
            ?>
            <div class="col-lg-10 col-md-9 col-sm-12 container-fluid">
                <div class="theform2">
                    <div>
                        <img src="../../images/pexels-mister-mister-380782.jpg" alt="">
                    </div>
                    <form action="" method="POST" class="login-email">
                        <p class="login-text"> Add Comment</p>
                        <select name="post_id">
                            <?php foreach ($Post->getData() as $postt) { ?>

                                <option value="<?php echo $postt['id'] ?>"> <?php echo $postt['title'] ?> </option>
                            <?php } ?>
                        </select>

                        <textarea name="description" rows="2" placeholder="Comment"></textarea>
                        <div class="input-group">
                            <button name="submit" class="btn">add Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
include('../../footer.php');
?>