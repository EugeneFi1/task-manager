<?php include 'function.php'; ?>
<?php include 'add_task.html'; ?>

<?php
    $tasks = getTasks($_COOKIE['id'],$link);
    $id_task = 1;
    foreach($tasks as $index => $content){
        $delete = '"'.$content['task'].'"';
        echo("<div class='task' id='".$id_task."'>".$content['task']."<div>
        <input type='button' id='done_button' value='done'
        onclick='doneTaskS(".$id_task.")'>
        <input type='button' id='button' value='delete'
        onclick='deleteTaskS(".$delete.")'></div></div>");
        $id_task++;
    }
?>
