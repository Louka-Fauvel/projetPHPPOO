<?php

use blog\src\lib\Database;
use blog\src\repository\PostsRepo;

$postRepository = new PostsRepo();
$postRepository->database = new Database();

// Afficher form Créer Blog
function createBlog() {
    if(isset($_POST['createBlog'])) {

        echo '<form method="post">
            <button type="submit" name="createBlogX" class="btn btn-danger icon-link">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
            </button>
        </form>
        <form method="post" class="mb-3">
            <div class="mb-3">
                <label for="titleCreate">Titre</label>
                <input class="form-control" type="text" id="titleCreate" name="titleCreate" placeholder="Titre">
            </div>
            <div class="mb-3">
                <label for="contentCreate">Contenu</label>
                <textarea class="form-control" id="contentCreate" name="contentCreate" placeholder="Contenu"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Ajouter un blog</button>
        </form>';

    } else {

        echo '<form method="post" class="mb-3">
            <button type="submit" name="createBlog" class="btn btn-success">Ajouter un Blog</button>
        </form>';

    }
}

// Créer Blog
if(isset($_POST['titleCreate']) && !empty($_POST['contentCreate'])) {

    $postRepository->create($_POST['titleCreate'], $_POST['contentCreate']);

}

function modifyBlog($post) {
    if(isset($_POST['modifyBlog' . $post->getId()])) {

        return '<form method="post">
            <button type="submit" name="modifyBlogX" class="btn btn-danger icon-link">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
            </button>
        </form>
        <form method="post" class="mb-3">
            <div class="mb-3">
                <label for="titleModify">Titre</label>
                <input class="form-control" type="text" id="titleModify" name="titleModify" placeholder="Titre" value="'.$post->getTitle().'">
            </div>
            <div class="mb-3">
                <label for="contentModify">Contenu</label>
                <textarea class="form-control" id="contentModify" name="contentModify" placeholder="Contenu">'.$post->getContent().'</textarea>
            </div>
            <input type="hidden" name="idModify" value="'.$post->getId().'">
            <button type="submit" class="btn btn-warning">Modifier</button>
        </form>';

    }

    return "";
}

if(isset($_POST['titleModify']) && !empty($_POST['contentModify']) && !empty($_POST['idModify'])) {

    $postRepository->modify($_POST['idModify'], $_POST['titleModify'], $_POST['contentModify']);

}

// Supprimer Blog
if(isset($_POST['delete'])) {

    $postRepository->delete(intval($_POST['delete']));

}