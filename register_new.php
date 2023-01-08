<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_store = filter_input_array(INPUT_POST);
	$empid = $data_to_store['empid'];
	$name=$data_to_store['name'];
	$qualification = $data_to_store['qualification'];
	$desig = $data_to_store['desig'];
	$dept = $data_to_store['dept'];
	$school = $data_to_store['school'];
	$email = $data_to_store['email'];
	$cabin = $data_to_store['cabin'];
	$intercom = $data_to_store['intercom'];
	$website = $data_to_store['website'];
	
	
	if(empty($errors)==true){ 
	$db1 = getDbInstance();
    $last_id = $db1->insert ('registration', $data_to_store);
	echo $db1->getlastquery();
	}
}
	?>