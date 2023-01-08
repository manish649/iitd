<fieldset>
<!--
    <div class="form-group">
        <label for="f_name">School</label>
         <select name="school"class="form-control">
				<option value="set">School of Engineering and Technology</option>
				<option value="sbs">School of Business Studies</option>
				<option value="sap">School of Architecture & Planning</option>
				<option value="scadms">School of Creative Art,Design and Media Studies</option>
				<option value="sol">School of Law</option>
				<option value="solc">School of Languages & Culture</option>
				<option value="sds">School of Dental Sciences</option>
				
		 </select>
	</div> 

				
    <div class="form-group">
        <label for="l_name">Program</label>
		<?php $prog_arr = array("Btech","Mtech","BCA","MCA","Phd"); 
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
				<option value="sem1">Semister 1</option>
				<option value="sem2">Semister 2</option>
				<option value="sem3">Semister 3</option>
				<option value="sem4">Semister 4</option>
				<option value="sem5">Semister 5</option>
				<option value="sem6">Semister 6</option>
				<option value="sem7">Semister 7</option>
				<option value="sem8">Semister 8</option>
				<option value="sem9">Semister 9</option>
				<option value="sem10">Semister 10</option>

		 </select>
	</div>

    <div class="form-group">
        <label for="address">Section</label>
         <select name="batch"class="form-control">
				<option value="batch_a">Batch A</option>
				<option value="batch_b">Batch B</option>
				<option value="batch_c">Batch C</option>
				<option value="batch_d">Batch D</option>
				<option value="batch_e">Batch E</option>
				<option value="batch_f">Batch F</option>
				<option value="batch_g">Batch G</option>
				<option value="batch_h">Batch H</option>
				<option value="batch_i">Batch I</option>
				<option value="batch_j">Batch J</option>
				
				
		 </select>
	</div> 
    
    <div class="form-group">
        <label>Quiz No </label>
           
           <select name="quiz_no" class="form-control">
				<option value="quiz1">Quiz 1</option>
				<option value="quiz1">Quiz 2</option>
				<option value="quiz1">Quiz 3</option>
				<option value="quiz1">Quiz 4</option>
				<option value="quiz1">Quiz 5</option>
				<option value="quiz1">Quiz 6</option>
				<option value="quiz1">Quiz 7</option>
				<option value="quiz1">Quiz 8</option>
				<option value="quiz1">Quiz 9</option>
				<option value="quiz1">Quiz 10</option>
			</select>
    </div>  
    <div class="form-group">
        <label for="course_code">Course Code</label>
            <input  type="text" name="course_code" value="" placeholder="example CSE213 or MCA314" class="form-control" >
	</div>
	-->
	<div class=" col-sm-12" >
	<br>
		<div class=" col-sm-12 form-group" >
			<label class="col-sm-4" for="input_search">Select Course</label>
			 <div class="col-sm-6" >
			<select name="course_code" id="course" class="form-control" onchange="this.form.submit()">
				<option value="">Select</option>
				
							
                <?php
				 foreach ($cors as $row) {
				 
    				  ($row===$select2) ? $selected = "selected" : $selected = "";
                
                    echo ' <option value="' . $row . '" data-price='. $row ."  ". $selected . '>' . $row . '</option>';
                }
                ?>

            </select>
			</div>
    </div>
         <!--   <input type="submit" name="search" value="search" class="btn btn-primary"> 
		 
		 -->
<div>
	<!--
	<div class="form-group">
        <label for="school">School</label>
            <input  type="text" id="school" name="school" value=""  class="form-control" >
	</div>
	
	<div class="form-group">
        <label for="Program">Program</label>
            <input  type="text" name="Program" value="<?php echo $program ?>"  class="form-control" >
	</div>
	
	<div class="form-group">
        <label for="course">Course</label>
            <input  type="text" name="course" value=<?php echo $course ?>  class="form-control" >
	</div>

	<div class="form-group">
        <label for="sem">Semister</label>
            <input  type="text" name="sem" value=<?php echo $sem ?>  class="form-control" >
	</div>

	<div class="form-group">
        <label for="section">Section / Batch</label>
            <input  type="text" name="section" value=<?php echo $section ?>  class="form-control" >
	</div>

	-->

	<!--		<div class="col-sm-12 " style=" border-radius: 5px; background: #63ca63;
    padding: 10px; margin-top =25px">
      -->
	  <div class=" col-sm-12  form-group" >
	   
			   <div class="col-sm-4">
                <b>Program: </div>
				<div class="col-sm-6">
				<?php echo $prog ?></b>
				</div>
				</div>
				
				<div class="col-sm-12 form-group"> 
				<div class="col-sm-4">
                <b>Semister:
				</div>
				<div class="col-sm-6">
				<?php echo $sem ?></b>
				</div>
               </div>
	</div>
			   	
	<div class="col-sm-12 form-group"> 
		<div class="col-sm-4"> 		
        <label  for="address">Section: </label>
		</div>
		<div class="col-sm-6">
				<select  name="batch"class="form-control">
				<option value="batch_a"> </option>
				<option value="batch_a">Batch A</option>
				<option value="batch_b">Batch B</option>
				<option value="batch_c">Batch C</option>
				<option value="batch_d">Batch D</option>
				<option value="batch_e">Batch E</option>
				<option value="batch_f">Batch F</option>
				<option value="batch_g">Batch G</option>
				<option value="batch_h">Batch H</option>
				<option value="batch_i">Batch I</option>
				<option value="batch_j">Batch J</option>
			</select>
		 </div>
	
               <!-- <b>section: <!--?php echo $section ?></b>   
			   -->
               </div>
				<div class="col-sm-12 form-group"> 
				<div class="col-sm-4"> 
				<b>Course code:</div><div class="col-sm-6">  <?php echo $course_code ?></b>
				</div>
				</div>
				<div class="col-sm-12 form-group"> 
				<div class="col-sm-4">
				<b>Course Name:</div><div class="col-sm-8"> <?php echo $course_name ?></b>
				</div>
			</div>

<div class="col-sm-12 form-group"> 
    <div class="col-sm-4">
        <label for="phone">Browse Excel File</label>
		</div>
		<div class="col-sm-6">
          <input type="file" name="image"  class="form-control" id="file">
		  </div>
    </div> 

    
    <div class="form-group text-center">
        <label></label>
        <button type="submit" name="upload" value="upload" class="btn btn-warning ">Upload <span class="glyphicon glyphicon-send"></span></button>
    </div>    
</div>	
</fieldset>