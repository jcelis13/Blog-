<br><center><div class="container">
		<form method="post" action="<?php echo base_url();?>index.php/user/insert_user_db">
				<table width="400" border="0" cellpadding="5">
					<tr>
						<th width="213" align="right" scope="row">Enter your first name</th>
						<td width="161"><input type="text" name="firstname" size="20" /></td>
					</tr>	
					<tr>
						<th width="213" align="right" scope="row">Enter your last name</th>
						<td width="161"><input type="text" name="lastname" size="20" /></td>
					</tr>	
					<tr>
						<th width="213" align="right" scope="row">Enter your username</th>
						<td width="161"><input type="text" name="username" size="20" /></td>
					</tr>	
					<tr>
						<th width="213" align="right" scope="row">Enter your password</th>
						<td width="161"><input type="password" name="password" size="20" /></td>
					</tr>	
					<tr>
						<th width="213" align="right" scope="row">Confirm password</th>
						<td width="161"><input type="password" name="confirmpassword" size="20" /></td>
					</tr>	
					<tr>
					<td><input type="submit" name="submit" value="Send" /></td>
					</tr>
				</table>
				
		</form>
	

</div></center>