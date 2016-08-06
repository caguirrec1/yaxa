<?php

class ActorController extends Controller {

    public function actionCrear() {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
        if ($id !== null && $name !== null && $lastname !== NULL) {
            echo json_encode(Actor::create($id, $name, $lastname));
        } else {
            echo json_encode(false);
        }
    }

    public function actionFindById() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        echo json_encode($id !== null ? Actor::model()->findAllByPk($id) : NULL);
    }

    public function actionGetActorMovies() {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        echo json_encode($id!==NULL?Actor::getMovies($id):null);
    }

}
