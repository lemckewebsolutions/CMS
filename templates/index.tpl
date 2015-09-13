<?php
/**
 * @var string $head
 * @var string $footer
 * @var string $notifications
 * @var string $sideBar
 */
echo $head;
?>
<div class="container-fluid">
    <div class="row">
        <?php echo $sideBar?>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">CMS overzicht</h1>
        <?php echo $notifications?>
    </div>
</div>
<?php
echo $footer;