<?php
include("backend/connection.php");
include('divScript.php');

$city_id = $_POST['city'];
$area_id = $_POST['area'];
$prof_id = $_POST['profession'];

$search_query = "SELECT
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
WHERE /*`tbl_worker_details`.`status` = 'approve' AND */`tbl_area`.`id` = '$area_id' AND `tbl_profession`.`id` = '$prof_id'";

$search_result = mysqli_query($link,$search_query);
$result_row = mysqli_num_rows($search_result);
if($result_row> 0){
	while ($search_row = mysqli_fetch_array($search_result)):;?>

		<div class="container">
			<div class="row justify-content-center d-flex">
				<div class="col-lg-8 post-list">
					<div class="single-post d-flex flex-row">
						<div class="thumb" style="padding-right: 20px">
							<img src="worker/<?php echo $search_row[5]; ?>" alt=" Image" width="100" height="100">
						</div>
						<div class="details" style="width: 75%">
							<div class="title d-flex flex-row justify-content-between">
								<div class="titles">
									<a href="view-profile.php?area_id=<?php echo $area_id; ?>&prof_id=<?php echo $prof_id; ?>"><h4><?php echo $search_row[0]; ?></h4></a>			
								</div>
								<a  class="primary-btn" href="view-profile.php?area_id=<?php echo $area_id; ?>&prof_id=<?php echo $prof_id; ?>">View Profie</a>
							</div>
							<h5>Profession: <?php echo $search_row[1]; ?></h5>
							<h5><?php for ($i=0; $i < $search_row[2]; $i++) { ?>
								<i class="fa fa-star"></i><?php } ?>
							</h5>
							<p class="address"><span class="lnr lnr-map"></span> <?php echo $search_row[4]; ?>, <?php echo $search_row[3]; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; 
}
else {

	?>
	<div class="container">
		<div class="row justify-content-center d-flex">
			<div class="col-lg-8 post-list">
				<div class="single-post d-flex flex-row">

					<div class="details" style="width: 100%">
						<div class="title d-flex flex-row justify-content-between">
							<div class="titles">
								<h4>Search Result Not Found</h4>			
							</div>

						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
} ?>