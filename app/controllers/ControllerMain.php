<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\User;

session_start();

class ControllerMain extends Controller
{
    public function index()
    {
        $this->view->generate('index.php', []);
    }

    public function showLogin()
    {
        $this->view->generate('login.php', []);
    }

    public function loginUser()
    {
        $data = Request::post();
        $model = new User();
        $d = $model->loginUser($data);
        if ($d === '1') {
            $access = implode($_SESSION['access']);
            if ($access === '1') {
                echo "1";
            } elseif ($access === '10') {
                echo "2";
            }
        } elseif ($d === '2') {
            echo "3";
        } elseif ($d === '3') {
            echo "4";
        }
    }

    public function register()
    {
        $data = Request::post();
        $model = new User();
        $d = $model->addUser($data);
        if ($d == '1') {
            echo "1";
        } elseif ($d === '2') {
            echo "2";
        } elseif ($d === '3') {
            echo "3";
        } elseif ($d === '4') {
            echo "4";
        }
    }

    public function table()
    {
        if (!$_SESSION['auth']) {
            header('Location: /');
        } else {
            $model = new User();
            $users = $model->getAllUsers();
            $this->view->generate('userTable.php', ['users' => $users]);
        }
    }

    public function delete()
    {
        $user = new User();
        $d = $user->delete(Request::post('id'));
        if ($d) {
            $res = true;
        } else {
            $res = false;
        }
        return $res;
    }

    public function update()
    {
        $user = new User();
        $data = Request::post();
        $d = $user->update($data);
        if ($d) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function showAdmin()
    {
        if (!$_SESSION['auth']) {
            header('Location: /');
        } else {
        $access = implode($_SESSION['access']);
            if ($access != '10') {
                header('Location:/users');
            } else {
                $model = new User();
                $users = $model->getAllUsers();
                $task = $model->getAllTasks();
                $this->view->generate('admin.php', ['users' => $users, 'tasks' => $task]);
            }
        }
        }

        public
        function addTask()
        {
            $user = new User();
            $data = Request::post();
            $users = $user->addTask($data);
            if ($users) {
                echo 'true';
            } else {
                echo 'false';
            }
        }

        public
        function addTaskList()
        {
            $user = new User();
            $data = Request::post();
            $users = $user->addTaskList($data);
            if ($users) {
                echo 'true';
            } else {
                echo 'false';
            }
        }

        public
        function userPage()
        {
            if (!$_SESSION['auth']) {
                header('Location: /');
            } else {
                $model = new User();
                $task = $model->getUsersTasks();
                $users = $model->getUsersData();
                $this->view->generate('user.php', ['tasks' => $task, 'users'=>$users]);
            }
        }

        public function logOut()
        {
            unset($_SESSION['auth']);
            session_destroy();
            if (!$_SESSION['auth']) {
                echo 'true';
            }

        }
    }