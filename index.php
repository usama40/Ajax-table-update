<?php
include 'backend/database.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Table Data</title>
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="ajax/ajax.js"></script>
	</head>
	<body>
	<div class="container table-responsive py-5">
		<div id="contact_form">
			<form id="user_form">
				<table class="table table-bordered table-hover">
					<?php
						$result = mysqli_query($conn,"SELECT * FROM table_data");
						$i=1;
						$j=1;
						$count = mysqli_num_rows($result);
					?>
					<thead class="table-primary">
						<tr>
							<th scope="col" rowspan="2">S.No</th>
							<th scope="col" rowspan="2">Reference Document</th>
							<th scope="col" rowspan="2">Compliance Requirement Type</th>
							<th scope="col" rowspan="2">Doc Desc</th>
							<th scope="col" rowspan="2">Document Issue Date</th>
							<th scope="col" rowspan="2">Stake Holder</th>
							<th scope="col" colspan="3" style="text-align: center">Total No.</th>
							<th scope="col" rowspan="2">Total No. Compliance </th>
							<th scope="col" rowspan="2">Open</th>
							<th scope="col" rowspan="2">Close</th>
							<th scope="col" rowspan="2">Priority</th>
							<th scope="col" rowspan="2">Compliance Status</th>
							<th scope="col" rowspan="2">PC</th>
							<th scope="col" rowspan="2">NC</th>
							<th scope="col" rowspan="2">C</th>
							<th scope="col" rowspan="2">Reasons for Delay</th>
							<th scope="col" rowspan="2">Compliance Deadline</th>
							<th scope="col" rowspan="2">Comments</th>
							<th scope="col" rowspan="2">Action</th>
						</tr>
						<tr>
							<th class="table-danger">HIGH</th>
							<th class="table-warning">MEDIUM</th>
							<th class="table-success">LOW</th>
						</tr>
					</thead>
					
					<tbody id="add_row">
						
							
						<?php
							if ($count > 0) {
						?>
							<input type="hidden"  name="no" id="no" value="<?php echo $count; ?>"/>

							<?php
								while($row = mysqli_fetch_array($result)){
							
							?>

						<tr id="row_1">
							<input type="hidden"  name="id_<?php echo $i; ?>" id="id_<?php echo $i; ?>" value="<?php echo $row["id"]; ?>"/>

							<th scope="col">
								<input type="text"  name="sno_<?php echo $i; ?>" id="sno_<?php echo $i; ?>" value="<?php echo $j; ?>" disabled/>
							</th>
							<td>
								<input type="text" class="required" name="refrence_document_<?php echo $i; ?>" id="refrence_<?php echo $i; ?>" value="<?php echo $row["refrence_document"]; ?>" required />

							</td>
							<td>
								<input type="text"  name="requirment_type_<?php echo $i; ?>" id="requirment_<?php echo $i; ?>" value="<?php echo $row["c_requirment_type"]; ?>" required />
							</td>
							<td>
								<input type="text"  name="doc_desc_<?php echo $i; ?>" id="desc_<?php echo $i; ?>" value="<?php echo $row["doc_descp"]; ?>" required />
							</td>
							<td>
								<input type="date"  name="document_issue_date_<?php echo $i; ?>" id="issue_date_<?php echo $i; ?>" value="<?php echo $row["issue_date"]; ?>" required/>
							</td>
							<td>
								<input type="text"  name="stake_holder_<?php echo $i; ?>" id="stake_holder_<?php echo $i; ?>" value="<?php echo $row["stakeholder"]; ?>" requiredrequired/>
							</td>
							<td>
								<input type="number" name="high_<?php echo $i; ?>" id="high_<?php echo $i; ?>" value="<?php echo $row["high"]; ?>" required/>
							</td>
							<td>
								<input type="number"  name="medium_<?php echo $i; ?>" id="medium_<?php echo $i; ?>" value="<?php echo $row["medium"]; ?>" required/>
							</td>
							<td>
								<input type="number"  name="low_<?php echo $i; ?>" id="low_<?php echo $i; ?>" value="<?php echo $row["low"]; ?>" required/>
							</td>
							<td>
								<input type="number"  name="total_number_<?php echo $i; ?>" id="total_number_<?php echo $i; ?>" value="<?php echo $row["compilance"]; ?>" required/>
							</td>
							<td>
								<input type="number"  name="open_<?php echo $i; ?>" id="open_<?php echo $i; ?>" value="<?php echo $row["open"]; ?>" required/>
							</td>
							<td>
								<input type="number"  name="close_<?php echo $i; ?>" id="close_<?php echo $i; ?>" value="<?php echo $row["close"]; ?>" required/>
							</td>
							<td>
								<select name="priority_<?php echo $i; ?>" id="priority_<?php echo $i; ?>">
								  <option value="2" <?php if($row["priority"] == "2") echo 'selected="selected"'; ?> >High</option>
								  <option value="1" <?php if($row["priority"] == "1") echo 'selected="selected"'; ?> >Medium</option>
								  <option value="0" <?php if($row["priority"] == "0") echo 'selected="selected"'; ?> >Low</option>
								</select>

							</td>
							<td>
								<select name="status_<?php echo $i; ?>" id="status_<?php echo $i; ?>">
								  <option value="2" <?php if($row["status"] == "2") echo 'selected="selected"'; ?> >Compliant</option>
								  <option value="1" <?php if($row["status"] == "1") echo 'selected="selected"'; ?> >Partially Compliant</option>
								  <option value="0" <?php if($row["status"] == "0") echo 'selected="selected"'; ?> >No Compliant</option>
								</select>

							</td>
							<td>
								<input type="number"  name="pc_<?php echo $i; ?>" id="pc_<?php echo $i; ?>" value="<?php echo $row["pc"]; ?>" required/>
							</td>
							<td>
								<input type="number"  name="nc_<?php echo $i; ?>" id="nc_<?php echo $i; ?>" value="<?php echo $row["nc"]; ?>" required/>
							</td>
							<td>
								<input type="number"  name="c_<?php echo $i; ?>" id="c_<?php echo $i; ?>" value="<?php echo $row["c"]; ?>" required/>
							</td>
							<td>
								<input type="text"  name="delay_reason_<?php echo $i; ?>" id="delay_<?php echo $i; ?>" value="<?php echo $row["reason_for_delay"]; ?>" required/>
							</td>
							<td>
								<input type="date"  name="deadline_<?php echo $i; ?>" id="deadline_<?php echo $i; ?>" value="<?php echo $row["deadline"]; ?>" required/>
							</td>
							<td>
								<input type="text"  name="comment_<?php echo $i; ?>" id="comment_<?php echo $i; ?>" value="<?php echo $row["comments"]; ?>" required/>
							</td>
							<td style="display: inline-flex;">
								<a href="#deleteModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="fa fa-trash mr-3 btn btn-sm btn-danger" data-toggle="tooltip" 
						 title="Delete"></i></a>
							</td>
						</tr>
						<?php
							$i++;
							$j++;

							}
						}else
						{
						?>

						<tr id="row_1">
							<input type="hidden"  name="no" id="no" value="1"/>
							<th scope="col">
								<input type="text"  name="sno_1" id="sno_1" value="1" disabled/>
							</th>
							<td>
								<input type="text" class="required"  name="refrence_document_1" id="refrence_1" value="" required />
							</td>
							<td>
								<input type="text"  name="requirment_type_1" id="requirment_1" value="" required />
							</td>
							<td>
								<input type="text"  name="doc_desc_1" id="desc_1" value="" required />
							</td>
							<td>
								<input type="date"  name="document_issue_date_1" id="issue_date_1" value="" required/>
							</td>
							<td>
								<input type="text"  name="stake_holder_1" id="stake_holder_1" value="" requiredrequired/>
							</td>
							<td>
								<input type="number"  name="high_1" id="high_1" value="" required/>
							</td>
							<td>
								<input type="number"  name="medium_1" id="medium_1" value="" required/>
							</td>
							<td>
								<input type="number"  name="low_1" id="low_1" value="" required/>
							</td>
							<td>
								<input type="number"  name="total_number_1" id="total_number_1" value="" required/>
							</td>
							<td>
								<input type="number"  name="open_1" id="open_1" value="" required/>
							</td>
							<td>
								<input type="number"  name="close_1" id="close_1" value="" required/>
							</td>
							<td>
								<select name="priority_1" id="priority_1">
								  <option value="2">High</option>
								  <option value="1">Medium</option>
								  <option value="0">Low</option>
								</select>

							</td>
							<td>
								<select name="status_1" id="status_1">
								  <option value="2">Compliant</option>
								  <option value="1">Partially Compliant</option>
								  <option value="0">No Compliant</option>
								</select>

							</td>
							<td>
								<input type="number"  name="pc_1" id="pc_1" value="" required/>
							</td>
							<td>
								<input type="number"  name="nc_1" id="nc_1" value="" required/>
							</td>
							<td>
								<input type="number"  name="c_1" id="c_1" value="" required/>
							</td>
							<td>
								<input type="text"  name="delay_reason_1" id="delay_1" value="" required/>
							</td>
							<td>
								<input type="date"  name="deadline_1" id="deadline_1" value="" required/>
							</td>
							<td>
								<input type="text"  name="comment_1" id="comment_1" value="" required/>
							</td>
							
						</tr>
						<?php
							}
						?>
						
						
					</tbody>
				</table>
				<button type="button" onclick="addRow()" class="btn btn-primary">Add New Row</button>
				
				<?php
					if($count > 0){
				?>
				<input type="hidden" value="3" name="type">
				<button type="button" class="btn btn-primary" id="btn-update">Update</button>
				<?php
					}else{
				?>

				<input type="hidden" value="1" name="type">
				<button type="button" class="btn btn-primary" id="btn-add">Add</button>

				<?php
					}
				?>
			</form>
			<?php mysqli_close($conn);  // close connection ?>
		</div>
	</div>
		<div id="deleteModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Delete Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="deleteData">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</body>
</html>