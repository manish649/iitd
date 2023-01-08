<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

//Get Input data from query string
$search_string = filter_input(INPUT_GET, 'course_code');
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');

//Get current page.
$page = filter_input(INPUT_GET, 'page');
$select2 = "";
//$select2 = filter_input(INPUT_GET, 'course_code');
if(isset($_REQUEST['course_code'])){
$select2 = $_REQUEST['course_code'];
}
else{
	$select2="";
	
}
//echo "course_code==".$_REQUEST['course_code'];
$facultyId= $_SESSION['username'];

if ($select2==NULL) {
$select2="";
}
//Per page limit for pagination.
$pagelimit = 70;

if (!$page) {
    $page = 1;
}

$db = getDbInstance();
$select = array('roll_no', 'name', 'course_code','batch');

// If filter types are not selected we show latest created data first
/*
if (!$filter_col) {
$db->where('course_code',$search_string );
    $filter_col = "updated_on";
}
if ($filter_col=="course_code") {
   // $filter_col = "updated_on";
    $db->where('course_code',$search_string );
    $db->orwhere('facultyID', $_SESSION['username']);
	}
if ($filter_col=="roll_no") {
   // $filter_col = "updated_on";
    $db->where('roll_no',$search_string );
    $db->orwhere('facultyID', $_SESSION['username']);
	}
if (!$order_by) {
    $order_by = "Desc";
}
*/
//echo "filer_col".$filter_col;
//$facultyId= $_SESSION['username'];

//Get DB instance. i.e instance of MYSQLiDB Library

//Start building query according to input parameters.
// If search string


//If order by option selected


//Set pagination limit
$db->pageLimit = $pagelimit;
$db->where('course_code',$select2 );
$db->where('facultyID', $_SESSION['username']);
//Get result of the query.
//echo "course_code==".$select2;
$customers = $db->arraybuilder()->paginate("quiz", $page, $select);
//echo $db->getlastquery();
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
            <h1 class="page-header">Registed Students</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
	            <a href="add_customer.php?operation=create">
	            	<button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add new </button>
	            </a>
            </div>
        </div>
    </div>
        <?php include('./includes/flash_messages.php') ?>
    <!--    Begin filter section
	
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search">Search</label>
            <input type="text" class="form-control" id="input_search" name="search_string" value="<?php echo $search_string; ?>">
            <label for ="input_order">Order By</label>
            <select name="filter_col" class="form-control">

                <?php
                foreach ($filter_options as $option) {
                    ($filter_col === $option) ? $selected = "selected" : $selected = "";
                    echo ' <option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
                }
                ?>

            </select>

            <select name="order_by" class="form-control" id="input_order">

                <option value="Asc" <?php
                if ($order_by == 'Asc') {
                    echo "selected";
                }
                ?> >Asc</option>
                <option value="Desc" <?php
                if ($order_by == 'Desc') {
                    echo "selected";
                }
                ?>>Desc</option>
            </select>
            <input type="submit" value="Go" class="btn btn-primary">

        </form>
    </div>
<!--   Filter section end-->

<!-- filter begins -->
    <!--    Begin filter section-->
	<?php
	$sessionId= $_SESSION['username'];
	$db->where('user',$sessionId);
	$cors = $db->getValue('course','course_code',null);
	
	//echo $db->getlastquery();

	?>
	
    <div class="well text-center filter-form">
        <form class="form form-inline" method="post" action="">
            <label for="input_search">Select Course</label>
			 
			<select name="course_code" class="form-control" onchange="search()">
				<option value="">Select</option>
				
							
                <?php
				 foreach ($cors as $row) {
				 
    				  ($row===$select2) ? $selected = "selected" : $selected = "";
                
                    echo ' <option value="' . $row . '" ' . $selected . '>' . $row . '</option>';
                }
                ?>

            </select>
           
          

            <input type="submit" name="search" value="search" class="btn btn-primary">

        
    </div>
<!--   Filter section end-->


<!-- end filter -->

    <hr>

	                
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th class="header">S.No                         </th>
				
                <th>Roll No</th>
                <th>Name</th>
                <th>Course Code</th>
				<th>Batch</th>
				<th>Operations</th>
                
            </tr>
        </thead>
        <tbody>
            <?php  $i=0;
			if ($page>1) {
   
	$i=($page-1)*$pagelimit;
}
			foreach ($customers as $row) : 
			     $i=$i+1; 
				 


				 ?>
                <tr>
	                <td><?php echo $i ?></td>
					
	                <td><?php echo htmlspecialchars($row['roll_no']) ?></td>
	                <td><?php echo htmlspecialchars($row['name']) ?></td>
					<td><?php echo htmlspecialchars($row['course_code']) ?></td>
					<td><?php echo htmlspecialchars($row['batch']) ?></td>
	                <td>
					<!--
					<a href="edit_customer.php?customer_id=<?php echo $row['roll_no'] ?>&operation=edit" class="btn btn-primary" style="margin-right: 8px;"><span class="glyphicon glyphicon-edit"></span>
                     -->
					<a href=""  class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['roll_no'] ?>" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span></td>
				</tr>

						<!-- Delete Confirmation Modal-->
					 <div class="modal fade" id="confirm-delete-<?php echo $row['roll_no'] ?>" role="dialog">
					    <div class="modal-dialog">
					      <form action="delete_customer.php" method="POST">
					      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Confirm</h4>
						        </div>
						        <div class="modal-body">
						      
						        		<input type="hidden" name="del_id" id = "del_id" value="<?php echo $row['roll_no'] ?>">
						        	
						          <p>Are you sure you want to delete this customer?</p>
						        </div>
						        <div class="modal-footer">
						        	<button type="submit" class="btn btn-default pull-left">Yes</button>
						         	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						        </div>
						      </div>
					      </form>
					      
					    </div>
  					</div>
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
                echo '<li' . $li_class . '><a href="register_display.php' . $http_query . '&page=' . $i . '">' . $i . '</a></li>';
            }
            echo '</ul></div>';
        }
        ?>
    </div>
    <!--    Pagination links end-->

</div>
<!--Main container end-->


<?php include_once './includes/footer.php'; ?>

