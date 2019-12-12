<?php

class Task extends Model
{
    public static function find($id)
    {
        $db = new DB();
        $result = $db->query('SELECT * FROM tasks WHERE id = ?', $id)->fetchAll();
        $db->close();
        if (count($result)) {
            return $result[0];
        } else {
            return null;
        }
    }

    public static function addTask($username, $email, $text)
    {
        $db = new DB();
        $result = $db->query('INSERT INTO tasks (username,email,text) VALUES (?,?,?)', $username, $email, $text);
        $db->close();
        return $result->affectedRows();
    }

    public static function updateTask($id, $username, $email, $text, $done, $edited)
    {
        $db = new DB();
        $result = $db->query(
            'UPDATE tasks SET username = ?, email = ?, text = ?, done = ?, edited = ? WHERE id = ?',
            $username,
            $email,
            $text,
            $done,
            $edited,
            $id
        );
        $db->close();
        return $result->affectedRows();

    }

    public static function paginate($page, $pageSize, $sortBy, $direction)
    {

    }
}