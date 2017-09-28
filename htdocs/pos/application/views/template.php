<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>POS - Point Of Sale</title>
	
		<!-- Bootstrap Styles-->
    <link href="<?php echo base_url() ?>/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="<?php echo base_url() ?>/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
   <link href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
   <link href="<?php echo base_url() ?>/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
   
        <!-- Custom Styles-->
    <link href="<?php echo base_url() ?>/assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="<?php echo base_url() ?>/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	
	<!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="<?php echo base_url() ?>/assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>
	
	
	<script src="<?php echo base_url() ?>/assets/js/bootstrap-datetimepicker.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/locales/bootstrap-datetimepicker.fr.js"></script>
	
	
    <!-- Metis Menu Js -->
    <script src="<?php echo base_url() ?>/assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url() ?>/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <!-- Morris Chart Js -->
    <script src="<?php echo base_url() ?>/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/morris/morris.js"></script>
	
	
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>">Point Of Sale</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="<?php echo base_url().'auth/logout'?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'kategori'?>"><i class="fa fa-desktop"></i> Kategori Barang</a>
                    </li>
					<li>
                        <a href="<?php echo base_url().'barang'?>"><i class="fa fa-bar-chart-o"></i> Data Barang</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'operator'?>"><i class="fa fa-qrcode"></i> Operator Sistem</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'transaksi'?>"><i class="fa fa-edit"></i> Transaksi </a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Laporan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url().'transaksi/laporan'?>">Laoran Default</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'transaksi/excel'?>">Laporan Excel</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'transaksi/pdf'?>" target="_blank">Laporan PDF</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'auth/logout'?>"><i class="fa fa-fw fa-file"></i> Keluar</a>
                    </li>
					
					<li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
					
					
					<?php
                        // data main menu
                        $main_menu = $this->db->get_where('dynamic_menu', array('level' => 0));
                        foreach ($main_menu->result() as $main) {
                            // Query untuk mencari data sub menu
							$sql = "select * from dynamic_menu where parent_id='".$main->id."' order by id, parent_id";
                            // $sub_menu = $this->db->get_where('dynamic_menu', array('id' => $main->parent_id))->order_by(array('id','parent_id'),'ASC');
							$sub_menu = $this->db->query($sql);
                            // periksa apakah ada sub menu
                            if ($sub_menu->num_rows() > 0) {
                                // main menu dengan sub menu
								// var_dump($sql);exit;
                                echo "<li class='treeview'>" . anchor($main->url, '<i class="' . $main->icon . '"></i>' . $main->title .
                                        '<span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>');
                                // sub menu nya disini
                                echo "<ul class='treeview-menu'>";
                                foreach ($sub_menu->result() as $sub) {
                                    echo "<li>" . anchor($sub->url, '<i class="' . $sub->icon . '"></i>' . $sub->title) . "</li>";
                                }
                                echo"</ul></li>";
                            } else {
                                // main menu tanpa sub menu
                                echo "<li>" . anchor($main->url, '<i class="' . $main->icon . '"></i>' . $main->title) . "</li>";
                            }
                        }
                    ?>
					
					
					
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                    <?php echo $contents; ?>
            </div>
            <!-- /. PAGE INNER  -->
            <footer><p>Website : <a href="https://mim3o.blogspot.co.id" target="_blank">ROen's Heart</a></p></footer>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
	
	<script type="text/javascript">
		$('.form_datetime').datetimepicker({
			//language:  'eng',
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			forceParse: 0,
			showMeridian: 1
		});
		$('.form_date').datetimepicker({
			language:  'eng',
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0
		});
		$('.form_time').datetimepicker({
			language:  'eng',
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 1,
			minView: 0,
			maxView: 1,
			forceParse: 0
		});
	</script>
    
   
</body>
</html>