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
        $task = [
            'id' => '',
            'username' => '',
            'email' => '',
            'text' => '',
            'done' => '',
        ];
        include APP_PATH."views/form.html.php";
    }

    public function store()
    {
        $task = [
            'id' => '',
            'username' => isset($_REQUEST['username']) ? $_REQUEST['username'] : '',
            'email' => isset($_REQUEST['email']) ? $_REQUEST['email'] : '',
            'text' => isset($_REQUEST['text']) ? $_REQUEST['text'] : '',
            'done' => '',
        ];
        $this->validate($task);
        Task::addTask($task['username'], $task['email'], $task['text']);
        Session::put('message', 'Successfully added');
        _redirect('/');
    }

    public function getEdit()
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

        if ($task = Task::find($id)) {
            include APP_PATH."views/form.html.php";
        } else {
            include APP_PATH."views/errors/404.html.php";
        }

    }

    public function update()
    {
        $task = [
            'id' => isset($_REQUEST['id']) ? $_REQUEST['id'] : '',
            'username' => isset($_REQUEST['username']) ? $_REQUEST['username'] : '',
            'email' => isset($_REQUEST['email']) ? $_REQUEST['email'] : '',
            'text' => isset($_REQUEST['text']) ? $_REQUEST['text'] : '',
            'done' => isset($_REQUEST['done']) ? $_REQUEST['done'] : 0,
            'edited' => 1,
        ];
        $this->validate($task);
        Task::updateTask(
            $task['id'],
            $task['username'],
            $task['email'],
            $task['text'],
            $task['done'],
            $task['edited']
            );

        Session::put('message', 'Successfully updated');
        _redirect('/');
    }

    public function validate(array $task)
    {
        if (empty($task['username'])) {
            Session::put('error', 'Username is required');
            include APP_PATH."views/form.html.php";
            die();
        }
        if (empty($task['email'])) {
            Session::put('error', 'Email is required');
            include APP_PATH."views/form.html.php";
            die();
        } else {
            if (!filter_var($task['email'], FILTER_VALIDATE_EMAIL)) {
                Session::put('error', 'Email should be valid');
                include APP_PATH."views/form.html.php";
                die();
            }
        }
        if (empty($task['text'])) {
            Session::put('error', 'Text is required');
            include APP_PATH."views/form.html.php";
            die();
        }
    }
}