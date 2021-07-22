<?php include("header.php");
include("dbconnection.php");
if(isset($_GET[deleteid]))
{
	$sql = "DELETE FROM feedback WHERE id='$_GET[deleteid]'";
	if(!mysqli_query($con,$sql))
	{
		echo "<script>alert('Failed to delete record'); </script>";
	}
	else
	{
		if(mysqli_affected_rows($con)  >= 1)
		{
		echo "<script>alert('This feedback deleted successfully..'); </script>";
		}
	}
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
								<h2 style="color:#660033">Users Feedback</h2>
							</header>
                            <?php
							
							  $sql = "SELECT * FROM feedback";
							  $qsql = mysqli_query($con,$sql);

							 if(mysqli_num_rows($qsql)  == 0)
									{
										echo "<center>There is no feedback to display!!</center>";
									}
									else
									{
							?>
							<table width="946" height="38" border="1" class="tftable">
							  <tr>
							    <th height="32"><strong>Name</strong></th>
							    <th><strong>Email ID</strong></th>
							    <th><strong>Contact Number</strong></th>
							    <th><strong>Website</strong></th>
		                        <th><strong>Subject</strong></th>
							    <th><strong>Message</strong></th>
                                <th><strong>Action</strong></th>
						      </tr>
                                <?php
								 while($rs = mysqli_fetch_array($qsql))
							  {
								  
							  echo "
							  <tr>
							    <td>&nbsp;$rs[name]</td>
							    <td>&nbsp;$rs[email],<br>
							    <td>&nbsp;$rs[number]</td>
							    <td>&nbsp;$rs[website]</td>
							    <td>&nbsp;$rs[subject]</td>
							    <td>&nbsp;$rs[message]</td>
							    <td>&nbsp; <a href='viewfeedback.php?deleteid=$rs[id]' onclick='return delconfirm()'>Delete</a></td>
						      </tr>";
							  }
							  ?>
						  </table>
							<?php
									}
							?>
							
						</section>
					</div>
				</div>
			</div> 
		</div>
	<?php include("footer.php");?>
	<script type="application/javascript">
function delconfirm()
{
	if(confirm("Are you sure you want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>	