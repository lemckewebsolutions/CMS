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
        <input class="form-control"
               id="inputEmail"
               name="username"
               placeholder="Email adres"
               type="text"
               required
               autofocus>
        <input class="form-control"
               id="inputPassword"
               name="password"
               placeholder="Wachtwoord"
               type="password"
               required><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
    </form>
</div>
<?php
echo $footer;

