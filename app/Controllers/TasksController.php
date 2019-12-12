<?php

class TasksController extends Controller
{
    const PAGE_SIZE = 3;

    public function getIndex()
    {
        $db = new DB();
        // $order = $_REQUEST['order'];
        // $page = $_REQUEST['page'];
        $tasks = $db->query('SELECT * FROM tasks')->fetchAll();

        include APP_PATH."views/tasks.html.php";
    }

    public function getAdd()
    {
        include APP_PATH."views/form.html.php";
    }

    public function store()
    {
        include APP_PATH."views/form.html.php";
    }

    public function getEdit()
    {
        include APP_PATH."views/form.html.php";
    }

    public function update()
    {
        include APP_PATH."views/form.html.php";
    }
}