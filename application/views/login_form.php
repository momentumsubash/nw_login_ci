<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>login page</title>
	<style type="text/css">
	.login_button{
		text-align: center;
	}
	.container{
		
	}
	form{
width: 345px;
padding: 0px 50px 20px;
background-color: whitesmoke;
border: 1px solid #ccc;
box-shadow: 0 0 5px;
font-family: 'Marcellus', serif;
float:left;
margin-top: 15px;
margin-left: 40%;
}
h1{
text-align: center;
font-size: 28px;
}
hr{
border: 0;
border-bottom: 1.5px solid #ccc;
margin-top: -10px;
margin-bottom: 30px;
}
label{
font-size: 17px;
}
input{
width: 100%;
padding: 10px;
margin: 6px 0 20px;
border: none;
box-shadow: 0 0 5px;
}
#submit{
padding: 10px;
text-align: center;
box-shadow: 0 0 5px;
font-size: 18px;
background: linear-gradient(#22abe9 5%, #36caf0 100%);
border: 1px solid #0F799E;
color: #ffffff;
font-weight: bold;
cursor: pointer;
text-shadow: 0px 1px 0px #13506D;
}
#submit:hover{
background: linear-gradient(#36caf0 5%, #22abe9 100%);
}

	</style>

</head>
<body>

<div class="container">
<?php if(isset($account_created)){?><h3><?php echo $account_created;?></h3>
<?php } else{?>
	<h1>login!</h1>
	<?php } ?>
	<?php
	echo form_open('login/validate_credentials');
	echo validation_errors();
	echo "<p> username:";
	echo form_input('username','');
	echo "<p> password:";
	echo form_password('password','',' class="password"');
	echo "<p>";
	?>

	<div class="login_button">
	<div id="submit">
	<?php
		echo form_submit('submit','login');
		?>
	</div>
	<?php
	echo "<p> click here:";
	echo anchor('login/signup','create account');
	

	echo form_close();
	?>
	</div>


</div>

</body>
</html>