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
		
		$sql ="call reportCashMonhtly(@total)";
		$sql ="SELECT @total AS total;";
		return $this->db->query($sql);
	}
}