<div class='login'>
    Login:<br>
    <input type='text' id='reg_login'><br>
    Password:<br>
    <input type='text' id='reg_pass'><br>
    Name:<br>
    <input type='text' id='reg_name'><br>
    <div id='reg_notification' class='red'></div>
    <input type='button' id='reg_button' value='let`s start'
    onclick='addUser($("#reg_login").val(), $("#reg_pass").val(), $("#reg_name").val())'>
</div>    