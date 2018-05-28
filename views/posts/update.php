</br>
<h3><?php echo $posts->title ?></h3>
</br>
<form method="POST" action="?controller=post&amp;action=maj&amp;id=<?php echo $_GET['id'] ?>">
    <p><textarea class='form-control' name='contentUpdate' cols="15" rows="5" required><?php echo $posts->content ?></textarea></p>
    <p><input class='btn btn-outline-success' type='submit' name'envoyerUpdate' value='update'></p>
</form>