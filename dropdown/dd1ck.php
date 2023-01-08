<?Php
error_reporting(0);// With this no error reporting will be there
@$cat_id=$_GET['cat_id'];
//$cat_id=2;
/// Preventing injection attack //// 
if(!is_numeric($cat_id)){
echo "Data Error";
exit;
 }
/// end of checking injection attack ////
require "config.php";

$no_of_records = $dbo->query("select count(cat_id) from  dd2_subcategory where cat_id='$cat_id'")->fetchColumn();

if($no_of_records >=1){
$sql="select subcategory,subcat_id from dd2_subcategory where cat_id='$cat_id'";
$row=$dbo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);
}else{
$result='';
}

$main = array('data'=>$result,'no_of_records'=>$no_of_records);
echo json_encode($main);
?>
