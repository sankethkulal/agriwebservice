<?php
if(!isset($_SESSION)) { session_start(); }
include("header.php");
include("dbconnection.php");
if(isset($_SESSION["adminid"]))
{
	echo "<script>window.location='adminpanel.php';</script>";
}
//Set
if($_SESSION[randnumber]  == $_POST[randnumber])
{
if(isset($_POST[submit]))
{
	$sql = "SELECT * FROM admin WHERE login_id='$_POST[emailid]' AND password='$_POST[password]' AND status='Active' ";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION[adminid] = $rslogin[admin_id];
		echo "<script>window.location='adminpanel.php';</script>";
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
<?php
include("leftsidebar.php");
?>	
					<div class="9u">
						<section>
							<header>
								<h2 style="margin-left:200px;color:#660033">ADMIN LOGIN PANEL</h2>
							</header>
							<center>
                            <form method="post" action=""   name="frmadminlogin" onSubmit="return validateadminlogin()">
                            <input type="hidden" name="randnumber" value="<?php echo $randnumber; ?>" >
							<table width="502" height="148" border="2" >
							  <tbody>
							    <tr>
							      <th width="63" align="right">Login ID</th>
							      <td width="421"> <input type="text" name="emailid" id="emailid" autofocus></td>
						        </tr>
							    <tr>
							      <th width="63" align="right">Password</th>
							      <td><input type="password" name="password" id="password"></td>
						        </tr>
							    <tr>
							      <td>&nbsp;</td>
							      <td><input type="submit" name="submit" id="submit" value="Login"  style="background-color:#80ff80;width:25%;height:50%;border-radius:20px;font-weight:bold"/></td>
						        </tr>
						      </tbody>
						  </table>
                          </form>
							</center>
						</section>
					</div>
					<img src="images/women.png" alt="" width="200" height="200" style="margin-left:680px;margin-top:-240px"></a>
				</div>
			</div>
		</div>
<?php include("footer.php");?>
<script type="application/javascript">
function validateadminlogin()
{
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(document.frmadminlogin.emailid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmadminlogin.emailid.focus(); 
		return false;
	}
	else if(document.frmadminlogin.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmadminlogin.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>