<?php

class model_account extends ci_model{
	function Alldata()
		{
			$query= "SELECT year,purchase,sale,profit
					FROM account
					WHERE true";
			return $this->db->query($query);
		}
}