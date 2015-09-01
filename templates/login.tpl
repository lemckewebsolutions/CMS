<?php
/**
 * @var string $head
 * @var string $footer
 * @var string $sideBar
 */
echo $head;
?>
<div class="container">
    <form class="form-signin">
        <h2 class="form-signin-heading">Inloggen</h2>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email adres" required autofocus>
        <input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" required><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
    </form>
</div>
<?php
echo $footer;

