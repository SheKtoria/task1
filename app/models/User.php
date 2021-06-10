<?php

namespace app\models;

use app\core\Model;
session_start();

class User extends Model
{
    public function getAllUsers()
    {
        $users = $this->conn->query("SELECT * FROM usertbl ORDER BY id");
        return $users;
    }

    public function getAllTasks()
    {
        $tasks = $this->conn->query("SELECT * FROM list ORDER BY id");
        return $tasks;
    }

    public function getUsersTasks()
    {
        $id= implode($_SESSION['id']);
        $tasks = $this->conn->query("SELECT tasks FROM usertbl WHERE id=?", [$id]);
        return $tasks;
    }
    public function getUsersData()
    {
        $id= implode($_SESSION['id']);
        $users = $this->conn->query("SELECT * FROM usertbl where id=?", [$id]);
        return $users;
    }

    public function delete($id)
    {
        $user = $this->conn->query("DELETE FROM usertbl where id = ?", [$id]);
        return $user;
    }

    public function update($data)
    {
        $result = $this->conn->query("SELECT COUNT(id) AS total FROM `usertbl` WHERE username=?", [$data['username']])[0];
        if ($result['total'] <= 0) {
            $this->conn->query("UPDATE usertbl SET first_name = ?, username = ?, email = ? WHERE id = ?",
                [
                    $data['first_name'],
                    $data['username'],
                    $data['email'],
                    $data['id']
                ]);
            return true;
        } else {
            return false;
        }

    }

    public function addUser($data)
    {
        $hashPassword = password_hash($data['password'], PASSWORD_BCRYPT);
        if (!empty($data['name']) && !empty($data['email']) && !empty($data['login']) && !empty($data['password'])) {
            $result = $this->conn->query("SELECT COUNT(id) AS total FROM `usertbl` WHERE username=?", [$data['login']])[0];
            if ($result['total'] <= 0) {
                if ($data['password'] === $data['confirmPassword']) {
                     $this->conn->query("INSERT INTO usertbl (first_name,email,username,password,tasks,access) VALUES(?,?,?,?,?,?)",
                        [
                            $data['name'],
                            $data['email'],
                            $data['login'],
                            $hashPassword,
                            '',
                            '1'
                        ]);
                    return '1';
                } else {
                    return '2';
                }
            } else {
                return '3';
            }
        } else {
            return '4';
        }
    }

    public function loginUser($data)
    {
        if (!empty($data['usernameLogin']) && !empty($data['passwordLogin'])) {
            $password = $data['passwordLogin'];
            $result = $this->conn->query("SELECT COUNT(id) AS total FROM `usertbl` WHERE username=?", [$data['usernameLogin']])[0];
            if ($result['total'] > 0) {
                $hash = $this->conn->query("SELECT password FROM `usertbl` WHERE username=?", [$data['usernameLogin']])[0];
                $id = $this->conn->query("SELECT id FROM `usertbl` WHERE username=?", [$data['usernameLogin']])[0];
                $role = $this->conn->query("SELECT access FROM `usertbl` WHERE username=?", [$data['usernameLogin']])[0];
                $hashPass = implode($hash);
                if (password_verify($password, $hashPass)) {
                    $_SESSION['id'] = $id;
                    $_SESSION['access'] = $role;
                    $_SESSION['auth'] = true;
                    return '1';
                }
            } else {
                return '2';
            }
        } else {
            return '3';
        }
    }

    public function addTask($data)
    {
        if ($data['option'] != '') {
            $this->conn->query("UPDATE usertbl SET tasks = ? WHERE id = ?",
                [
                    $data['option'],
                    $data['id']
                ]);
            return true;
        } else {
            return false;
        }
    }

    public function addTaskList($data)
    {
        $result = $this->conn->query("SELECT COUNT(id) AS total FROM `list` WHERE to_do=?", [$data['task']])[0];
        if ($result['total'] <= 0) {
            $this->conn->query("INSERT INTO list (to_do) VALUES(?)",
                [
                    $data['task'],
                ]);
            return true;
        }else{
            return false;
        }
    }
}