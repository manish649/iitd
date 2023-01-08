<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

$db1 = getDbInstance();

//Get Input data from query string
$search_string = filter_input(INPUT_GET, 'search_string');
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');

//Get current page.
$page = filter_input(INPUT_GET, 'page');
$select2 = filter_input(INPUT_GET, 'course_code');
$facultyId= $_SESSION['username'];

if (!$select2) {
$select2="null";
}

//$query=$db1->rawQueryValue('SELECT * from transactiondetail   WHERE facultyId=? ',Array($facultyId)); 
$query=$db1->rawQueryValue('SELECT * FROM transactiondetail'); 
//echo $db1->getlastquery();
//$query=$db1->rawQueryValue('SELECT DISTINCT course_code FROM quiz WHERE facultyId=? ',Array($facultyId)); 

//Per page limit for pagination.
$pagelimit = 70;

if (!$page) {
    $page = 1;
}

// If filter types are not selected we show latest created data first
if (!$filter_col) {
    $filter_col = "trans_date";
} 
if (!$order_by) {
    $order_by = "Desc";
}



//Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array( 'prog_category',
'payment_mode' ,
'bank_ref_no' ,
'trans_date' ,
'amount' ,
'status' ,
'participant_name' ,
'birth_date ' ,
'parti_category ' ,
'id_proof ' ,
'id_no ' ,
'prof_occu ',
'organization ' ,
'mobile_no ' ,
'email ' ,
'Installment ' ,
'fees ',
'remark ' 
);

//Start building query according to input parameters.
// If search string

if ($select2) 
{
   // $db->where('bank_ref_no', $select2);
   // $db->where('facultyID', $facultyId );
  //   $db->orwhere('name', '%' . $search_string . '%', 'like');
    
   // $db->where('course_code',$search_string );
    //$db->orwhere('facultyID', $facultyId);
}

//If order by option selected
if ($order_by)
{
    $db->orderBy($filter_col, 'desc');
}

//Set pagination limit
$db->pageLimit = $pagelimit;

//Get result of the query.
$customers = $db->arraybuilder()->paginate("transactiondetail", $page, $select);
$total_pages = $db->totalPages;

// get columns for order filter
foreach ($customers as $value) {
    foreach ($value as $col_name => $col_value) {
        $filter_options[$col_name] = $col_name;
    }
    //execute only once
    break;
}
include_once 'includes/header.php';
?>

<!--Main container start-->
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header">Fee Details</h1>
        </div>
       
    </div>
        <?php include('./includes/flash_messages.php') ?>
    <!--    Begin filter section-->
	
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search">Select Program</label>
			 
			<select name="course_code" class="form-control" onchange="this.form.submit()">
				<option value="">Select</option>
				  <?php
				 foreach ($query as $row) {
				   ($row===$select2) ? $selected = "selected" : $selected = "";
                    echo ' <option value="' . $row . '" ' . $selected . '>' . $row . '</option>';
                }
                ?>
            </select>
       </form>
    </div>
    
<!--   Filter section end-->
	<table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th class="header">#</th>
				<th>participant_name </th> 
				<th>id_no </th>
				<th>prog_category </th>
				<th>fees </th>
				<th>bank_ref_no </th> 
   				<th>trans_date </th> 
				<th>amount </th>
				<th>status </th>
				<th>Installment </th>
				<th>mobile_no </th> 
   				<th>email </th> 
   				

