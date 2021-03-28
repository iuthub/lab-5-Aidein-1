<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Output</title>
    <link rel="stylesheet" href="buyagrade.css">
</head>
<body>
    <?php
        $isempty = false;
        if (!isset($_REQUEST["name"]))
            $isempty = true;
        else if (!isset($_REQUEST["section"]))
            $isempty = true;
        else if (!isset($_REQUEST["cardNum"]))
            $isempty = true;
        else if (!isset($_REQUEST["cardType"]))
            $isempty = true;
        if (!$isempty) {
    ?>
    <div class="name-header">
        <h1>Thanks, sucker!</h1>
    </div>
    <hr>
    <br>
    Your information has been recorded.
    <br>
    <dl>
        <dt>Name</dt>
        <dd><?= $_REQUEST["name"] ?></dd>
        <dt>Section</dt>
        <dd><?= $_REQUEST["section"] ?></dd>
        <dt>Credit Card</dt>
        <dd><?= $_REQUEST["cardNum"] ?> (<?= $_REQUEST["cardType"] ?>)</dd>
        <?php file_put_contents("suckers.txt",
            $_REQUEST["name"] . ";" .
            $_REQUEST["section"] . ";" . $_REQUEST["cardNum"] . ";" . $_REQUEST["cardType"] . "\n", FILE_APPEND) ?>
        Here all the suckers who have submitted here:
        <pre>
        <?php
            $temp = file_get_contents("suckers.txt");
            printf($temp);
        ?>
        </pre>
    </dl>
    <?php } else { ?>
        <h1>Sorry</h1>
        You didn't fill out the form completely. <a href="buyagrade.html">Try again?</a>
    <?php } ?>
</body>
</html>
