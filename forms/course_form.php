<fieldset>
<div class="form-group">
        <label for="school">School</label>
       <select name="school"class="form-control">
				<option value="School of Engineering and Technology">School of Engineering & Technology</option>
				<option value="School of Dental Science">School of Dental Science </option>
				<option value="School of Management Studies">School of Management Studies</option>
				

		 </select>
	</div>
<div class="form-group">
        <label for="l_name">Program</label>
		<?php $prog_arr = array("Bachelor of Technology","Master of Technology","Bachelor of Computer Application","Master of Computer Application","Phd"); 
                            ?>
            <select name="prog" class="form-control selectpicker" required>
                
                <?php
                foreach ($prog_arr as $opt) {
                    if ($edit && $opt == $customer['state']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }
                ?>
				</select>
	</div> 

    <div class="form-group">
        <label for="sem">Semister</label>
       <select name="sem"class="form-control">
				<option value="Semister 1">Semister 1</option>
				<option value="Semister 2">Semister 2</option>
				<option value="Semister 3">Semister 3</option>
				<option value="Semister 4">Semister 4</option>
				<option value="Semister 5">Semister 5</option>
				<option value="Semister 6">Semister 6</option>
				<option value="Semister 7">Semister 7</option>
				<option value="Semister 8">Semister 8</option>
				<option value="Semister 9">Semister 9</option>
				<option value="Semister 10">Semister 10</option>

		 </select>
	</div>
<!--	
	<div class="form-group">
        <label for="course_code">Section/Batch</label>
            <input  type="text" name="section" value="" pl9aceholder="example CSE213 or MCA314" class="form-control" >
	</div>
-->
    <div class="form-group">
        <label for="course_code">Course Code</label>
            <input  type="text" name="course_code" value="" placeholder="example CSE213 or MCA314" class="form-control" >
	</div>
				
    <div class="form-group">
        <label for="course_name">Course Name</label>
            <input  type="text" name="course_name" value="" placeholder="example CSE213 or MCA314" class="form-control" >
	</div>

    <div class="form-group">
        <label for="course_desc">Course Objective</label>
		<textarea style="height:50px;" name="course_desc" class="form-control"></textarea>
      
	</div>

    <div class="form-group">
        <label for="co1">CO1</label>
        <input type="text" name="co1" class="form-control"> 
	</div> 
	<div class="form-group">
        <label for="co2">CO2</label>
        <input type="text" name="co2" class="form-control"> 
	</div> 
	<div class="form-group">
        <label for="co3">CO3</label>
        <input type="text" name="co3" class="form-control"> 
	</div> 
	<div class="form-group">
        <label for="co4">CO4</label>
        <input type="text" name="co4" class="form-control"> 
	</div> 
	<div class="form-group">
        <label for="co5">CO5</label>
        <input type="text" name="co5" class="form-control"> 
	</div> 
	<div class="form-group">
        <label for="co6">CO6</label>
        <input type="text" name="co6" class="form-control"> 
	</div> 

    <div class="form-group text-center">
        <label></label>
        <button type="submit" value="submit" class="btn btn-warning" >Submit <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>