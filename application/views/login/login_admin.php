<?php session_start(); session_unset(); session_destroy(); ?>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    .colorgraph {
        height: 5px;
        border-top: 0;
        background: Red;
        border-radius: 5px;
    }
</style>
<body>

<div class="container">
    <div class="row" style="margin-top:20px">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form action="http://localhost/agiledevTemplate/includes/server/index.php" method="POST">
                <fieldset>
                    <h2>Admin Login</h2>
                    <hr class="colorgraph">
                    <div class="form-group">
                        <input type="hidden" name="action" value="loginAdmin">
                        <input type="username" name="admin_username" id="admin_username" class="form-control input-lg" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="admin_password" id="admin_password" class="form-control input-lg" placeholder="Password">
                    </div>
                    <span class="button-checkbox">
					<button type="button" class="btn" data-color="info">
					<a href="login_user" class="btn btn-link pull-right">User</a></button>
				</span>
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

</div>
</body>
</html>