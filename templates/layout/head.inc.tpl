<?php
/**
 * @var string[] $cssFiles
 * @var string $cssLocation
 * @var string $header
 * @var string $websiteName
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $websiteName?> - Adminpanel</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo $cssLocation?>bootstrap.min.css" rel="stylesheet">
<?php
if (count($cssFiles) > 0) {
    foreach ($cssFiles as $cssFile) {
?>
    <link href="<?php echo $cssLocation . $cssFile?>" rel="stylesheet">
<?php
    }
}
?>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>
    <?php echo $header?>