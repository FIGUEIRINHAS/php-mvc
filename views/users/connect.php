</br>
<section class="row">
    <form method="POST" action="?controller=user&amp;action=login">
        <article class='col' class='form-group'>
            <p><label for="username">Username :</label>
            <input class="form-control" type="text" name="username" required></p>
        </article>
        <article class='col'>
            <p><label for="password">Password :</label>
            <input class="form-control" type="password" name="password" required></p>
        </article>
        <p><input class='btn btn-outline-success' type="submit" name="send" value='Send'>
        <a class="btn btn-link" href="?controller=user&amp;action=signIn">Sign in :</a></p>
    </form>
        
</section>
