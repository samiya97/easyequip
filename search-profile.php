<?php 
include("backend/connection.php");
$area_id = $_GET['area_id'];
$prof_id = $_GET['prof_id'];

$search_query = "SELECT
`tbl_worker`.`id` AS 'Worker ID',
`tbl_worker`.`name` AS 'Worker Name',
`tbl_profession`.`services` AS 'Serice',
`tbl_worker_details`.`rating` AS 'Rating',
`tbl_city`.`city` AS 'City',
`tbl_area`.`area` AS 'Area',
`tbl_worker_details`.img
FROM(((((
`tbl_available`
INNER JOIN `tbl_worker_details` ON `tbl_available`.`worker_detail_id` = `tbl_worker_details`.`id`)
INNER JOIN `tbl_worker` ON `tbl_worker_details`.`worker_id` = `tbl_worker`.`id`)
INNER JOIN `tbl_profession` ON `tbl_worker_details`.`prof_id` = `tbl_profession`.`id`)
INNER JOIN `tbl_area` ON `tbl_available`.`area_id` = `tbl_area`.`id`)
INNER JOIN `tbl_city` ON `tbl_area`.`city_id` = `tbl_city`.`id`)
WHERE `tbl_area`.`id` = '$area_id' AND `tbl_profession`.`id` = '$prof_id'";

$search_result = mysqli_query($link,$search_query);
$result_row = mysqli_num_rows($search_result);
if($result_row> 0){
	while ($search_row = mysqli_fetch_array($search_result)):;?>
		
		<div class="single-post d-flex flex-row">
			<div class="thumb"  style="padding-right: 20px">
				<img src="worker/<?php echo $search_row[6]; ?>" alt=" Image" width="100" height="100">
			</div>
			<div class="details" style="width: 80%">
				<form method="post" action="order.php" onsubmit="return test()">
					<div class="title d-flex flex-row justify-content-between">
						<div class="titles">
							<h4 style="cursor: default;"><input type="text" hidden="" value="<?php echo $search_row[0]; ?>" name="worker_id"><?php echo $search_row[1]; ?></h4>
							<h5>Profession: <?php echo $search_row[2]; ?></h5>	
							<h6>Rating:&nbsp;&nbsp;<?php for ($i=0; $i < $search_row[3]; $i++) { ?>
								<i class="fa fa-star"></i><?php } ?>
								&nbsp;&nbsp;&nbsp;(<?php echo $search_row[3]; ?>/5)
							</h6>

						</div>

					</div>
					<p>Our aim is to enrich the life of our customers by providing outstanding services and technical expertise, through our highly professional and experienced verified workforce.</p>
					<h5><span style="color: red;">*</span>Select Job Type: </h5>
					<?php 
					$jobTpye_query = "SELECT `id`, `job_type`, `price` FROM `tbl_jobtype` WHERE `prof_id` = '$prof_id'";
					$jobTpye_result = mysqli_query($link,$jobTpye_query);
					$jobTpye_row = mysqli_num_rows($jobTpye_result);
					if($jobTpye_row> 0){
						while ($jobTpye_row = mysqli_fetch_array($jobTpye_result)):;?>
							<label><input type="checkbox" onclick="addPrice(this.id)" class="valid_check" id="<?php echo $jobTpye_row[2]; ?>" name="job_type[]" value="<?php echo $jobTpye_row[0]; ?>">
								<?php echo $jobTpye_row[1]; ?> &nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;&nbsp;Rs.<?php echo $jobTpye_row[2]; ?></label><br/>
							<?php endwhile;
						} ?>

						<p class="address"><br/><span class="lnr lnr-map"></span> <?php echo $search_row[5]; ?>, <?php echo $search_row[4]; ?></p>
						<h5><span style="color: red;">*</span>To confirm order, please enter your complete address: </h5>
						<div class="col-lg-12 form-cols">
							<input type="text" name="address" placeholder="Complete Address..." style="
							background: #ffffff;
							border: 1px solid transparent;
							color: #222;
							padding-left: 40px;
							padding-right: 40px;
							line-height: 42px;
							width: 100%;
							">
						</div>
						<br>
						<div class="row">
							<div class="col-lg-9 form-cols">
								<p>Total Amount: <input type="number" disabled="" id="price" name="price" value=0 style="
								background: rgb(235, 235, 228);
								border: 1px solid transparent;
								color: #222;
								padding-left: 20px;
								padding-right: 20px;
								line-height: 40px;
								width: 25%;
								"></p>
							</div>
							<div class="col-lg-3 form-cols">
								<button type="submit" class="primary-btn" id="search" style="float: right; padding-left: 50px; padding-right: 50px;">
									<span class="lnr lnr-chevron-right"></span> Confrim  
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		<?php endwhile;
	}?>
	<style type="text/css">
	.highlight{
		border: 1px solid red !important;
	}
	.check_highlight{
		box-shadow: 0px 0px 0px 1px rgba(255,0,0,1);
	}
</style>

<script type="text/javascript">
	function test()
	{
		var isFormValid = true;
		$('.details input').each(function(){
			if (! $('.valid_check').is(':checked')){ 
				$('.valid_check').addClass("check_highlight");
				isFormValid = false;
				$('.valid_check').focus();
			}
			if ($.trim($(this).val()).length == 0 ){
				$(this).addClass("highlight");
				isFormValid = false;
				$(this).focus();
			}
			else{
				$(this).removeClass("highlight");
				$(this).removeClass("check_highlight");
			}
		});
		if (!isFormValid) { 
			alert("Please fill in all the required fields (indicated by *)");
		}
		return isFormValid;
	} 
	function addPrice(price){
		var inputs = document.getElementById(price).checked;
		var totalprice = parseInt($("input[name=price]").val());
		var pricevalue = parseInt(price);
		if(inputs){
			totalprice += pricevalue;
			$("input[name=price]").val(totalprice);
		}
		else if(!inputs && $("input[name=price]").val() !=0)
			totalprice -= pricevalue;
			$("input[name=price]").val(totalprice);
	}
</script>