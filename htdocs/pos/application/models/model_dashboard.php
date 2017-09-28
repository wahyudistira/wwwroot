<?php
class model_dashboard extends ci_model
{
	function dailytransaction(){
		$sql = "
				select 	CASE WHEN sum(qty*harga) is null THEN 
						0
					ELSE
						sum(qty*harga)
					END as total
				from transaksi_detail td 
					INNER JOIN transaksi tr ON tr.transaksi_id = td.transaksi_id
				WHERE 
					DATE_FORMAT(tanggal_transaksi ,'%Y')= DATE_FORMAT(NOW(),'%Y') AND 
					DATE_FORMAT(tanggal_transaksi ,'%m')= DATE_FORMAT(NOW(),'%m')
					";
		
		// $sql ="call reportCashMonhtly(@total)";
		// $sql ="SELECT @total AS total;";
		
		return $this->db->query($sql);
	}
	
		function barngsepuluhbesar(){
			$Sql  ="SELECT
						td.barang_id, upper(br.nama_barang) AS nama_barang, COUNT(td.barang_id) AS jml
					FROM  transaksi_detail td, barang br
					WHERE TRUE 
						AND	td.barang_id = br.barang_id
					GROUP BY td.barang_id
					limit 5;"; // HAVING COUNT(td.barang_id) > 3
			return $this->db->query($Sql);	
	
	
		}
}