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
            <a href="<?php echo base_url(); ?>index.php/adminkec/dashbor">
                <img src="<?php echo base_url(); ?>img/icons/menu/black-dashboard.png" alt="" />
                Dashboard
            </a>
        </li>
        <li class="current"><a href="#"><img src="<?php echo base_url(); ?>img/icons/menu/black-layout.png" alt="" /> Master</a>
            <ul>
               
                 <li class="current"><a href="<?php echo base_url(); ?>index.php/adminkec/masterwisata">Wisata</a></li>
                  </ul>
        </li>

        <li><a href="#"><img src="<?php echo base_url(); ?>img/icons/menu/black-layout.png" alt="" /> Posting</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>index.php/adminkec/postwisata">Wisata</a></li>
               
            </ul>
        </li>
    </ul>
</div>

<!--            
      CONTENT 
--> 


<div id="content">
    <h1><img src="<?php echo base_url(); ?>img/icons/posts.png" alt="" />Add Wisata</h1>
   <?php echo  form_open_multipart(base_url().'index.php/adminkec/masterwisata/add');  ?> 
        <div class="bloc">
            <div class="title">Input Wisata</div>
            <div class="content">

                <div class="input">
                    <label for="select">Kategori</label>
                    <select name="kategori" id="select">
                        <?php foreach ($kategori as $row): ?>
                            <option value="<?php echo $row->id; ?>">
                                <?php echo $row->kategori; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input">
                    <label for="select">Kecamatan</label>
                    <select name="kecamatan" id="select">
                        <?php foreach ($kecamatan as $row): ?>
                            <option value="<?php echo $row->id; ?>">
                                <?php echo $row->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input">
                    <label for="input1">Nama Obyek Wisata</label>
                    <input type="text" id="now" name="nama" />

                </div>
                <div class="input">
                    <label for="input1">Lokasi Wisata</label>
                    <input type="text" id="lokasi" name="lokasi" />

                </div>

                <div class="input">
                    <label for="input1">Jarak</label>
                    <input type="text" id="jarak" name="jarak" />

                </div>
                <div class="input">
                    <label for="input1">Akomodasi</label>
                    <input type="text" id="akomodasi" name="akomodasi" />

                </div>
                <div class="input textarea">
                    <label for="textarea1">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="7" cols="4"></textarea>
                </div>

                <div class="input">
                    <label for="file">Upload Foto</label>
                    <input type="file" id="gambar" name="gambar"/><br/><br/>
                    File hanya untuk format jpg, jpeg, png.<br/><br/>
                    (Recomended) Ukuran minimal 5kb maksimal 200kb. 
                    <br/><br/>
                </div>


                <br/><br/>
                <div class="submit">
                    <input type="submit" value="Submit" onclick="saveArc();return false;"/>

                </div>
            </div>
        </div>
    </form>


</div>