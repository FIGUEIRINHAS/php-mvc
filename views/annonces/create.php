</br>
<section class="row">
    <article class="col-5">
        <form method="POST" action="?controller=annonce&amp;action=addAnnonce" enctype="multipart/form-data">
            <p>
                <label for='titleAnnonce'>Title :
                <input class='form-control' type='text' name='titleAnnonce' required>
            </p>
            <p>
                <label for='contentAnnonce'>Content :
                <textarea class='form-control' name='contentAnnonce' cols='20' rows='15' required></textarea>
            </p>
    </article>
    <article class="col-7">
            <p>
                <label for='tel'>Téléphone :
                <input class='form-control' type='tel' name='tel' required>
            </p>
            <p>
                <select name='regions'>
                    <?php foreach ($regions as $region) { ?> 
                        <option value='<?php echo $region->id ?>'><?php echo $region->name ?></option>
                    <?php } ?>
                </select>
            </p>
                    </br>
            <p>
                <input class='form-control' type='file' name='image' required>
            </p>
                    </br>
            <input class='btn btn-outline-success' type='submit' name='send' value='send'>
        </form>
    </article>
</section>