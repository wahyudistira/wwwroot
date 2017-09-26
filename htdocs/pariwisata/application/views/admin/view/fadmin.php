<!--              
        HEAD
--> 

<?php $this->load->view('admin/view/flogin'); ?>

<!--            
        SIDEBAR
--> 
<div id="sidebar">
    <ul>
        <li class="nosubmenu">
            <a href="<?php echo base_url(); ?>index.php/adm/dashbor">
                <img src="<?php echo base_url(); ?>img/icons/menu/black-dashboard.png" alt="" />
                Dashboard
            </a>
        </li>
        <li class="current"><a href="#"><img src="<?php echo base_url(); ?>img/icons/menu/black-layout.png" alt="" /> Master</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>index.php/mas/addkategori">Kategori</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/mas/addkecamatan">Kecamatan</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/mas/addwisata">Wisata</a></li>
                 <li><a href="<?php echo base_url(); ?>index.php/mas/adduser">User</a></li>
                <li class="current"><a href="<?php echo base_url(); ?>index.php/adm/setadmin">Setting Admin</a></li>
            </ul>
        </li>
        <li><a href="#"><img src="<?php echo base_url(); ?>img/icons/menu/black-layout.png" alt="" /> Posting</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>index.php/adm/kategori">Kategori</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/adm/kecamatan">Kecamatan</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/adm/wisata">Wisata</a></li>
               
                <li><a href="<?php echo base_url(); ?>index.php/adm/user">User</a></li>

            </ul>
        </li>
    </ul>
</div>

<!--            
      CONTENT 
--> 
<div id="content">
    <h1><img src="<?php echo base_url(); ?>img/icons/posts.png" alt="" />Setting Admin</h1>
    
    <form action="<?php echo base_url(); ?>index.php/adm/setadmin/edit" method="POST"> 
        <div class="bloc">
            <div class="title">Mengganti Password Admin</div>
            <div class="content">
                <div class="input">
                    <label for="input1">Username</label>
                    <input type="text" id="username" readonly="readonly" value=""/>
                </div>

                <div class="input medium">
                    <label for="input1">Password lama</label>
                    <input type="password" id="input2" name="pass1"/>

                </div>
                <div class="input medium">
                    <label for="input1">Password baru</label>
                    <input type="password" id="input2" name="pass2"/>
                </div>
                <div class="input medium">
                    <label for="input1">Konfirmasi password baru</label>
                    <input type="password" id="input2" name="pass3"/><br/><br/>
                    Keterangan : Untuk mengganti password masukan password lama anda kemudian password baru<br/><br/>
                    yang akan anda gunakan, setelah itu masukan password baru lagi di konfirmasi password baru untuk pengecekan validasi.<br/><br/>
                    NB : Untuk username tidak bisa dirubah.
                </div>




                <br/><br/>
                <div class="submit">
                    <input type="submit" value="Submit" />

                </div>
            </div>
        </div>
    </form>


</div>
