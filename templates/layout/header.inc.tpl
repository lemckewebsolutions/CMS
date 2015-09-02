<?php
/**
 * @var bool $loggedIn
 * @var string $logOutUrl
 * @var string $userName
 * @var string $websiteName
 */
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toon menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><?php echo $websiteName?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
<?php
if($loggedIn === true) {
?>
                <li><a href="/logout">Uitloggen</a></li>
<?php
} else {
?>
                <li><a href="/login">Inloggen</a></li>
<?php
}
?>
            </ul>
        </div>
    </div>
</nav>