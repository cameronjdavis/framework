<?php

include_once(__DIR__ . '/../vendor/autoload.php');

ob_start();
(new NetCamerond\Framework\Executor(
    include __DIR__ . '/../services.php',
    include __DIR__ . '/../config.php',
    include __DIR__ . '/../web.php',
))->execute(substr($_SERVER["PATH_INFO"] ?? '', 1));
$output = ob_get_clean();

?><!DOCTYPE HTML>
<html lang="en">
    <head>
    </head>
    <body>
        <?php echo $output; ?>
    </body>
</html>
