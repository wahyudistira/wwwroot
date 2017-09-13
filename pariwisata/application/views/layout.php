<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->load->view('header');?>

</head>
<body>

<div id="main_container">

	<div class="header">

       <div class="top_right">
       
            <div class="big_banner">
            <a href="index.php"><img src="images/header.png" alt="" title="" border="0" /></a>
         </div>
        
        </div>
    
  
        <div id="logo"><a href="index.php"><img src="images/logo2.png" alt="" title="" border="0" width="223" height="85" /></a></div>
    
	</div>
    
	<div id="main_content"> 
   
        <div id="menu_tab">
            <ul class="menu">
                <li><a href="index.php" class="nav">Home</a></li>
                <li class="divider"></li>
                <li></li>
                <li class="divider"></li>
                <li><a href="kirim.php" class="nav">Kirim Artikel</a></li>
                <li class="divider"></li>
               
                <li>
					
				</li>
				<li class="divider"></li>
                
            </ul>
		</div><!-- end of menu tab -->
            
		<div class="crumb_navigation">
			Navigation: <span class="current">Home</span>
		</div>        
    
		<div class="left_content">
			<div class="title_box">Kategori</div>
				<br />
<div class="title_box">Pengunjung</div><br/>
			<div align="center"></div>
			
		</div><!-- end of left content --> 

		<div class="center_content">
	
	
		</div><!-- end of center content -->


		<div class="right_content">
			
			
			
			<div class="title_box">5 Artikel Terbaru</div>
		   	
                        <br/>
		 <div class="title_box">Buku Tamu</div><br/>
                 <div class="bukutamu">
                 <table width="178" border="0" cellpadding="0" cellspacing="0">
                                   
                                </table>
                   <form method="post" action="aksi/bukutamu.php">
                            <table width="100" border="0" cellpadding="0" cellspacing="0">
                            <tr><td width="78" ><div style="font-size:12px">nama </div></td>
                                <td>: </td><td> <input name="nama" type="text" size="10" maxlength="50"value="<?php echo $_SESSION['nama'];?>"></td>
                             </tr>
                            <tr> <td><div style="font-size:12px">email</div></td>
                            <td>: </td><td> <input name="email" type="text" size="10" maxlength="50" value="<?php echo $_SESSION['email'];?>"></td>
                            </tr>
                            <tr> <td><div style="font-size:12px">komentar </div></td>
                            <td>: </td><td> <textarea name="komentar" cols="14" rows="2"></textarea></td>
                            </tr>
                
                            <tr> <td></td><td></td> <td><input type="submit" name="submit" value="kirim"></td>

                            </tr>
                            </table>
                            <hr>
                                
                        </form>
                 </div>
		 
		</div><!-- end of right content -->   
      
	</div><!-- end of main content -->
   
	<div class="footer">
	    <div class="left_footer">
			<img src="images/logo2.png" alt="" title="" width="198" height="42"/>
		</div>
        
        <div class="center_footer">
			<a href="index.php">A-yo Belajar</a>
			<br />
			All Rights Reserved 2011<br />
        </div>
        
        <div class="right_footer">
			Design 'n Development by<a href="http://bahrie27.wordpress.com">Bahrie</a>
        </div>   
   
	</div>                


</div>
<!-- end of main_container -->
</body>
</html>
