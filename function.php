<?php
    $link = mysqli_connect('localhost', 'root', '', 'task');

    $getLogins = getUsersLogins($link);
    
    foreach($getLogins as $index => $x){
        $logins[$index] = $x['login'];
    }
    
    
    if(isset($_GET['task'])){
        addTask($_COOKIE['id'], $_GET['task'], $link);
    }
    if(isset($_GET['delete'])){
        deleteTask($_COOKIE['id'], $_GET['delete'], $link);
    }
    if(isset($_GET['log']) && isset($_GET['pass']) && isset($_GET['name'])){
        foreach($logins as $id => $content){
            if($content == $_GET['log']){
                $x = true;
                break;
            } else {
                $x = false;
            }
        }
        if(!$x){
            setcookie('login_proverka', 'true', time() - 3600, '/');
            addUser($_GET['log'], $_GET['pass'], $_GET['name'], $link);
        } else {
            setcookie('login_proverka', 'true', time() + 3600, '/');
        }    
    }
    if(isset($_GET['login']) && isset($_GET['password'])){
        $user = getUserId($_GET['login'], $_GET['password'], $link);
        $name = $user[0]['name'];
        $id = $user[0]['id'];
        setcookie('name', $name, time() + 3600, '/');
        setcookie('id', $id, time() + 3600, '/');      
    }
    if(isset($_GET['logout'])){
        setcookie('name', '', time() - 3600, '/');
        setcookie('id', '', time() - 3600, '/');
    }
    
    function addTask($id, $task, $link){
        $sql = "INSERT INTO tasks(`id`, `task`) VALUES (".$id.",'".$task."')";
        $query = mysqli_query($link, $sql);
    }
    function deleteTask($id ,$task, $link){
        $sql = "DELETE FROM tasks WHERE id=".$id." && task='".$task."'";
        $query = mysqli_query($link, $sql);
    }
    function getUserId($login, $password, $link){
        $sql = "SELECT id, name FROM users WHERE login='".$login."' && password='".$password."'";
        $query = mysqli_query($link, $sql);
        $result = mysqli_fetch_all($query, 1);
        return $result;
    }
    function addUser($login, $password, $name, $link){
        $sql = "INSERT INTO users(`login`, `password`, `name`) VALUES ('".$login."', '".$password."','".$name."')";
        $query = mysqli_query($link, $sql);
    }
    function getTasks($id, $link){
        $sql = "SELECT * FROM tasks WHERE id=".$id."";
        $query = mysqli_query($link, $sql);
        $result = mysqli_fetch_all($query, 1);
        return $result;
    }
    function getUsersLogins($link) {
        $sql = "SELECT login FROM users";
        $query = mysqli_query($link, $sql);
        $result = mysqli_fetch_all($query, 1);
        return $result;
    }
?>