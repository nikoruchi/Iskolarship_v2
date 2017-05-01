<?php 
	require "dbconn.php";
	$duplicateErr =  $fillupErr = ""; 
    $sponsorScc = "";
    session_start();
    
if(isset($_POST['register_sponsor'])){
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["contact"]) && !empty($_POST["address"]) && !empty($_POST["job"]) && !empty($_POST["a_name"]) && !empty($_POST["a_address"])&& !empty($_POST["username"]) && !empty($_POST["email"])&& !empty($_POST["password"])&& !empty($_POST["repassword"])){ 

                $getemailadd = $_POST["email"];
                $getpassword = $_POST["password"];
                $getrepassword = $_POST["repassword"];
                $getfirstname = addslashes($_POST["fname"]);
                $getlastname = addslashes($_POST["lname"]);
                $getcontact = $_POST["contact"];  
                $getaddress = $_POST["address"];
                $getusername = $_POST["username"];
                $getjob = $_POST["job"];
                $getaname = $_POST["a_name"];
                $getaadd = $_POST["a_address"];
                $getacctype = "sponsor";

                if($getpassword!=$getrepassword){
                	$fillupErr="Sorry. Passwords don't match.";
                }
                else{
	                $sql = "SELECT user_name FROM user_account WHERE user_name = '$getusername'";
	                if(mysqli_query($dbconn, $sql)){
	                    if(mysqli_affected_rows($dbconn)>0){
	                    	$fillupErr="OLA.";
	                        $duplicateErr = "Sorry username: " . $getusername  ." has already been taken!";
	                    }
	                    else{
	                        $sql = "SELECT user_email FROM user_account WHERE user_email = '$getemailadd'";
	                        if(mysqli_query($dbconn, $sql)){
	                        	if(mysqli_affected_rows($dbconn)>0){
	                        		$duplicateErr = "Sorry email: " . $getemailadd  ." has already been taken!";
	                        	}
	                        	else{
		                        	$sql = "INSERT INTO user_account(user_id, user_email, user_password, user_type, user_name) VALUES (null, '$getemailadd','".md5($getpassword)."','$getacctype', '$getusername')";
		                        	if (mysqli_query($dbconn, $sql)){
		                            	$sql_getaccno = "SELECT user_id FROM user_account WHERE user_name = '$getusername'";
		                            	$result = mysqli_query($dbconn, $sql_getaccno);

		                            	while($row = mysqli_fetch_assoc($result)){
		                                	$value = $row['user_id'];
		                            	}

		                            	$sql_sponsor = "INSERT INTO `sponsor_account`(`sponsor_id`, `user_id`, `sponsor_fname`, `sponsor_lname`, `sponsor_address`, `sponsor_job`, `sponsor_agency`, `sponsor_agencyaddress`) VALUES (null, $value,'$getfirstname','$getlastname','$getaddress','$getjob','$getaname','$getaadd')";

		                            	if (mysqli_query($dbconn, $sql_sponsor)){
		                                	$_SESSION["user_id"]=$value;
		                                	header('Location:index.php');
		                            	}
		                            	else {echo mysqli_error($dbconn);} 
		                        	}
		                    	} 

	                    	}
	           			}
        		}
        	}	
        }
        else{
        	$fillupErr = "Please fill up completely!";    
		}
	// }
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Sponsor Sign-up</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
<div>
	<section class="regform">
		<h1>SIGN-UP AS A SPONSOR</h1>
		<p><?php echo $duplicateErr . $fillupErr;?></p>
		<p><?php echo $sponsorScc;?></p>
		<form class="form" method="post" action="<?php $_PHP_SELF ?>" >
		<fieldset>
			<legend><h2>Personal Information</h2></legend>
			<span>
				<label>First Name</label>
				<input type="text" name="fname" value="<?= isset($_POST['fname']) ? $_POST['fname'] : ''; ?>">
			</span>
			<span>
				<label>Last Name</label>
				<input type="text" name="lname" value="<?= isset($_POST['lname']) ? $_POST['lname'] : ''; ?>">
			</span>
			<span>
				<label>Contact Number</label>
				<input type="tel" name="contact" pattern="09[0-9]{9}" placeholder="09-XXXXXXXXX" value="<?= isset($_POST['contact']) ? $_POST['contact'] : ''; ?>">
			</span>
			<span id="textarea">
				<label>Address</label>
				<textarea name="address"> <?= isset($_POST['address']) ? $_POST['address'] : ''; ?> </textarea>
			</span>
			<span>
				<label>Job Title</label>
				<input type="text" name="job" value="<?= isset($_POST['job']) ? $_POST['job'] : ''; ?>">
			</span>
			</fieldset>
			<fieldset>
			<legend><h2>Agency Information</h2></legend>
			<span>
				<label>Agency Name</label>
				<input type="text" name="a_name" value="<?= isset($_POST['a_name']) ? $_POST['a_name'] : ''; ?>">
			</span>
			<span>
				<label>Agency Address</label>
				<textarea name="a_address"><?= isset($_POST['a_address']) ? $_POST['a_address'] : ''; ?></textarea>
			</span>
			</fieldset>
			<fieldset>
			<legend><h2>Account</h2></legend>
			<span>
				<label>Username</label>
				<input type="text" name="username" placeholder="Enter a unique username" value="<?= isset($_POST['username']) ? $_POST['username'] : ''; ?>">
			</span>
			<span>
				<label>Email Address</label>
				<input type="email" name="email" placeholder="XXX@ymail.com" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
			</span>
			<span>
				<label>Password</label>
				<input type="password" name="password" >
			</span>
			<span>
				<label>Re-type Password</label>
				<input type="password" name="repassword">
			</span>
			</fieldset>
			<input type="submit" name="register_sponsor" id="register" value="Register">
		</form>
	</section>
	<a href="index.php"><< GO BACK</a>
</div>
</body>
</html>