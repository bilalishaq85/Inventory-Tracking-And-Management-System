<?php
switch($option){
	case 1:
		$myquery = "SELECT a.part_code, a.part_no, a.part_name, a.short_desc, a.long_desc, a.list_price,";
		$myquery.= " a.upc_no, a.industry_no, uic_no, sku_no,"; 
		$myquery.= " a.class_code, a.type_code, a.sub_cat_code,";
		$myquery.= " c.class_name, d.type_name, e.cat_name, e.sub_cat_id, e.sub_cat_name,";
		$myquery.= " a.dist_code";
		$myquery.= " FROM parts a, ";
		$myquery.= " classes c,"; 
		$myquery.= " types d,"; 
		$myquery.= " v_categories e";  
		$myquery.= " WHERE a.dist_code < 1";
		$myquery.= " AND a.active = 1";
		$myquery.= " AND a.class_code = c.class_code";
		$myquery.= " AND a.type_code = d.type_code";
		$myquery.= " AND a.sub_cat_code = e.sub_cat_code";
		$myquery.= " ORDER BY c.class_name, d.type_name, e.cat_name, e.sub_cat_id, part_no";
		break;
	case 2:
		$myquery = "SELECT a.part_code, a.part_no, a.part_name, a.short_desc, a.long_desc, a.list_price,";
		$myquery.= " a.upc_no, a.industry_no, uic_no, sku_no,"; 
		$myquery.= " a.class_code, a.type_code, a.sub_cat_code,";
		$myquery.= " c.class_name, d.type_name, e.cat_name, e.sub_cat_id, e.sub_cat_name,";
		$myquery.= " a.dist_code, b.assigned, b.catalog_code, b.catalog_detail_code";
		$myquery.= " FROM parts a, v_distributors_catalog b,";
		$myquery.= " classes c,"; 
		$myquery.= " types d,"; 
		$myquery.= " v_categories e";  
		$myquery.= " WHERE a.part_code = b.part_code";
		$myquery.= " AND   b.catalog_code = $catalog_code";
		$myquery.= " AND   b.assigned = 1";
		$myquery.= " AND a.active = 1";
		$myquery.= " AND a.class_code = c.class_code";
		$myquery.= " AND a.type_code = d.type_code";
		$myquery.= " AND a.sub_cat_code = e.sub_cat_code";
		$myquery.= " ORDER BY c.class_name, d.type_name, e.cat_name, e.sub_cat_id, part_no";	
		break;
	case 3:
		$myquery = "SELECT a.part_code, a.part_no, a.part_name, a.short_desc, a.long_desc, a.list_price,";
		$myquery.= " a.upc_no, a.industry_no, uic_no, sku_no,"; 
		$myquery.= " a.class_code, a.type_code, a.sub_cat_code,";
		$myquery.= " c.class_name, d.type_name, e.cat_name, e.sub_cat_id, e.sub_cat_name,";
		$myquery.= " a.dist_code, b.assigned, b.min_value, b.max_value";
		$myquery.= " FROM parts a, inventory_assignment b,";
		$myquery.= " classes c,"; 
		$myquery.= " types d,"; 
		$myquery.= " v_categories e";  
		$myquery.= " WHERE a.part_code = b.part_code";
		$myquery.= " AND   b.cust_code = $cust_code";
		$myquery.= " AND   b.assigned = 1";
		$myquery.= " AND a.active = 1";
		$myquery.= " AND a.class_code = c.class_code";
		$myquery.= " AND a.type_code = d.type_code";
		$myquery.= " AND a.sub_cat_code = e.sub_cat_code";
		$myquery.= " ORDER BY c.class_name, d.type_name, e.cat_name, e.sub_cat_id, part_no";	
		break;
}
?>