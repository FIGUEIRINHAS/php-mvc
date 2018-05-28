<h3>Voici tous les posts ~</h3>
</br>
<section class="row">
    
    <artcile class='col-10'>
        <div class="row">
        <?php foreach ($posts as $post) { ?>
            <div class="col-4">
            <p>
                <?php echo $post->title; ?>:</br>
                    <a class="badge badge-light" href='?controller=post&amp;action=show&amp;id=<?php echo $post->id; ?>'></br>Voir le contenu</a> 
                <form method="POST" action="?controller=favori&amp;action=addPostFavori&amp;id_post=<?php echo $post->id; ?>">
                    <input class="btn btn-outline-dark btn-sm" type="submit" name="favori" value="favori">
                </form>
                </br>
            </p>
            </div>
        <?php } ?>
        </div>
    </artcile>
    <article class="col-2">
        <ul class="list-group">
            <?php foreach($fields as $field) { ?>
                <li class="list-group-item test">
                    <a class="pd" href='?controller=post&amp;action=index&amp;field=<?php echo $field->id; ?>'><?php echo $field->name ?></a>
                </li>
            <?php } ?>
        </ul>
    </article>
</section>

