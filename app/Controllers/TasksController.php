<?php

class TasksController extends Controller
{
    const PAGE_SIZE = 3;

    const SORT_COLUMNS = [
        'username',
        'email',
        'done'
    ];

    public function getIndex()
    {
        $sort = isset($_REQUEST['sort']) ? $_REQUEST['sort'] : 'username:asc';
        $sort = explode(':', $sort);
        if (
            count($sort) >= 2 &&
            in_array($sort[0], self::SORT_COLUMNS) &&
            in_array($sort[1], ['asc', 'desc'])
        ) {
            $sortBy = $sort[0];
            $direction = $sort[1];
        } else {
            $sortBy = 'username';
            $direction = 'asc';
        }
        $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $page = intval($page) > 0 ? intval($page) : 1;
        $page = intval($page) > 0 ? intval($page) : 1;

        $data = Task::paginate($page, self::PAGE_SIZE, $sortBy, $direction);

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
        if (!Auth::check()) {
            include APP_PATH."views/errors/401.html.php";
            die();
        }
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

        if ($task = Task::find($id)) {
            include APP_PATH."views/form.html.php";
        } else {
            include APP_PATH."views/errors/404.html.php";
        }

    }

    public function update()
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
        if ($oldTask = Task::find($id)) {

            $task = [
                'id' => $id,
                'username' => isset($_REQUEST['username']) ? $_REQUEST['username'] : '',
                'email' => isset($_REQUEST['email']) ? $_REQUEST['email'] : '',
                'text' => isset($_REQUEST['text']) ? $_REQUEST['text'] : '',
                'done' => isset($_REQUEST['done']) ? $_REQUEST['done'] : 0,
            ];

            $task['edited'] = ($oldTask['edited'] || $oldTask['text'] != $task['text']) ? 1 : 0;

            if (!Auth::check()) {
                Session::put('error', 'You are not authorized');
                include APP_PATH."views/form.html.php";
                die();
            }
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
        } else {
            include APP_PATH."views/errors/404.html.php";
        }
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