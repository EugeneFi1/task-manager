<div class='login'>
    Login:<br>
    <input type='text' id='login'><br>
    Password:<br>
    <input type='text' id='password'><br>
    <div id='login_notification' class='red'></div>
    <input type='button' id='login_button' value='let`s go' 
    onclick='getUser($("#login").val(), $("#password").val())'>
    <div class='registr'>
        <input type='button' id='registr_button' value='registration' onclick='registr()'>
    </div> 
</div>

<?php include 'function.php'; ?>

       