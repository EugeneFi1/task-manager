$(document).ready(function(){
    $(".tasks_field").load("start_page.php");
    $(".name_change").load("show_name.php");
    $("#add_button").click(function(){
        $("#new_task").val('');
    });
});

function addTaskS(i){
    var task = i;
    if(task != ''){
        $.ajax({
            url: 'function.php',
            type: 'GET',
            data: { 'task': task},
            dataType: 'html',      
            success: function(data) {
                $(".tasks_field").load("tasks_list.php");
            }
        });
    } else {
        $('#task_notification').text('please write task!');
    }    
}
function deleteTaskS(i){
    var task = i;

    $.ajax({
        url: 'function.php',
        type: 'GET',
        data: { 'delete': task},
        dataType: 'html',      
        success: function(data) {
            $(".tasks_field").load("tasks_list.php");
        }
    });
}
function doneTaskS(i){
    var id = i;
    $("#"+id+"").toggleClass('green');
}
function getUser(log, pass){
    var login = log;
    var password = pass;
    if(log != '' && pass != ''){
        $.ajax({
            url: 'function.php',
            type: 'GET',
            data: { 'login': login, 'password': password},
            dataType: 'html',      
            success: function(data) {
                $(".tasks_field").load("tasks_list.php");
                $(".name_change").load("show_name.php");
            }
        });
    } else {
        $('#login_notification').text('empty field/s');
    }
}
function logOut(){
    var x = true;

    $.ajax({
        url: 'function.php',
        type: 'GET',
        data: { 'logout': x},
        dataType: 'html',      
        success: function(data) {
            $(".name_change").load("show_name.php");
            $(".tasks_field").load("start_page.php");
        }
    });
}
function registr(){
    $(".tasks_field").load("registration.php");
}
function addUser(l, p, n){
    var log = l;
    var pass = p;
    var name = n;
    if(log != '' && pass != '' && name != ''){
        $.ajax({
            url: 'function.php',
            type: 'GET',
            data: { 'log': log, 'pass': pass, 'name': name},
            dataType: 'html',      
            success: function(data) {
                $(".tasks_field").load("positive_reg.php");
            }
        });
    } else {
        $('#reg_notification').text('empty field/s');
    }
}
