<!doctype html>
<html lang="">
<?php 
$doctitle = "Patient Form";
include('auth.php');
include('patient_script.php');
include('head.php'); ?>
<body>
<?php include('header.php'); ?>
<style>
    /*.center-block {*/
    /* margin: auto;*/
    /*}*/
    .btn-secondary{
        color: #ffffff;
        background-color: #ed0000;
        border-color: #ed0000;
    }
    label{
        font-weight: bold;
    }
    <?php include('button_css.php'); ?>

</style>


	<nav id="breadcrumbs" class="breadcrumbs">
		<div class="container page-wrapper">
			<a href="/">Home</a> » <span class="breadcrumb_last" aria-current="page">Patient Form</span>
		</div>
	</nav>
	

    <section class="hukumPakistan-hp-m-main">
		<div class="hp-content">
			<div class="container py-lg-5">
			    <?php    
                    if($showAlert){
                      echo '
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Success!</strong>'.$showAlert.' 
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
				<div class="title-content text-center mb-lg-5 mt-4">
					<img src="assets/images/patient.jpg" class="img-fluid" alt="" />

				
		   <div class="row justify-content-center">
		       
          <div class="col-md-12">
            <span class="anchor" id="formComplex"></span>
            
            
            <form action="patient_form.php" method="post">
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <h1 class="col-sm-12 justify-content-center py-3" style="color: #df1d2a;">Patient Details</h1>
                  <div class="col-sm-3 center-block" >
                      <label for="exampleAmount">Patient Name</label>
						<input class="form-control" id="exampleAccount" placeholder="Full Name" type="text" name="name" value="<?php if(isset($_POST['patient'])){ echo $name; } ?>" accept=".jpg,.png" required>
                  </div>
                  <div class="col-sm-3 center-block">
                      <label for="exampleAmount">Hospital Name</label>
						<input class="form-control" id="exampleAccount" placeholder="Hospital Name" type="text" name="hospital_name" value="<?php if(isset($_POST['patient'])){ echo $hospital_name; } ?>" required>
                  </div>
                  <div class="col-sm-3 center-block">
                      <label for="exampleAmount">Recommonded by which Doctor?</label>
						<input class="form-control" id="exampleAccount" placeholder="Doctor Name" type="text" name="doctor_name" value="<?php if(isset($_POST['patient'])){ echo $doctor_name; } ?>" required>
                  </div>
                  <div class="col-sm-3 pb-3">
                      <label for="exampleAmount">Contact No</label>
						<input type="tel" id="exampleCtrl" name="phone" pattern="[0-9]{11}" class="form-control" placeholder="03XXXXXXXXX" value="<?php if(isset($_POST['patient'])){ echo $phone; } ?>" required>
                  </div>
                  <div class="col-sm-2 pb-3 center-block">
                      <label for="exampleAmount">Blood units</label>
						<input class="form-control" id="exampleCtrl" placeholder="1" type="number" name="quantity" value="<?php if(isset($_POST['patient'])){ echo $quantity; } ?>"  disabled>
                  </div>
                  <div class="col-sm-2 pb-3">
                    <label for="exampleFirst">City</label> 
						<select class="form-control custom-select" id="exampleSt" name="city" value="<?php if(isset($_POST['patient'])){ echo $city; } ?>" required>
						    <option value="" disabled selected>  --Select--</option>
                        	<option value="Islamabad">Islamabad</option>
                            <option value="" disabled>Punjab Cities</option>
                            <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                            <option value="Ahmadpur East">Ahmadpur East</option>
                            <option value="Ali Khan Abad">Ali Khan Abad</option>
                            <option value="Alipur">Alipur</option>
                            <option value="Arifwala">Arifwala</option>
                            <option value="Attock">Attock</option>
                            <option value="Bhera">Bhera</option>
                            <option value="Bhalwal">Bhalwal</option>
                            <option value="Bahawalnagar">Bahawalnagar</option>
                            <option value="Bahawalpur">Bahawalpur</option>
                            <option value="Bhakkar">Bhakkar</option>
                            <option value="Burewala">Burewala</option>
                            <option value="Chillianwala">Chillianwala</option>
                            <option value="Chakwal">Chakwal</option>
                            <option value="Chichawatni">Chichawatni</option>
                            <option value="Chiniot">Chiniot</option>
                            <option value="Chishtian">Chishtian</option>
                            <option value="Daska">Daska</option>
                            <option value="Darya Khan">Darya Khan</option>
                            <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                            <option value="Dhaular">Dhaular</option>
                            <option value="Dina">Dina</option>
                            <option value="Dinga">Dinga</option>
                            <option value="Dipalpur">Dipalpur</option>
                            <option value="Faisalabad">Faisalabad</option>
                            <option value="Ferozewala">Ferozewala</option>
                            <option value="Fateh Jhang">Fateh Jang</option>
                            <option value="Ghakhar Mandi">Ghakhar Mandi</option>
                            <option value="Gojra">Gojra</option>
                            <option value="Gujranwala">Gujranwala</option>
                            <option value="Gujrat">Gujrat</option>
                            <option value="Gujar Khan">Gujar Khan</option>
                            <option value="Hafizabad">Hafizabad</option>
                            <option value="Haroonabad">Haroonabad</option>
                            <option value="Hasilpur">Hasilpur</option>
                            <option value="Haveli Lakha">Haveli Lakha</option>
                            <option value="Jatoi">Jatoi</option>
                            <option value="Jalalpur">Jalalpur</option>
                            <option value="Jattan">Jattan</option>
                            <option value="Jampur">Jampur</option>
                            <option value="Jaranwala">Jaranwala</option>
                            <option value="Jhang">Jhang</option>
                            <option value="Jhelum">Jhelum</option>
                            <option value="Kalabagh">Kalabagh</option>
                            <option value="Karor Lal Esan">Karor Lal Esan</option>
                            <option value="Kasur">Kasur</option>
                            <option value="Kamalia">Kamalia</option>
                            <option value="Kamoke">Kamoke</option>
                            <option value="Khanewal">Khanewal</option>
                            <option value="Khanpur">Khanpur</option>
                            <option value="Kharian">Kharian</option>
                            <option value="Khushab">Khushab</option>
                            <option value="Kot Addu">Kot Addu</option>
                            <option value="Jauharabad">Jauharabad</option>
                            <option value="Lahore">Lahore</option>
                            <option value="Lalamusa">Lalamusa</option>
                            <option value="Layyah">Layyah</option>
                            <option value="Liaquat Pur">Liaquat Pur</option>
                            <option value="Lodhran">Lodhran</option>
                            <option value="Malakwal">Malakwal</option>
                            <option value="Mamoori">Mamoori</option>
                            <option value="Mailsi">Mailsi</option>
                            <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                            <option value="Mian Channu">Mian Channu</option>
                            <option value="Mianwali">Mianwali</option>
                            <option value="Multan">Multan</option>
                            <option value="Murree">Murree</option>
                            <option value="Muridke">Muridke</option>
                            <option value="Mianwali Bangla">Mianwali Bangla</option>
                            <option value="Muzaffargarh">Muzaffargarh</option>
                            <option value="Narowal">Narowal</option>
                            <option value="Nankana Sahib">Nankana Sahib</option>
                            <option value="Okara">Okara</option>
                            <option value="Renala Khurd">Renala Khurd</option>
                            <option value="Pakpattan">Pakpattan</option>
                            <option value="Pattoki">Pattoki</option>
                            <option value="Pir Mahal">Pir Mahal</option>
                            <option value="Qaimpur">Qaimpur</option>
                            <option value="Qila Didar Singh">Qila Didar Singh</option>
                            <option value="Rabwah">Rabwah</option>
                            <option value="Raiwind">Raiwind</option>
                            <option value="Rajanpur">Rajanpur</option>
                            <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                            <option value="Rawalpindi">Rawalpindi</option>
                            <option value="Sadiqabad">Sadiqabad</option>
                            <option value="Safdarabad">Safdarabad</option>
                            <option value="Sahiwal">Sahiwal</option>
                            <option value="Sangla Hill">Sangla Hill</option>
                            <option value="Sarai Alamgir">Sarai Alamgir</option>
                            <option value="Sargodha">Sargodha</option>
                            <option value="Shakargarh">Shakargarh</option>
                            <option value="Sheikhupura">Sheikhupura</option>
                            <option value="Sialkot">Sialkot</option>
                            <option value="Sohawa">Sohawa</option>
                            <option value="Soianwala">Soianwala</option>
                            <option value="Siranwali">Siranwali</option>
                            <option value="Talagang">Talagang</option>
                            <option value="Taxila">Taxila</option>
                            <option value="Toba Tek Singh">Toba Tek Singh</option>
                            <option value="Vehari">Vehari</option>
                            <option value="Wah Cantonment">Wah Cantonment</option>
                            <option value="Wazirabad">Wazirabad</option>
                            <option value="" disabled>Sindh Cities</option>
                            <option value="Badin">Badin</option>
                            <option value="Bhirkan">Bhirkan</option>
                            <option value="Rajo Khanani">Rajo Khanani</option>
                            <option value="Chak">Chak</option>
                            <option value="Dadu">Dadu</option>
                            <option value="Digri">Digri</option>
                            <option value="Diplo">Diplo</option>
                            <option value="Dokri">Dokri</option>
                            <option value="Ghotki">Ghotki</option>
                            <option value="Haala">Haala</option>
                            <option value="Hyderabad">Hyderabad</option>
                            <option value="Islamkot">Islamkot</option>
                            <option value="Jacobabad">Jacobabad</option>
                            <option value="Jamshoro">Jamshoro</option>
                            <option value="Jungshahi">Jungshahi</option>
                            <option value="Kandhkot">Kandhkot</option>
                            <option value="Kandiaro">Kandiaro</option>
                            <option value="Karachi">Karachi</option>
                            <option value="Kashmore">Kashmore</option>
                            <option value="Keti Bandar">Keti Bandar</option>
                            <option value="Khairpur">Khairpur</option>
                            <option value="Kotri">Kotri</option>
                            <option value="Larkana">Larkana</option>
                            <option value="Matiari">Matiari</option>
                            <option value="Mehar">Mehar</option>
                            <option value="Mirpur Khas">Mirpur Khas</option>
                            <option value="Mithani">Mithani</option>
                            <option value="Mithi">Mithi</option>
                            <option value="Mehrabpur">Mehrabpur</option>
                            <option value="Moro">Moro</option>
                            <option value="Nagarparkar">Nagarparkar</option>
                            <option value="Naudero">Naudero</option>
                            <option value="Naushahro Feroze">Naushahro Feroze</option>
                            <option value="Naushara">Naushara</option>
                            <option value="Nawabshah">Nawabshah</option>
                            <option value="Nazimabad">Nazimabad</option>
                            <option value="Qambar">Qambar</option>
                            <option value="Qasimabad">Qasimabad</option>
                            <option value="Ranipur">Ranipur</option>
                            <option value="Ratodero">Ratodero</option>
                            <option value="Rohri">Rohri</option>
                            <option value="Sakrand">Sakrand</option>
                            <option value="Sanghar">Sanghar</option>
                            <option value="Shahbandar">Shahbandar</option>
                            <option value="Shahdadkot">Shahdadkot</option>
                            <option value="Shahdadpur">Shahdadpur</option>
                            <option value="Shahpur Chakar">Shahpur Chakar</option>
                            <option value="Shikarpaur">Shikarpaur</option>
                            <option value="Sukkur">Sukkur</option>
                            <option value="Tangwani">Tangwani</option>
                            <option value="Tando Adam Khan">Tando Adam Khan</option>
                            <option value="Tando Allahyar">Tando Allahyar</option>
                            <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
                            <option value="Thatta">Thatta</option>
                            <option value="Umerkot">Umerkot</option>
                            <option value="Warah">Warah</option>
                            <option value="" disabled>Khyber Cities</option>
                            <option value="Abbottabad">Abbottabad</option>
                            <option value="Adezai">Adezai</option>
                            <option value="Alpuri">Alpuri</option>
                            <option value="Akora Khattak">Akora Khattak</option>
                            <option value="Ayubia">Ayubia</option>
                            <option value="Banda Daud Shah">Banda Daud Shah</option>
                            <option value="Bannu">Bannu</option>
                            <option value="Batkhela">Batkhela</option>
                            <option value="Battagram">Battagram</option>
                            <option value="Birote">Birote</option>
                            <option value="Chakdara">Chakdara</option>
                            <option value="Charsadda">Charsadda</option>
                            <option value="Chitral">Chitral</option>
                            <option value="Daggar">Daggar</option>
                            <option value="Dargai">Dargai</option>
                            <option value="Darya Khan">Darya Khan</option>
                            <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                            <option value="Doaba">Doaba</option>
                            <option value="Dir">Dir</option>
                            <option value="Drosh">Drosh</option>
                            <option value="Hangu">Hangu</option>
                            <option value="Haripur">Haripur</option>
                            <option value="Karak">Karak</option>
                            <option value="Kohat">Kohat</option>
                            <option value="Kulachi">Kulachi</option>
                            <option value="Lakki Marwat">Lakki Marwat</option>
                            <option value="Latamber">Latamber</option>
                            <option value="Madyan">Madyan</option>
                            <option value="Mansehra">Mansehra</option>
                            <option value="Mardan">Mardan</option>
                            <option value="Mastuj">Mastuj</option>
                            <option value="Mingora">Mingora</option>
                            <option value="Nowshera">Nowshera</option>
                            <option value="Paharpur">Paharpur</option>
                            <option value="Pabbi">Pabbi</option>
                            <option value="Peshawar">Peshawar</option>
                            <option value="Saidu Sharif">Saidu Sharif</option>
                            <option value="Shorkot">Shorkot</option>
                            <option value="Shewa Adda">Shewa Adda</option>
                            <option value="Swabi">Swabi</option>
                            <option value="Swat">Swat</option>
                            <option value="Tangi">Tangi</option>
                            <option value="Tank">Tank</option>
                            <option value="Thall">Thall</option>
                            <option value="Timergara">Timergara</option>
                            <option value="Tordher">Tordher</option>
                            <option value="" disabled>Balochistan Cities</option>
                            <option value="Awaran">Awaran</option>
                            <option value="Barkhan">Barkhan</option>
                            <option value="Chagai">Chagai</option>
                            <option value="Dera Bugti">Dera Bugti</option>
                            <option value="Gwadar">Gwadar</option>
                            <option value="Harnai">Harnai</option>
                            <option value="Jafarabad">Jafarabad</option>
                            <option value="Jhal Magsi">Jhal Magsi</option>
                            <option value="Kacchi">Kacchi</option>
                            <option value="Kalat">Kalat</option>
                            <option value="Kech">Kech</option>
                            <option value="Kharan">Kharan</option>
                            <option value="Khuzdar">Khuzdar</option>
                            <option value="Killa Abdullah">Killa Abdullah</option>
                            <option value="Killa Saifullah">Killa Saifullah</option>
                            <option value="Kohlu">Kohlu</option>
                            <option value="Lasbela">Lasbela</option>
                            <option value="Lehri">Lehri</option>
                            <option value="Loralai">Loralai</option>
                            <option value="Mastung">Mastung</option>
                            <option value="Musakhel">Musakhel</option>
                            <option value="Nasirabad">Nasirabad</option>
                            <option value="Nushki">Nushki</option>
                            <option value="Panjgur">Panjgur</option>
                            <option value="Pishin Valley">Pishin Valley</option>
                            <option value="Quetta">Quetta</option>
                            <option value="Sherani">Sherani</option>
                            <option value="Sibi">Sibi</option>
                            <option value="Sohbatpur">Sohbatpur</option>
                            <option value="Washuk">Washuk</option>
                            <option value="Zhob">Zhob</option>
                            <option value="Ziarat">Ziarat</option>
                        </select>
                  </div>
                  
                  
                  <div class="col-sm-2 pb-3 center-block">
                    <label for="exampleSt">Urgency</label> <select class="form-control custom-select" id="exampleSt" name="urgency" value="<?php if(isset($_POST['patient'])){ echo $urgency; } ?>" required>
                      <option class="text-white bg-warning" value="" disabled selected>
                        --Select--
                      </option>
                      <option value="2 hrs">
                        within 2 Hours
                      </option>
                      <option value="6 hrs">
                        within 6 Hours
                      </option>
                      <option value="12 hrs">
                        within 12 Hours
                      </option>
                      <option value="24 hrs">
                        within 24 Hours
                      </option>
                    </select>
                  </div>
                  <div class="col-sm-3 pb-3 center-block">
                    <label for="exampleSt">Will you provide transportation?</label> <select class="form-control custom-select" id="exampleSt" name="transport" value="<?php if(isset($_POST['patient'])){ echo $transport; } ?>" required>
                      <option class="text-white bg-warning" value="" disabled selected>
                        --Select--
                      </option>
                      <option value="self">
                        Self pick & drop
                      </option>
                      <option value="compensation">
                        Compensation
                      </option>
                      <option value="no">
                        No
                      </option>
                      
                    </select>
                  </div>
                  <div class="col-sm-3 pb-3">
                        <label for="img">Patient Image(Optional)</label>
                        <input type="file" id="img" name="img" accept="image/*" value="<?php if(isset($_POST['patient'])){ echo $img; } ?>">
                    </div>
                  
                  <div class="col-sm-12 pb-3">
                        <label for="exampleZip">Note (Optional)</label> 
						<input class="form-control" id="exampleZip" placeholder="Note (Optional)" type="text" name="note" value="<?php if(isset($_POST['patient'])){ echo $note; } ?>">
                    </div>

                    <div class="section over-hide z-bigger">
            		<div class="section over-hide z-bigger">
            			<div class="container">
            				<div class="row justify-content-center">
            					<div class="col-12 pt-2">
            						<p class="mb-4 pb-2" style="color: #000000; font-weight: bold; font-size: 17px;">Select Blood Group</p>
            					</div>
            					<div class="col-12 pb-5">
            						<input class="checkbox-tools" type="radio" name="options" value="A+" id="tool-1" checked>
            						<label class="for-checkbox-tools" for="tool-1">
            							A+
            						</label><!--
            						--><input class="checkbox-tools" type="radio" name="options" value="A-" id="tool-2">
            						<label class="for-checkbox-tools" for="tool-2">
            							A-
            						</label><!--
            						--><input class="checkbox-tools" type="radio" name="options" value="B+" id="tool-3">
            						<label class="for-checkbox-tools" for="tool-3">
            							B+
            						</label><!--
            						--><input class="checkbox-tools" type="radio" name="options" value="B-" id="tool-4">
            						<label class="for-checkbox-tools" for="tool-4">
            							B-
            						</label><!--
            						--><input class="checkbox-tools" type="radio" name="options" value="AB+" id="tool-5">
            						<label class="for-checkbox-tools" for="tool-5">
            							AB+
            						</label><!--
            						--><input class="checkbox-tools" type="radio" name="options" value="AB-" id="tool-6">
            						<label class="for-checkbox-tools" for="tool-6">
            							AB-
            						</label>
            						<input class="checkbox-tools" type="radio" name="options" value="O+" id="tool-7" >
            						<label class="for-checkbox-tools" for="tool-7">
            							O+
            						</label>
            						<input class="checkbox-tools" type="radio" name="options" value="O-" id="tool-8" >
            						<label class="for-checkbox-tools" for="tool-8">
            							O-
            						</label>
            					</div>					
            				</div>
            			</div>	
            		</div>
                  
                </div>
              </div>
              <div class="card-footer">
                <div class="float-center">
                  <button class="btn btn-secondary" type="submit" name="patient">Submit</button>
				 
                </div>
              </div>
            </div><!--/card-->
            </form>
          </div>
          </div>
        </div><!--/row-->


 
				

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