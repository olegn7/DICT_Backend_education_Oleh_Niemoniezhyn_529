<?php

$search = '';
$items = [];

if (isset($_GET['search'])) {
    $search = trim($_GET['search']);

    if ($search !== '') {
        $items = [
            [
                'title' => 'PHP Official Website',
                'link' => 'https://www.php.net/'
            ],
            [
                'title' => 'PHP Documentation',
                'link' => 'https://www.php.net/docs.php'
            ],
            [
                'title' => 'PHP Tutorial',
                'link' => 'https://www.w3schools.com/php/'
            ]
        ];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PZ2 Search Service</title>
</head>
<body>

<h2>My Browser</h2>

<form method="GET" action="">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search"
           value="<?php echo htmlspecialchars($search); ?>">
    <br><br>
    <input type="submit" value="Submit">
</form>

<?php if (!empty($items)): ?>

    <h3>Search results:</h3>

    <?php foreach ($items as $item): ?>

        <p>
            <a href="<?php echo $item['link']; ?>" target="_blank">
                <?php echo $item['title']; ?>
            </a>
        </p>

    <?php endforeach; ?>

<?php endif; ?>

</body>
</html>