<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>plus2net demo scripts using JQuery</title>
</head>
<script src="//ajax.googleapis.com/ajax/
libs/jquery/1.8.1/jquery.min.js"></script>
<body>
<script>
$(document).ready(function() {
////////////
$('#category').change(function(){
//var st=$('#category option:selected').text();
var cat_id=$('#category').val();
$('#sub-category').empty(); //remove all existing options
///////
$.get('ddck.php',{'cat_id':cat_id},function(return_data){
	if(return_data.data.length>0){
		$('#msg').html( return_data.data.length + ' records Found');
$.each(return_data.data, function(key,value){
		$("#sub-category").append("<option value='" + value.subcat_id +"'>"+value.subcategory+"</option>");
	});
	}else{
	$('#msg').html('No records Found');
}
}, "json");

///////
});
/////////////////////
});
</script>
<div id=msg> &nbsp;</div><br><br>
<form method=post action=dd-submit.php>
<select name=category id=category>
<option value='' selected>Select</option>
<?Php
require_once './config/config.php';
//require_once 'includes/auth_validate.php';

$dbo = getDbInstance();
//require "config.php";// connection to database 
$sql="SELECT DISTINCT course_code FROM course WHERE user='anand'"; // Query to collect data 
$cors = $db1->getValue('course','course_code',null);
foreach ($cors as $row) {
echo "<option value=$row>$row</option>";
}
echo "
</select>
<select name=sub-category id=sub-category>
</select>
<input type=submit value=Submit></form> <br><br>
<a href=dd1.php>dd1</a> | <a href=http://www.plus2net.com/jquery/dropdown-list-double.php> plus2net double dropdown list </a>
</body>
</html>
";
?>
