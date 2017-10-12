<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo lang('menu_access_edit'); ?></h3>
                                </div>
                                <div class="box-body">
                                    <?php echo ''; //$message;?>

                                    <?php echo form_open(uri_string(), array('class' => 'form-horizontal', 'id' => 'form-edit_menuaccess')); ?>
                                        <div class="form-group">
											<label class="col-sm-2 control-label">Name Group</label>
											<div class="col-sm-10">
											  <input list="groups" name="idsysgroup" placeholder="Masukan Nama Group" class="form-control" value=<?php echo $menuaccess[0]->group_name;?> disabled>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-2 control-label">Name's Menu</label>
											<div class="col-sm-10">
											  <input list="menus" name="idsysmenu" placeholder="Masukan Nama menu" class="form-control" value=<?php echo $menuaccess[0]->menu_name;?> >
											</div>
										</div>		
				

										

										
												
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="btn-group">
                                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                                                    <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                                                    <?php echo anchor('admin/sysmenuaccess', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo form_close();?>
										<datalist id="groups">
										<?php foreach ($group->result() as $b) {
											if($menuaccess[0]->group_name != $b->name){
													echo "<option value='$b->name'>";
											}else{echo "<option value='$b->name' selected>";}
																					
										} ?>
										
									</datalist>
									<datalist id="menus">
										<?php foreach ($menus->result() as $c) {
											echo "<option value='$c->menu_name'>";
										} ?>
									</datalist>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>