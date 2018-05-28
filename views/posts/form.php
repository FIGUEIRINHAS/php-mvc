<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <form method="POST" action="?controller=post&amp;action=create">
        <p><label for="title">Title</label>
        <input class='form-control' type='text' name='title' required></p>
        <p><label for="content">Content</label>
        <textarea class='form-control' name='content' cols="20" rows="15" required></textarea></p>
        <p>
            <div class="form-group col-md-4">
                <select class='form-control' name='field'>
                    <?php foreach ($fields as $field) { ?>
                        <option value='<?php echo $field->id ?>'><?php echo $field->name ?></option>
                    <?php } ?>
                </select>
            </div>
        </p>
        <p><input class='btn btn-outline-success' type='submit' name'envoyer' value='Envoyer'></p>
    </form>  

</body>

</html>