<!doctype html>
<html lang="">
<?php 
include('auth.php');
include('conn.php');
include('request.php');
$doctitle = "Donors List";
include('head.php'); 
?>

<body>
    
<?php include('header.php'); ?>

<!--Patient Data-->
<?php 
//fetching patient information
$sql = "SELECT * FROM `hukumpakistanapp_patient` order by timestamp desc limit 1";
$result = mysqli_query($co, $sql);           	
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $patient_GROUP = $row["blood_grp"];
    $PATIENT_NAME = $row["name"];
    $patient_contact = $row["contact_number"];
    $patient_CITY = $row["city"];
    $patient_EMAIL = $row['email'];
    $patient_ID = $row['user_id'];
  }
}
    
    

?>


	<nav id="breadcrumbs" class="breadcrumbs">
		<div class="container page-wrapper">
			<a href="/">Home</a> » <span class="breadcrumb_last" aria-current="page">Donors List</span>
		</div>
	</nav>
    
	<!--Alert -->
	<div class="container mt-5">
    	<?php    
            if($showAlert){
              echo '
              <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Request Sent!</strong>'.' 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
            }
            if($showError){
              echo '
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error! </strong>'.$showError.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
            }
        ?>
    </div>
	
	<!--Heading-->
	<div class="title-content text-center">
		<h2><br>List of <?php echo $patient_GROUP?> Donors</h2>
	</div>
	
	
	<!--Available donors card-->
	<section class="hukumPakistan-hp-m-main">
	    <div class="hp-content py-5">
    	    <div class ="hukumPakistan-bottom-grids-6">
        		<div class="container py-lg-5">
        			<div class="grids-area-hny main-cont-wthree-fea row mb-lg-5 mt-4">
                        <?php
                        
                        $sql = "SELECT * FROM `hukumpakistanapp_donor`  WHERE blood_grp='$patient_GROUP' and city= '$patient_CITY' AND  user_id != $user_id ";
                        $result = mysqli_query($co, $sql);           	
                        if (mysqli_num_rows($result) > 0) {
                          while($row = mysqli_fetch_assoc($result)) {
                            $GROUP = $row["blood_grp"];
                            $DONOR_NAME = $row["name"];
                            $GENDER = $row["gender"];
                            $CITY = $row["city"];
                            $EMAIL = $row['email'];
                            $ID = $row['user_id'];
                            $dID = $row['id'];
                            $donated = $row['donated'];
                            
                            ?>
                    
                    <?php
                    $sqlLastDate="SELECT last_Donate FROM hukumpakistanapp_donor WHERE id=$dID";
                    $resultlast=mysqli_query($co,$sqlLastDate);
                    
                    $donorDate=mysqli_fetch_assoc($resultlast)['last_Donate'];
                    // echo $donorDate;
                    
                    $date1=date_create(date("Y-m-d"));
                    $date2=date_create($donorDate);
                    $diff=date_diff($date1,$date2)->format("%a");
                    
                    if ($donated == 'Yes'){
                        if(intval($diff)<90){
                        // echo '<br>'. $diff;
                        }
                    }
                    else{
    

                    ?>
        				<div class="col-lg-3 col-md-6 grids-feature donor-li">
        					<div class="area-box" style="padding: 25px 20px;">
        						<span class="fa fa-tint" aria-hidden="true"></span>

        						<h5 style="padding-top:15px;"><?php echo $DONOR_NAME ?></h5>
        						<p>Gender: <?php echo $GENDER; ?><br/>Blood Group: <?php echo $GROUP; ?><br/>City: <?php echo $CITY; ?></p><br>
        						<form method="post" action="donors_list.php">
            						<div class="read">
            							<!--<a class="btn mt-4" type="submit">Send Request</a>-->
            							<input type="hidden" name="id" value='<?php echo $ID ?>'>
            							<button class="btn mt-4" type="submit" name="request"  >Request</button>
            							<!--onClick="this.disabled=true; this.value='Sending…';"-->
            						</div>
            						<!--<div class="col-md-12 pb-3 float-left">-->
                		                <!--<button class="btn btn-secondary" type="submit" name="donor_list">Submit</button>-->
                                    <!--</div>-->
        						</form>
        					</div>
        				</div>
        				
        				
        				
                        <?php
                            }

                          }
                        } else {
                          echo "We are sorry no result(s) found of your blood type in your city";
                        }
                        ?>			
        			</div>
        		</div>
    		</div>
		</div>
	</section>
					
	
	<?php include('footer.php'); ?>

</body>
</html>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script>
	$(function () {
		$('.navbar-toggler').click(function () {
			$('body').toggleClass('noscroll');
		})
	});
</script>
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.countup.js"></script>
<script>
	$('.counter').countUp();
</script>
<script src="assets/js/bootstrap.min.js"></script>