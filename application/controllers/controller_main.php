<?php

class Controller_main extends Controller
{

    function __construct()
    {
        $this->model = new Model_main();
        $this->view = new View();
    }

    function actionIndex()
    {
        print '<br>';
        $this->view->generate('main_view.php', 'template_view.php'/*, $data*/);
    }

    function actionGetData() {
        $data = $this->model->get_data();
        print json_encode($data);
        exit;
    }

    function actionInsertData() {
        print intval($this->model->insert_data($_POST));
        exit;
    }

    function actionUpdateData() {
        print intval($this->model->update_data($_POST));
        exit;
    }

    function actionDeleteData() {
        print intval($this->model->delete_data($_POST['id']));
        exit;
    }
}