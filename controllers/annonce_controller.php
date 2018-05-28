<?php
require('models/regions.php');
require('models/image.php');
require('models/post.php');
class AnnonceController
{
    public function indexAnnonce()
    {
        if(isset($_GET['regions']))
        {
            $annonces = Annonce::all($_GET['regions']);
        }
        else
        {
            $annonces = Annonce::all();
        }
        $regions = Regions::get_all_regions();
        require_once('views/annonces/index.php');
    }

    public function showAnnonce()
    {
        if (!isset($_GET['id']))
        {
            return call('pages', 'error');
        }
        if (!isset($_GET['id_regions']))
        {
            return call('pages', 'error');
        }
            $images = Image::get_id_annonce($_GET['id']);
            $regions = Regions::get_all_regions();
            $annonces = Annonce::find($_GET['id']);
            $regionName = Regions::get_id_regions($_GET['id_regions']);
            require_once('views/annonces/show.php');   
    }

    public function createdAnnonce()
    {
        if(isset($_SESSION['id']))
        {
            $regions = Regions::get_all_regions();
            $annonces = Annonce::all();
            require_once('views/annonces/create.php');
        }
    }

    public function addAnnonce()
    {    
        $id_annonce = Annonce::add_annonce(array(
            'id_regions' => htmlspecialchars($_POST['regions']),
            'author' => $_SESSION['id'],
            'title' => htmlspecialchars($_POST['titleAnnonce']),
            'content' => htmlspecialchars($_POST['contentAnnonce']),
            'tel' => htmlspecialchars($_POST['tel'])
                ));

        $annonces = Annonce::all();
        
        $this->addImage($id_annonce, $_FILES['image']);
        require_once('views/annonces/index.php');
    }

    public function addImage($id_annonce, $file)
    {
        if(isset($file))
        {
            $errors = [];
            $way = 'uploads/';
            $file_name = $way . basename($file['name']);
            $file_size = $file['size'];
            $file_tmp = $file['tmp_name'];
            $file_type = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));

            $extension = array(
                'jpeg',
                'jpg',
                'png'
            );

            if (in_array($file_type, $extension) === false)
            {
                $errors = 'Extension introuvable';
            }
            if ($file_size > 2097152)
            {
                $errors = 'Image trop importante';
            }

            $the_name = uniqid() . '.' . $file_type;

            if (empty($errors) == true)
            {
                move_uploaded_file($file_tmp, $way.$the_name);

                Image::add_image(array(
                    'file_name' => htmlspecialchars($the_name),
                    'id_annonce' => htmlspecialchars($id_annonce)
                ));
                $annonces = Annonce::all();
                require_once('views/annonces/index.php');
            }
        } 
    }

    public function indexImage()
    {
        $images = Image::get_all_image();
        require_once('views/annonces/index.php');
    }

    public function showDelete()
    {
        require_once('views/annonces/delete.php');
    }

    public function verifDelete()
    {
        if(isset($_SESSION['username']))
        {
            if (!isset($_GET['id']))
            {
                return call('pages', 'error');
            }
            $annonces = Annonce::find($_GET['id']);
            require_once('views/annonces/verifDelete.php');
        }
    }

    public function deleteAnnonce()
    {
        Annonce::delete_annonce(array(
            'id' => htmlspecialchars($_GET['id'])
        ));
        header('location:index.php?controller=annonce&action=showDelete');
    }
}

