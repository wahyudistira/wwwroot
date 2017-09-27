                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            POS (Point of Sale) <small>Laporan Transaksi</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
<?php
$tgl1 ="";
$tgl2 ="";
if(count($record->result()) > 1){	
	$rec = $record->result();
	$tgl1 = $rec[0]->tgl1;
	$tgl2 = $rec[0]->tgl2;
}
?>				
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('transaksi/laporan', array('class'=>'form-inline')); ?>
                                    <div class="form-group">
                                        
										<div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
											<label for="exampleInputName2">Tanggal</label>
											<input size="16" type="text" name="tanggal1" class="form-control" placeholder="Tanggal Mulai" readonly value=<?php echo $tgl1 ?> >
											<span class="add-on"><i class="icon-remove"></i></span>
											<span class="add-on"><i class="icon-th"></i></span>
										</div>
										
                                    </div>
                                    <div class="form-group">
                                       
                                       <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
											<label for="exampleInputEmail2"> - </label> 
											<input size="16" type="text" name="tanggal2" class="form-control" placeholder="Tanggal Mulai" readonly value=<?php echo $tgl2; ?> >
											<span class="add-on"><i class="icon-remove"></i></span>
											<span class="add-on"><i class="icon-th"></i></span>
											<label class="control-label">Date Picking</label>
										</div>
										
                
                                    </div>
                                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Tampilkan</button>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>


                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Operator</th>
                                                <th>Total Transaksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; $total=0; foreach ($record->result() as $r){ ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->tanggal_transaksi ?></td>
                                                <td><?php echo $r->nama_lengkap ?></td>
                                                <td><?php echo $r->total ?></td>
                                            </tr>
                                        <?php $no++; $total=$total+$r->total; } ?>
                                            <tr>
                                                <td colspan="3">Total</td>
                                                <td><?php echo $total;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /. TABLE  -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->