<?php
session_start();
require_once './config/config.php';
//If User has already logged in, redirect to dashboard page.
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE) {
    header('Location:index.php');
}
$empid="";
$db1 = getDbInstance();
if (isset($_POST['empid'])) {
   $empid = $_POST['empid'];
}



$db1->where('user_name',$empid);
$cors = $db1->getValue('admin_accounts','user_name',1);
// if user is already registered
	if($cors !=""){
		
		echo "<script type='text/javascript'>
                alert('You are already Registered );
            </script>";
		header("Location: index.php");
		
	}
	// for new user
	else{
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
	$data_to_store = filter_input_array(INPUT_POST);
	$name = $data_to_store['name'];
	$empid = $data_to_store['empid'];
	$designation = $data_to_store['designation'];
	$dept = $data_to_store['dept'];
	$school = $data_to_store['school'];
	$email = $data_to_store['email'];
	$cabin = $data_to_store['cabin'];
	$intercom = $data_to_store['intercom'];
	$website = $data_to_store['website'];
	
	if(empty($errors)==true){ 
	//$db1 = getDbInstance();
    $last_id = $db1->insert ('registration', $data_to_store);
	//echo $db1->getlastquery();
	header('Location:login.php');
	
	}  //if 
	
	
	}  // if
	}  //else	

?>

<!DOCTYPE html>
	<head>
		<script>
			function forms() {
				var name =
					document.forms.RegForm.Name.value;
				var email =
					document.forms.RegForm.EMail.value;
				var phone =
					document.forms.RegForm.Telephone.value;
				var what =
					document.forms.RegForm.Subject.value;
				var password =
					document.forms.RegForm.Password.value;
				var address =
					document.forms.RegForm.Address.value;
				var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g; //Javascript reGex for Email Validation.
				var regPhone=/^\d{10}$/;									 // Javascript reGex for Phone Number validation.
				var regName = /\d+$/g;								 // Javascript reGex for Name validation

				if (name == "" || regName.test(name)) {
					window.alert("Please enter your name properly.");
					name.focus();
					return false;
				}

				if (address == "") {
					window.alert("Please enter your address.");
					address.focus();
					return false;
				}
				
				if (email == "" || !regEmail.test(email)) {
					window.alert("Please enter a valid e-mail address.");
					email.focus();
					return false;
				}
				
				
				if (phone == "" || !regPhone.test(phone)) {
					alert("Please enter valid phone number.");
					phone.focus();
					return false;
				}

				if (what.selectedIndex == -1) {
					alert("Please enter your course.");
					what.focus();
					return false;
				}

				return true;
			}
		</script>

		<style>
			div {
				box-sizing: border-box;
				width: 100%;
				border: 100px solid black;
				float: left;
				align-content: center;
				align-items: center;
			}

			form {
				margin: 0 auto;
				width: 600px;
			}
		</style>
	</head>

	<body>
		<h1 style="text-align: center;">REGISTRATION FORM</h1>
		<form name="RegForm" onsubmit="return forms()" method="post">
			
<p>Name: <input type="text"
							size="65" name="Name" /></p>

			<br />
			<p>
				Select Program
				<select type="text" value="" name="Subject">
					<option>A</option>
					<option>b</option>
					<option>C</option>
					<option>D</option>
					<option>E</option>
				</select>
			</p>
			
		
<p>E-mail Address: <input type="text"
							size="65" name="EMail" /></p>

			<br />
			
			
<p>Mobile No: <input type="number"size="65" name="Mobile no" /></p>

			<br />
			<p> Date of Transaction:<input type="date" id="date" name="date"></p><br/>
			<p>Amount: <input type="number"
						size="65" name="Amount" /></p>

			<br />
			<p>Transaction Id: <input type="number"
						size="65" name="Tranid" /></p>

			<br />

			<input type="reset"
					value="upload receipt" name="upload" />	
<p>


				<input type="submit"
					value="submit" name="Submit" />
				
			</p>

		</form>
	</body>
</html>


    

<?php include_once 'includes/footer.php'; ?>