
</br>
<div id='posts-col' class='posts-col'>
    <div class="row">
        <div class="col-6">
            <p class='posts'> 
                <h4><strong><?php echo $posts->title; ?></strong></h4> 
            </p>
        </br>
            <p class='posts'> 
                Le post || <?php echo $posts->content; ?> 
            </p>
        </br>
            <p class='posts'> 
                Crée le || <?php echo $posts->created_date; ?>
            </p>
        </br>
            </div>
            <div class="col-6">
                <?php
                if(isset($_SESSION['id']) && $_SESSION['id'] == $posts->author)
                { ?>
                    <p id='id-p-boutons' class='class-p-boutons'>
                        <a class='class-update' href='?controller=post&amp;action=update&amp;id=<?php echo $_GET['id'] ?>'>Update</a>
                        <a class='class-delete' href='?controller=post&amp;action=verifDelete&amp;id=<?php echo $_GET['id'] ?>'>Delete</a>
                    </p>
                <?php } ?>

                <?php 
                if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') 
                { ?>
                    <p id='id-boutons' class='class-boutons'>
                        <a class='class-update' href='?controller=post&amp;action=update&amp;id=<?php echo $_GET['id'] ?>'>Update</a>
                        <a class='class-delete' href='?controller=post&amp;action=verifDelete&amp;id=<?php echo $_GET['id'] ?>'>Delete</a>
                    </p>
                <?php } ?>
            </br>
                <form method="POST" action="?controller=comment&amp;action=addComment&amp;id=<?php echo $_GET['id'] ?>">
                    <p class='add-comment'>
                        <label for='comment'>Ajouter un commentaire</label>
                    </br>
                        <textarea class='form-control' name="comment" rows="3" cols="30" required></textarea>
                    </p>
                    <input class='btn btn-outline-success' type="submit" value="send">  
                </form>
            </br>
            <?php
            foreach ($comments as $comment) 
            { ?>
                <p>
                    <?php echo $comment->content; ?>
                </p>
            <?php } ?>
            </div>
        </div>
    </div>
</br>
    
        
        




    

