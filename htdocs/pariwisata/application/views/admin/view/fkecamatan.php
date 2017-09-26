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
        <li><a href="#"><img src="<?php echo base_url(); ?>img/icons/menu/black-layout.png" alt="" /> Master</a>
            <ul>

                <li><a href="<?php echo base_url(); ?>index.php/mas/addkategori">Kategori</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/mas/addkecamatan">Kecamatan</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/mas/addwisata">Wisata</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/mas/adduser">User</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/adm/setadmin">Setting Admin</a></li>
            </ul>
        </li>
        <li class="current"><a href="#"><img src="<?php echo base_url(); ?>img/icons/menu/black-layout.png" alt="" /> Posting</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>index.php/adm/kategori">Kategori</a></li>
                <li class="current"><a href="<?php echo base_url(); ?>index.php/adm/kecamatan">Kecamatan</a></li>
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
    <h1><img src="<?php echo base_url(); ?>img/icons/posts.png" alt="" />Data Kecamatan</h1>

    <div class="bloc">


        <div class="title">
            Data input Kecamatan
        </div>
        <div class="content">
            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kecamatan</th>



                        <th>Edit</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 0;
                    foreach ($data as $row): $i++; ?>
                        <tr>

                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row->nama; ?></td>

                            <td class="actions"><a href="<?php echo base_url(); ?>index.php/edit/editkecamatan/edit/<?php echo $row->id; ?>" title="Edit this content"><img src="<?php echo base_url(); ?>img/icons/edit.png" alt="Edit" /></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>


            <div class="pagination">


            </div>
        </div>
    </div>
</div>


