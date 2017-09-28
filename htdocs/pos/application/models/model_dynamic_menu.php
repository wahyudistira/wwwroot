<?php
class model_dynamic_menu extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT a.ID, a.title, COALESCE(b.title,'-') AS 'ParentName', b.url
					FROM 
						dynamic_menu AS a LEFT JOIN dynamic_menu AS b on a.Parent_ID = b.ID";
        return $this->db->query($query);
    }
    
}