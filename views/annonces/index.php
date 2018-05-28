<h3>Voici toutes les annonces ~</h3>
</br>
<section class="row">
    <article class="col-12"
        <?php
        foreach ($annonces as $annonce) { ?>
            <p>
                <?php echo $annonce->title; ?>
                :<a href='?controller=annonce&amp;action=showAnnonce&amp;id=<?php echo $annonce->id; ?>&amp;id_regions=<?php echo $annonce->id_regions; ?>'></br>Voir le contenu</a> 
            </p>
        <?php } ?>
    </article>
</section>