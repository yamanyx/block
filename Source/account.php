<?php
require("core.php");
head();

$sec_username = $_SESSION['sec-username'];
?>
<div class="content-wrapper">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<section class="content-header">
    			  <h1><i class="fa fa-user"></i> Account</h1>
    			  <ol class="breadcrumb">
   			         <li><a href="dashboard.php"><i class="fa fa-home"></i> Admin Panel</a></li>
    			     <li class="active">Account</li>
    			  </ol>
    			</section>


				<!--Page content-->
				<!--===================================================-->
				<section class="content">
                    
                <div class="row">                  
                    
				<div class="col-md-12">
				
<form class="form-horizontal" action="" method="post">
                    <div class="box">
						<div class="box-header">
							<h3 class="box-title">Edit Account</h3>
						</div>
				        <div class="box-body">
                               <div class="form-group">
											<label class="col-sm-4 control-label">Username: </label>
											<div class="col-sm-8">
												<input type="text" name="username" class="form-control" value="<?php
    echo $settings['username'];
?>" required>
											</div>
										</div>
                                        <hr>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">New Password: </label>
											<div class="col-sm-8">
												<input type="text" name="password" class="form-control">
											</div>
										</div>
                                        <br /><i>Fill this field only if you want to change the password.</i>
                        </div>
                        <div class="panel-footer">
							<button class="btn btn-flat btn-success btn-block" name="edit" type="submit">Save</button>
				        </div>
				     </div>
</form>
<?php
if (isset($_POST['edit'])) {
    $username = addslashes($_POST['username']);
    $password = $_POST['password'];

	$settings['username'] = $username;
    $_SESSION['sec-username'] = $username;
	
    if ($password != null) {
        $password             = hash('sha256', $_POST['password']);
		
        $settings['password'] = $password;
    }
	
    file_put_contents('config_settings.php', '<?php $settings = ' . var_export($settings, true) . '; ?>');
	echo '<meta http-equiv="refresh" content="0;url=account.php">';
}
?>
				</div>
				</div>
                    
				</div>
				<!--===================================================-->
				<!--End page content-->


			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->

<?php
footer();
?>