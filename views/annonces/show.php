<h4>Voilà le contenu de l'annonce :</h4>

</br>

<section id='posts-col' class='posts-col'>
    <article>
    <p class='posts'> 
            <h4><strong><?php echo $annonces->title; ?></strong></h4> 
        </p>
    </br>
        <p>
            <img src='uploads/<?php echo $images->file_name; ?>'>
        </p>
    </br>
        <p class='posts'> Description :
            <?php echo $annonces->content; ?>
        </p>
    </br>
        <p class='posts'> Numéro de téléphone :
            <?php echo $annonces->tel; ?>
        </p>
        <p class='posts'> Régions : 
            <?php echo $regionName->name; ?>
        </p>
    <article>
</section>
 
<?php 
if (isset($_SESSION['id']) && $_SESSION['id'] == $annonces->author || isset($_SESSION['username']) && $_SESSION['username'] == 'admin')
{ ?>
    <p id='id-boutons' class='class-boutons'>
        <a class='class-delete'  href='?controller=annonce&amp;action=verifDelete&amp;id=<?php echo $_GET['id'] ?>'>Delete</a>
    </p>
<?php } ?>
