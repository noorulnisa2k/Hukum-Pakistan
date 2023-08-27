<!doctype html>
<html lang="">
<?php 
include('auth.php');
$doctitle = "Requests";
include('head.php');
include('request_approval.php');
?>

<body>
    
<?php include('header.php'); ?>




	<nav id="breadcrumbs" class="breadcrumbs">
		<div class="container page-wrapper">
			<a href="/">Home</a> » <span class="breadcrumb_last" aria-current="page">Requests</span>
		</div>
	</nav>
    
    
	<!--Alert -->
	<div class="container mt-5">
    	<?php    
            if($showAlert){
              echo '
              <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Request Accepted Successfully</strong>'.' 
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
            if($showRejected){
              echo '
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Request Rejected Successfully</strong>'.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
            }
        ?>
    </div>
	
	<!--Heading-->
	<div class="title-content text-center">
		<h2><br>Requests</h2>
	</div>
	
	<div class="container">
    	<table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Requested By</th>
              <th scope="col">Blood Group</th>
              <th scope="col">Contact</th>
              <th scope="col">City</th>
              <th scope="col">Trasport</th>
              <th scope="col">Urgency</th>
              <th scope="col">Request Type</th>
              <th scope="col">Requested On</th>
              <th scope="col" colspan="2">Request Action</th>
              <th scope="col"></th>
              <th scope="col">Endorsement</th>
            </tr>
          </thead>
          <tbody>
               <?php
                 $sql = "SELECT * FROM request_tbl RT 
                 INNER JOIN hukumpakistanapp_patient hpp 
                 ON RT.sender_pk_id=hpp.user_id 
                 WHERE RT.requested_to_pk_id = $user_id OR RT.sender_pk_id = $user_id";
                 $result = mysqli_query($co, $sql);           	
                 if (mysqli_num_rows($result) > 0) {
                   while($row = mysqli_fetch_assoc($result)) {
                     $first_name = $row["name"];
                     $contact_number = $row["contact_number"];
                     $blood_grp = $row["blood_grp"];
                     $city = $row["city"];
                     $urgency = $row["urgency"];
                     $transportation = $row["transportation"];
                     $requested_on = $row["requested_on"];
                     $req_type = $row["req_type"];
                     $req_id = $row["req_id"];
                     $sender_pk_id = $row["sender_pk_id"];
                     $requested_to_pk_id = $row["requested_to_pk_id"];
                     $request_status = $row["request_status"];
              ?>  
            <tr>
                
              <td><?php if($sender_pk_id == $user_id){ echo "My Request";}else{ echo $first_name; } ?></td>
              <td><?php echo $blood_grp; ?></td>
              <td><?php if($request_status == "Y"){echo $contact_number; }else{ echo "***********"; } ?></td>
              <td><?php echo $city; ?></td>
              <td><?php echo $transportation; ?></td>
              <td><?php echo $urgency; ?></td>
              <td><?php echo $req_type; ?></td>
              <td><?php echo $requested_on; ?></td>
                
                <?php if($sender_pk_id == $user_id){?>
              
              <td colspan="2">
                  <span class="<?php if($request_status == "Y"){echo "btn btn-secondary btn-sm";}else{echo "btn btn-primary btn-sm";} ?>">
                    <?php if($request_status == "R"){ echo "Donor Rejected"; }elseif($request_status == "Y"){ echo "Donor Accepted";}elseif($request_status == "T"){ echo "Terminated By System";}else{ echo "Pending @ Donor"; } ?>
                  </span>
              </td>   
              <td></td>
                <?php }else{ 
                  if($request_status == "R"){ echo "<td colspan='2'><span class='btn btn-primary btn-sm'>You Rejected<span></td><td></td>"; }elseif($request_status == "Y"){ echo "<td colspan='2'><span class='btn btn-secondary btn-sm'>You Accepted<span></td><td></td>";}
                  elseif($request_status == "T"){ echo "<td colspan='2'><span class='btn btn-primary btn-sm'>Terminated By System<span></td><td></td>";}else{ ?>
              <td><form method="post" action="requests_list.php"><input type="hidden" name="req_id" value="<?php echo $req_id; ?>"><input type="hidden" name="sender" value="<?php echo $sender_pk_id; ?>"> <input type="hidden" name="action_perform" value="Y"><input type="submit" value="Accept " class="btn btn-secondary btn-sm"></form></td>
              <td><form method="post" action="requests_list.php"><input type="hidden" name="req_id" value="<?php echo $req_id; ?>"><input type="hidden" name="sender" value="<?php echo $sender_pk_id; ?>"> <input type="hidden" name="action_perform" value="R"><input type="submit" value="Reject " class="btn btn-primary btn-sm"></form></td>
                <?php } } ?>
                <?php if($request_status == "Y"){ ?> 
                    <td><form method="post" action="requests_list.php"><input type="hidden" name="req_id" value="<?php echo $req_id; ?>"><input type="submit" value="Donated" class="btn btn-primary btn-sm"></form></td>
                <?php }else{ ?>
                    <td></td>
                   <?php }?>
            </tr>
            
            <?php } 
                   
                 }else{ 
                  ?><tr>
                  <p>No Pending Request</p>
                  </tr>
                  <?php
                     
                 }
            ?>
          </tbody>
        </table>
	</div>
	

					
	
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