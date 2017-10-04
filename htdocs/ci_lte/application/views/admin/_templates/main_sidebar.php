<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <aside class="main-sidebar">
                <section class="sidebar">
<?php if ($admin_prefs['user_panel'] == TRUE): ?>
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $user_login['firstname'].$user_login['lastname']; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('menu_online'); ?></a>
                        </div>
                    </div>

<?php endif; ?>
<?php if ($admin_prefs['sidebar_form'] == TRUE): ?>
                    <!-- Search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="<?php echo lang('menu_search'); ?>...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

<?php endif; ?>
                    <!-- Sidebar menu -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo site_url('/'); ?>">
                                <i class="fa fa-home text-primary"></i> <span><?php echo lang('menu_access_website'); ?></span>
                            </a>
                        </li>
                        <li class="header text-uppercase"><?php echo lang('menu_main_navigation'); ?></li>
                       
			<?php
				$sql = "SELECT * FROM vw_menulvl0 WHERE true";
				$mnParent = $this->db->query($sql);							
				foreach ($mnParent->result() as $menu) { 
				$qry = "SELECT * FROM vw_menulvl1 WHERE parent_id='".$menu->id."'";
				$mnleve11 = $this->db->query($qry);
					if($menu->is_treeview==1){
						echo '	<li class=treeview '.active_link_controller($menu->activelink).'>';
						echo '	    <a href="'.$menu->url.'">';
						echo '		  <i class="'.$menu->icon.'"></i>';
						echo '		  	<span>'.lang($menu->lang).'</span>';
						echo ' 	      <i class="fa fa-angle-left pull-right"></i>';
						echo '		</a>';
						echo '		<ul class="treeview-menu">';
						echo '		<li>';
						foreach($mnleve11->result() as $level1){														
						$url = '#';
						echo '			<a href="'.(($level1->url== $url)?'#':site_url($level1->url)).'">';
						echo '				<i class="'.$level1->icon.'"></i> <span>'. lang($level1->lang).'</span>';
						echo ' 	      		<i class="'.(($level1->url==$url)?'fa fa-angle-left pull-right':'').'"></i>';	
						echo '			</a>';								
							$qry = "SELECT * FROM vw_menulvl2 WHERE parent_id='".$level1->id."'";
							$mnleve12 = $this->db->query($qry);
							foreach($mnleve12->result() as $level2 ){
								echo '	<ul class="treeview-menu">';
								echo '	  <li>';
								echo '      <a href="'.site_url($level2->url).'">';
								echo '        <span>'. lang($level2->lang).'</span>';
								echo '      </a>';
								echo '    </li>';
								echo '	</ul>';
							}
						}	
						echo '		</li>';	
						echo '		</ul>';							
						echo '  </li> ';
					}else{
						echo '<li class="'.active_link_controller($menu->activelink).'"> ';
						echo ' <a href="'.site_url($menu->url).'">';
						echo '  <i class="'.$menu->icon.'"></i> <span>'. lang($menu->lang).'</span>';
						echo " </a>";
						echo "</li>";						
					}					
				}			
			?>
                    </ul>
                </section>
            </aside>
			
			
			
			
			
			
			

				<?php
						// $sql = "SELECT * FROM vw_menulvl0 where status=12";
						// $menuParent = $this->db->query($sql);							
						// foreach ($menuParent->result() as $menu) {  	
						// $query = "SELECT * FROM vw_menulvl1 WHERE parent_id='".$menu->id."'";
						// $menuLvl1 = $this->db->query($query);		
							// if($menu->is_treeview==1){
								// echo '	<li class=treeview '.active_link_controller($menu->activelink).'>';
								// echo '	<a href="#">';
								// echo '		<i class="'.$menu->icon.'"></i>';
								// echo '		<span>'.lang($menu->lang).'</span>';
								// echo '		<i class="fa fa-angle-left pull-right"></i>';
								// echo '	</a>';			
								// foreach($menuLvl1->result() as $lvl1){
									// $query = "SELECT * FROM vw_menulvl2 WHERE parent_id='".$lvl1->id."'";
									// $menulvl2 = $this->db->query($query);
									// echo '	<ul class="treeview-menu">';
									// echo '	 <li class="'.active_link_function($lvl1->activelink).'">';
									// echo '    <a href="'.site_url($lvl1->url).'">';
									// echo '    <i class="'.$lvl1->icon.'"></i> <span>'. lang($lvl1->lang).'</span>';
									// echo '	  </a>';
									// echo '   </li>';
									// echo '  </ul>';										
								// }			
								// echo ' </li>';
							// }else{
								// echo '<li class="'.active_link_controller($menu->activelink).'"> ';
								// echo ' <a href="'.site_url($menu->url).'">';
								// echo '  <i class="'.$menu->icon.'"></i> <span>'. lang($menu->lang).'</span>';
								// echo " </a>";
								// echo "</li>";								
							// }	
						// }
					?>			
