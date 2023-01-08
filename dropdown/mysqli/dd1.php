<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>plus2net demo scripts using JQuery</title>
</head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<body>
<script>
$(document).ready(function() {
////////////
$('#t1').hide();
$('#category').change(function(){
//var st=$('#category option:selected').text();
var cat_id=$('#category').val();
$('#sub-category').empty(); //remove all existing options
///////
$.get('ddck.php',{'cat_id':cat_id},function(return_data){
$('#msg').text(" Number of Records found :"+return_data.no_of_records);
if(return_data.no_of_records>=1){
$('#t1').hide();
$('#sub-category').show();
$.each(return_data.data, function(key,value){
		$("#sub-category").append("<option value='" + value.subcat_id +"'>"+value.subcategory+"</option>");
	});
}else{
/// add text box and hide 2nd subcategory 
$('#sub-category').hide();
$('#t1').show();
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
require "../config-mysqli.php";// connection to database 
$sql="select * from dd2_category "; // Query to collect data 

if($stmt = $connection->query($sql)){

  echo "No of records : ".$stmt->num_rows."<br>";

  while ($row = $stmt->fetch_assoc()) {
echo "<option value=$row[cat_id]>$row[category]</option>";
 }
}else{
echo $connection->error;
}
echo "</select>
<select name=sub-category id=sub-category>
</select> <input type=text name=t1 id=t1>
<input type=submit value=Submit></form><br><br>
<a href=dd.php>dd</a> | <a href=http://www.plus2net.com/jquery/dropdown-list-double.php> plus2net double dropdown list </a>


</body>
</html>
";