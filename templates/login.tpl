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
        <label for="inputEmail" class="sr-only">Email adres</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email adres" required autofocus>
        <label for="inputPassword" class="sr-only">Wachtwoord</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
    </form>
</div>
<?php
echo $footer;

