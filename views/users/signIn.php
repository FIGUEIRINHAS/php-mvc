<section class="form-group col-md-4">
    <form method="POST" action="?controller=user&amp;action=addUser">
        <p>
            <label for='usernameSign'>Username</label>
            <input class="form-control" type='text' name='usernameSign' required>
        </p>
        <p>
            <label for=passwordSign>Password</label>
            <input class='form-control' type='password' name='passwordSign' required>
        <p>
        <p>
            <label for='verifPassword'>Retapez le password</label>
            <input class='form-control' type='Password' name='verifPassword' required>
        </p>
        <p>
            <label for='emailSign'>Email
            <input class='form-control' type='email' name='emailSign' placeholder='email@aol.com' required>
        </p>
        <p>
            <input class='btn btn-success' type='submit' name='sendSign' value='Send'>
        </p>
    </form>
</section>
<a href="?controller=pages&amp;action=home">Retour a l'acceuil !</a>