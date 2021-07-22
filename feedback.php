<?php 
include("header.php");
include("dbconnection.php");

if(isset($_POST[submit]))
{

$sql="INSERT INTO `feedback`(`name`, `email`, `number`, `website`, `subject`, `message`) VALUES ('$_POST[name]','$_POST[emailid]','$_POST[number]','$_POST[website]','$_POST[subject]','$_POST[message]')";	
if(!mysqli_query($con,$sql))
	{
		echo "Error in mysqli query".mysqli_error($con);
	}
	else
	{
				echo "<script>alert('Your feedback sent successfully');</script>";
				echo "<script>window.location='feedback.php';</script>";				
	}
}


if(isset($_GET[editid]))
{
	$sql = "SELECT * FROM feedback";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>
	

		<div id="featured">
			<div class="container">
				<div class="row">
<?php include("leftsidebar.php");
?>
					
					<div class="9u">
						<section>
							<header>
								<h2 style="margin-left:50px;color:#660033">Feedback / Contact Us</h2>
							</header>
					
                            <form method="post" action="" name="frmcstreg" onSubmit="return validatecstreg()">
                             
							<table width="965" height="585" border="2">
							  <tbody>
							    <tr>
							      <td width="136" height="34" align="right">Name <font color="#FF0000">*</font></td>
							      <td width="811"><input type="text" name="name" id="name" autofocus></td>
						        </tr>
							    <tr>
							      <td height="39" align="right">Email ID <font color="#FF0000"> *</font></td>
							      <td><input type="text" name="emailid" id="emailid" ></td>
						        </tr>
							    <tr>
							      <td height="35" align="right">Contact Number <font color="#FF0000"> *</font></td>
							      <td><input type="number" name="number" id="number" ></td>
						        </tr>

							    <tr>
							      <td height="36" align="right">Website </td>
							      <td><input type="text" name="website" id="website" ></td>
						        </tr>
							    <tr>
							      <td height="35" align="right">Subject <font color="#FF0000"> *</font></td>
							      <td><input type="text" name="subject" id="subject" ></td>
						        </tr>
							    <tr>
							      <td height="48" align="right">Message <font color="#FF0000">*</font></td>
							      <td><textarea name="message" id="message"></textarea></td>
						        </tr>		                         
							    <tr>
							      <td>&nbsp;</td>
							      <td><input type="submit" name="submit" id="submit" value="Submit" style="background-color:#b3f0ff;width:9%;height:8%;border-radius:20px;font-weight:bold">
								  <input type="reset" name="reset" id="reset" value="Reset" style="background-color:#ff3333;width:9%;height:8%;border-radius:20px;font-weight:bold"></td>
						        </tr>
						      </tbody>
						  </table>
                          </form>
						
							<p>&nbsp;</p>
							
						</section>
					</div>
				</div>
			</div>
		</div>
	<?php include("footer.php");?>
<script type="application/javascript">
function validatecstreg()
{
var alphaExp = /^[a-zA-Z]+$/; 
var alphaspaceExp = /^[a-zA-Z\s]+$/; 
var numericExpression = /^[0-9]+$/;
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; 

	if(document.frmcstreg.name.value == "")
	{
		alert("name should not be empty..");
		document.frmcstreg.name.focus();
		return false;
	}
	else if(!document.frmcstreg.name.value.match(alphaspaceExp))
	{
		alert("Please enter only letters for name..");
		document.frmcstreg.name.focus();
		return false;
	}
	else if(document.frmcstreg.emailid.value == "")
	{
		alert("Kindly enter Email ID..");
		document.frmcstreg.emailid.focus();
		return false;
	}		
	else if(!document.frmcstreg.emailid.value.match(emailExp))
	{
		alert("Kindly enter Valid Email ID.");
		document.frmcstreg.emailid.focus();
		return false;
	}
	else if(document.frmcstreg.number.value == "")
	{
		alert("Kindly enter Contact number..");
		document.frmcstreg.number.focus();
		return false;
	}
	else if(document.frmcstreg.subject.value == "")
	{
		alert("Subject should not be empty..");
		document.frmcstreg.subject.focus();
		return false;
	}
	else if(document.frmcstreg.message.value == "")
	{
		alert("Message should not be empty..");
		document.frmcstreg.message.focus();
		return false;
	}
	else
	{
		return true;
	}

}


</script>