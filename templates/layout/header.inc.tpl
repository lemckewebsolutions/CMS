<?php
/**
 * @var bool $loggedIn
 * @var string $logOutUrl
 * @var string $userName
 * @var string $websiteName
 */
?>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="http://cms.moerkerkentweewielers.nl/"><?php echo $websiteName?></a>

<?php
if($loggedIn === true)
{
?>
                <div class="btn-group pull-right">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="icon-user"></i> <?php echo $userName?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $logOutUrl?>">Log uit</a></li>
                    </ul>
                </div>
<?php
}
?>
        </div>
    </div>
</div>