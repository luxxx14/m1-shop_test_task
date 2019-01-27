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
        echo '<br>';
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
}