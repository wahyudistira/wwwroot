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
                                    <h3 class="box-title"><?php echo lang('menu_access_create'); ?></h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_menuaccess')); ?>
                                        <div class="form-group">
											<label class="col-sm-2 control-label">Name Group</label>
											<div class="col-sm-10">
											  <input list="groups" name="idsysgroup" placeholder="Masukan Nama Group" class="form-control">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-2 control-label">Name's Menu</label>
											<div class="col-sm-10">
											  <input list="menus" name="idsysmenu" placeholder="Masukan Nama menu" class="form-control">
											</div>
										</div>						
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="btn-group">
                                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                                                    <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                                                    <?php echo anchor('admin/sysmenuacces', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo form_close();?>
									<datalist id="groups">
										<?php foreach ($group->result() as $b) {
											echo "<option value='$b->name'>";
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
