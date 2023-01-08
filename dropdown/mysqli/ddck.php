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
require "../config-mysqli.php";
$result = array();
if($stmt = $connection->prepare("select subcategory,subcat_id from dd2_subcategory where cat_id=?")){
 $stmt->bind_param('i',$cat_id);
 $stmt->execute();
 $stmt = $stmt->get_result();
 $no_of_records=$stmt->num_rows;
 while ($row = $stmt->fetch_assoc()) {
    $result[]=$row;
  }
}else{
  echo $connection->error;
}


$main = array('data'=>$result,'no_of_records'=>$no_of_records);
echo json_encode($main);
?>
