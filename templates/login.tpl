<?php
/**
 * @var string $head
 * @var string $footer
 * @var string $sideBar
 */
echo $head;
?>
<div class="container">
    <form class="form-signin" action="<?php echo LWS\CMS\Url::LOG_IN?>" method="POST">
        <h2 class="form-signin-heading">Inloggen</h2>
        <input type="text" id="inputEmail" class="form-control" placeholder="Email adres" required autofocus>
        <input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" required><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
    </form>
</div>
<?php
echo $footer;

