
<?php $this->load->view('admin/view/floginkec'); ?>

<!--            
        SIDEBAR
--> 
<div id="sidebar">
    <ul>
        <li class="nosubmenu current">
            <a href="<?php echo base_url(); ?>index.php/adminkec/dashbor">
                <img src="<?php echo base_url(); ?>img/icons/menu/black-dashboard.png" alt="" />
                Dashboard
            </a>
        </li>
        <li><a href="#"><img src="<?php echo base_url(); ?>img/icons/menu/black-layout.png" alt="" /> Master</a>
            <ul>
                
                <li><a href="<?php echo base_url(); ?>index.php/adminkec/masterwisata">Wisata</a></li>
               
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

    <h1><img src="<?php echo base_url(); ?>img/icons/chart.png" alt="" />Dashboard</h1>

    <div class="bloc">
        <div class="title">
            Jumlah Pengujung Per Tanggal
            <div class="tabs">
                <a href="#area">Area</a>

                <a href="#bar">Bar</a>
            </div>

        </div>
        <div class="content" id="area">
            <table class="graph type-line">
                <caption>Kunjungan Per Tanggal</caption> 
                <thead> 
                    <tr> 
                        <td></td>
                        
                        
                    </tr> 
                </thead> 
                <tbody> 
                    <tr> 
                        <th scope="row">Pengujung</th> 
                        


                    </tr> 

                </tbody> 
            </table>

        </div>

        <div class="content" id="bar">
            <table class="graph type-bar">
                <caption>Pengunjung</caption> 
                <thead> 
                    <tr> 
                        <td></td> 
                       
                    </tr> 
                </thead> 
                <tbody> 
                    <tr> 
                        <th scope="row">Pengujung</th> 
                       
                    </tr> 	
                </tbody> 
            </table>

        </div>
    </div>
</div>