<!-- 
   <th>prog_category </th>
   <th>payment_mode </th> 
   <th>bank_ref_no </th> 
   <th>trans_date </th> 
   <th>amount </th> 
   <th>status </th> 
   <th>participant_name </th> 
   <th>birth_date </th> 
   <th>parti_category </th> 
   <th>id_proof </th> 
   <th>id_no </th> 
   <th>prof_occu </th>
   <th>organization </th> 
   <th>mobile_no </th> 
   <th>email </th> 
   <th>Installment </th> 
   <th>fees </th>
   <th>remark </th> 
			-->
   <th>Actions</th>
				
				<!--th>Edit Delete</th-->
            </tr>
        </thead>
        <tbody>
            <?php  $i=0;
			foreach ($customers as $row) : $i=$i+1; ?>
                <tr>
	                <td><?php echo $i ?></td>
					<td><?php echo htmlspecialchars($row['participant_name']) ?> </td>
					<td><?php echo htmlspecialchars($row['id_no']) ?> </td>
					<td><?php echo htmlspecialchars($row['prog_category']) ?></td>
					<td><?php echo htmlspecialchars($row['fees']) ?> </td>
					<td><?php echo htmlspecialchars($row['bank_ref_no']) ?></td>
					<td><?php echo htmlspecialchars($row['trans_date']) ?> </td> 
					<td><?php echo htmlspecialchars($row['amount']) ?> </td>
					<td><?php echo htmlspecialchars($row['status']) ?> </td>
					<td><?php echo htmlspecialchars($row['Installment']) ?> </td>
					<td><?php echo htmlspecialchars($row['mobile_no']) ?> </td>
					<td><?php echo htmlspecialchars($row['email']) ?> </td> 
		<!--
	                <td><?php echo htmlspecialchars($row['prog_category']) ?></td>
	                <td><?php echo htmlspecialchars($row['payment_mode']) ?></td>
					<td><?php echo htmlspecialchars($row['bank_ref_no']) ?></td>
					<td><?php echo htmlspecialchars($row['trans_date']) ?> </td>
					<td><?php echo htmlspecialchars($row['amount']) ?> </td>
					<td><?php echo htmlspecialchars($row['status']) ?> </td>
					<td><?php echo htmlspecialchars($row['participant_name']) ?> </td>
					<td><?php echo htmlspecialchars($row['birth_date']) ?> </td>
					<td><?php echo htmlspecialchars($row['parti_category']) ?> </td>
					<td><?php echo htmlspecialchars($row['id_proof']) ?> </td>
					<td><?php echo htmlspecialchars($row['id_no']) ?> </td>
					<td><?php echo htmlspecialchars($row['prof_occu']) ?> </td>
					<td><?php echo htmlspecialchars($row['organization']) ?> </td>
					<td><?php echo htmlspecialchars($row['mobile_no']) ?> </td>
					<td><?php echo htmlspecialchars($row['email']) ?> </td>
					<td><?php echo htmlspecialchars($row['Installment']) ?> </td>
					<td><?php echo htmlspecialchars($row['fees']) ?> </td>
					<td><?php echo htmlspecialchars($row['remark']) ?> </td>
		-->	
					<td>
					<a target="_blank" href="print_report.php?bank_ref_no=<?php echo $row['bank_ref_no'] ?>&operation=print" class="btn btn-primary" style="margin-right: 8px;"><span class="glyphicon glyphicon-print"></span>

					<a href=""  class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['bank_ref_no'] ?>" style="margin-right: 8px;"><span class="glyphicon glyphicon-envelope"></span>
					</td>
				</tr>
				
            <?php endforeach; ?>      
        </tbody>
    </table>


   
<!--    Pagination links-->
    <div class="text-center">

        <?php
        if (!empty($_GET)) {
            //we must unset $_GET[page] if previously built by http_build_query function
            unset($_GET['page']);
            //to keep the query sting parameters intact while navigating to next/prev page,
            $http_query = "?" . http_build_query($_GET);
        } else {
            $http_query = "?";
        }
        //Show pagination links
        if ($total_pages > 1) {
            echo '<ul class="pagination text-center">';
            for ($i = 1; $i <= $total_pages; $i++) {
                ($page == $i) ? $li_class = ' class="active"' : $li_class = "";
                echo '<li' . $li_class . '><a href="customers.php' . $http_query . '&page=' . $i . '">' . $i . '</a></li>';
            }
            echo '</ul></div>';
        }
        ?>
    </div>
    <!--    Pagination links end-->

</div>
<!--Main container end-->


<?php include_once './includes/footer.php'; ?>

