<h3>Voici tous vos favoris</h3>


<section class="row">
    <artcile class='col-10'>
        <?php foreach ($favoris as $favori) 
        { ?>
            <p class='posts'>
                <a href="?controller=post&amp;action=show&amp;id=<?php echo $favori->id; ?>"></br><?php echo $favori->title; ?></a>
            </p>
        <?php } ?>
    </artcile>
</section>