<fieldset>
   
    <div class="form-group">
        <label for="f_name">School</label>
         <select name="school">
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
       <select name="sem">
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
        <label for="batch">Batch</label>
         <select name="batch">
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
        <label for="examType">Exam</label>
         <select name="examtype">
				<option value="batch_a">Quiz</option>
				<option value="batch_b">MTE</option>
				<option value="batch_c">ETE</option>
				
				
				
		 </select>
		
	</div> 
    
   
   

    <div class="form-group">
        <label for="phone">Browse Excel File</label>
          <input type="file" name="image"  class="form-control" id="file">
    </div> 

   
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Register <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>