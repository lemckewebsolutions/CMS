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
    <link href="<?php echo $cssLocation?>bootstrap-responsive.css" rel="stylesheet">
<?php
if (count($cssFiles) > 0) {
    foreach ($cssFiles as $cssFile) {
?>
    <link href="<?php echo $cssLocation . $cssFile?>" rel="stylesheet">
<?php
    }
}
?>
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        textarea
        {
            width: 500px;
        }
    </style>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
    <?php echo $header?>