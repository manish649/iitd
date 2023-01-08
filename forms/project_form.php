<fieldset>
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

<div class=" col-sm-12  form-group" >
	   
			   <div class="col-sm-4">
                <b>Program: </div>
				<div class="col-sm-8">
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
	
			   	
	<div class="col-sm-12 form-group"> 
		<div class="col-sm-4"> 		
        <label  for="address">Section: </label>
		</div>
		<div class="col-sm-6">
				<select  name="batch"class="form-control">
				<?php 
				
				 foreach ($batchr as $row3) {
				 
    				  ($row3===$select2) ? $selected = "selected" : $selected = "";
                
                    echo ' <option value="' . $row3 . '" data-price='. $row3 ."  ". $selected . '>' . $row3 . '</option>';
                }
				?>
				
			</select>
		 </div>
	
               
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
        <label  for="address">Project Evaluation: </label>
		</div>
		<div class="col-sm-6">
    <select name="proj_no" class="form-control"  >
				<option value="proj1">Project Evaluation 1</option>
				<option value="proj2">Project Evaluation 2</option>
				<option value="proj3">Project Evaluation 3</option>
				<option value="proj4">Project Evaluation 4</option>
				<option value="proj5">Project Evaluation 5</option>
				
				
			</select>
			</div>
			</div>
<div class="col-sm-12 form-group"> 
    <div class="col-sm-4">
        <label for="file">Browse Excel File</label>
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
 
