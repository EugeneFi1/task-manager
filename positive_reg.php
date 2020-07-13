<div class='login'>
    <?php
        if(isset($_COOKIE['login_proverka'])){
            echo('not vailable login! please change');
    ?>        
            <div class='registr'>
                <input type='button' id='registr_button' value='registration' onclick='registr()'>
            </div>
    <?php         
        } else {
    ?>
            success<br>
            <input type='button' value='log in' id='log_out' onclick='logOut()'>
    <?php
        }
    
    ?>
</div>    