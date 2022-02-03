<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css?t=<?=time()?>">
    <script src="public/js/script.js?t=<?=time()?>"></script>
    <title><?=$title?></title>
</head>
<body>
    <div class="wrapper">
        <div>
            <?=$header?>
            <?=$content?>
        </div>
        <?=$footer?>
    </div>
</body>
</html>