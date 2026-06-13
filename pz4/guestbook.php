<?php

session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
            isset($_POST['email']) &&
            isset($_POST['name']) &&
            isset($_POST['text'])
    ) {
        $email = trim($_POST['email']);
        $name = trim($_POST['name']);
        $text = trim($_POST['text']);

        if (!empty($email) && !empty($name) && !empty($text)) {
            $date = date('Y-m-d H:i:s');

            $query = "INSERT INTO comments (email, name, text) 
                      VALUES ('$email', '$name', '$text')";

            mysqli_query($connection, $query);
        }
    }
}

$query = "SELECT * FROM comments ORDER BY id DESC";
$result = mysqli_query($connection, $query);
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>

<?php require_once 'sectionHead.php' ?>

<body>

<div class="container">

    <?php require_once 'sectionNavbar.php' ?>

    <br>

    <div class="card card-primary">
        <div class="card-header bg-primary text-light">
            GuestBook form
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">

                    <form method="POST">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Comment</label>
                            <textarea name="text" class="form-control"></textarea>
                        </div>

                        <button class="btn btn-primary">
                            Send
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="card card-primary">
        <div class="card-header bg-body-secondary text-dark">
            Comments
        </div>

        <div class="card-body">
            <?php foreach ($comments as $comment): ?>
                <div class="mb-3">
                    <strong><?php echo $comment['name']; ?></strong><br>
                    <small><?php echo $comment['email']; ?></small><br>
                    <?php echo $comment['text']; ?>
                    <hr>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

</body>
</html>