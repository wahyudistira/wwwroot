<div id="content" class="login">

    <h1><img src="<?php echo base_url(); ?>img/icons/locked.png" alt="" />Admin Kecamatan</h1>


    
    <form action="<?php echo base_url(); ?>index.php/adminkecamatan/login_exec" method="POST">

        <div class="input placeholder">
            <label for="login">Pin Anda</label>
            <input type="text" id="pin" name="pin"/>
        </div>
        

        
        <div class="submit">
            <input type="submit" value="Login me in"/>
        </div>
    </form>


</div>
