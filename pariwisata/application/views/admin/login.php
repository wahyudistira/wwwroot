<div id="content" class="login">

    <h1><img src="<?php echo base_url(); ?>img/icons/locked.png" alt="" />Admin panel</h1>


    
    <form action="<?php echo base_url(); ?>index.php/admin/login_exec" method="POST">

        <div class="input placeholder">
            <label for="login">Login</label>
            <input type="text" id="username" name="username"/>
        </div>
        <div class="input placeholder">
            <label for="pass">Password</label>
            <input type="password" id="password" name="password"/>
        </div>

        <div class="checkbox">
            <input type="checkbox" id="remember"/>
            <label class="inline" for="remember">Remember me</label>
        </div>
        <div class="submit">
            <input type="submit" value="Login me in"/>
        </div>
    </form>


</div>
