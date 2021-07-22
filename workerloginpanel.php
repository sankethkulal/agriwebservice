<?php
if(!isset($_SESSION)) { session_start(); } 
include("header.php");
include("dbconnection.php");
if(isset($_SESSION[workerid]))
{
	echo "<script>window.location='workerpanel.php';</script>";
}
if($_SESSION[randnumber]  == $_POST[randnumber])
{
if(isset($_POST[submit]))
{
	$sql = "SELECT * FROM worker WHERE login_id='$_POST[emailid]' AND password='$_POST[password]' AND status='Active' ";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION[workerid] = $rslogin[worker_id]; 		
				echo "<script>window.location='workerpanel.php';</script>";
	}
	else
	{
		echo "<script>alert('Login ID and password not valid..');</script>";	
	}
}
}
$randnumber = rand();
$_SESSION[randnumber] = $randnumber;
?>

		<div id="featured">
			<div class="container">
				<div class="row">
<?php include("leftsidebar.php");
?>				 
					<div class="9u">
						<section>
						  <header>
								<h2 style="margin-left:240px;color:#660033">WORKER LOGIN PANEL</h2>
							</header>
							<center>
                               <form method="post" action="" name="frmworklogin" onSubmit="return validateworklogin()">
                                  <input type="hidden" name="randnumber" value="<?php echo $randnumber; ?>" >
						  <table width="446" height="123" border="2">
						    <tbody>
						      <tr>
						        <td width="77" align="right">E-Mail ID</td>
						        <td width="351"><input type="text" name="emailid" id="emailid" autofocus></td>
					          </tr>
						      <tr>
						        <td align="right">Password</td>
						        <td><input type="password" name="password" id="password">&nbsp;<a href="workerforgotpassword.php">Forgot Password?</a><br></td>
					          </tr>
						      <tr>
						        <td>&nbsp;</td>
						        <td><input type="submit" name="submit" id="submit" value="Login" style="background-color:#80ff80;width:30%;height:60%;border-radius:20px;font-weight:bold"></td>
					          </tr>
					        </tbody>
					      </table>
                          </form>
						  </center>
						   <text style="font-weight:bold;margin-left:200px">Not yet a member?</text>
						  <a style="color:blue" href="worker.php" > Click here to Register</a><br />	<br />
						  <p>&nbsp;</p>
							
						</section>
					</div>
					<img src="images/Workers.png" alt="" width="200" height="200" style="margin-left:820px;margin-top:-280px"></a>
					
				</div>
			</div>
		</div>


	

	<?php include("footer.php");?>
	<script type="application/javascript">
function validateworklogin()
{
	
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; 

	if(document.frmworklogin.emailid.value == "")
	{
		alert("E-Mail ID should not be empty..");
		document.frmworklogin.emailid.focus();
		return false;
	}
	else if(!document.frmworklogin.emailid.value.match(emailExp))
	{
		alert("Kindly enter Valid Email ID.");
		document.frmworklogin.emailid.focus();
		return false;
	}
	else if(document.frmworklogin.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmworklogin.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>