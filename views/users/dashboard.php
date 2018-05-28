
<h4>Laissez place a votre créativité ~</h4>
</br>
<p>_<a href='?controller=post&amp;action=form'>Créer un nouveau post</a></p>
<p>_<a href='?controller=annonce&amp;action=createdAnnonce'>Créer une nouvelle annonce</a></p>

<p><a href='?controller=favori&amp;action=allFavori'></br>Voir mes Favoris</a></p>

</br>

<section class="container">
    <article class="row">
        <div class="col-5">
            <h3>Voici vos posts :</h3>
            <?php 
            foreach ($posts as $post) { ?>
                <p class='col'>
                    <?php echo $post->title; ?> :
                    <a href='?controller=post&amp;action=show&amp;id=<?php echo $post->id; ?>'></br>Voir le contenu</a> 
                </p>
            <?php } ?>
        </div>
    </artcile>
        </br>
    <article class="row">
        <div class="col-7">
            <h3>Voici vos annonces :</h3>

            <?php 
            foreach ($annonces as $annonce) { ?>
                <p class='col'>
                    <?php echo $annonce->title; ?> :
                    <a href='?controller=annonce&amp;action=showAnnonce&amp;id=<?php echo $annonce->id; ?>'></br>Voir le contenu</a> 
                </p>
            <?php } ?>
        </div>
    </article>
</section>