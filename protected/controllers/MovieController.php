<?php

class MovieControler extends Controller {

    public function actionNew() {
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $name = isset($_POST['name']) ? $_POST['name'] : NULL;
        $actors = isset($_POST['actors']) ? $_POST['actors'] : NULL;
        if ($id !== NULL && $name !== NULL && $actors !== NULL) {
            echo json_encode(Pelicula::createMovie($id, $name, $actors));
        }
    }

    public function actionGetActors() {
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        echo json_encode($id !== null ? Pelicula::getActors($id) : NULL);
    }

}
