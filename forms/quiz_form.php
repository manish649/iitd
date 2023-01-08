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
				<!--
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
				-->
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
        <label  for="address">Exam Type: </label>
		</div>
		<div class="col-sm-6">
    <select name="quiz_no" class="form-control"  >
				<option value="quiz1">Quiz 1</option>
				<option value="quiz2">Quiz 2</option>
				<option value="quiz3">Quiz 3</option>
				<option value="quiz4">Quiz 4</option>
				<option value="quiz5">Quiz 5</option>
				<option value="assign1">Assignment 1</option>
				<option value="assign2">Assignment 2</option>
				<option value="assign3">Assignment 3</option>
				<option value="assign4">Assignment 4</option>
				<option value="ca">CA MARKS</option>
			</select>
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
 
