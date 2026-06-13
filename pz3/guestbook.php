<?php

session_start();

$fileName = 'comments.csv';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (
            isset($_POST['email']) &&
            isset($_POST['name']) &&
            isset($_POST['text'])
    ) {

        $email = trim($_POST['email']);
        $name = trim($_POST['name']);
        $text = trim($_POST['text']);

        if (
                !empty($email) &&
                !empty($name) &&
                !empty($text)
        ) {

            $comment = [
                    'email' => $email,
                    'name' => $name,
                    'text' => $text,
                    'date' => date('Y-m-d H:i:s')
            ];

            $jsonString = json_encode($comment);

            $fileStream = fopen($fileName, 'a');

            fwrite($fileStream, $jsonString . "\n");

            fclose($fileStream);
        }
    }
}

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
                            <input type="email"
                                   name="email"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Comment</label>
                            <textarea name="text"
                                      class="form-control"></textarea>
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

            <?php

            if (file_exists($fileName)) {

                $fileStream = fopen($fileName, "r");

                while (!feof($fileStream)) {

                    $jsonString = fgets($fileStream);

                    $comment = json_decode($jsonString, true);

                    if (empty($comment)) {
                        continue;
                    }

                    echo "<div class='mb-3'>";
                    echo "<strong>" . $comment['name'] . "</strong><br>";
                    echo "<small>" . $comment['email'] . "</small><br>";
                    echo $comment['text'] . "<br>";
                    echo "<small>" . $comment['date'] . "</small>";
                    echo "<hr>";
                    echo "</div>";
                }

                fclose($fileStream);
            }

            ?>

        </div>

    </div>

</div>

</body>
</html>