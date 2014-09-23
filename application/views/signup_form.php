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
		text-align: center;
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
margin-left: 10%;
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
submit{
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
submit:hover{
background: linear-gradient(#36caf0 5%, #22abe9 100%);
}

	</style>

</head>
<body>
<div class="container">
<h1>create an account!</h1>
<?php
echo form_open('login/create_member');

echo "<p> first name:";
echo form_input('first_name',set_value('first_name',''));

echo "<p> last name:";
echo form_input('last_name',set_value('last_name',''));
echo "<p>email";
echo form_input('email',set_value('email',''));
echo "<p>username:";
echo form_input('username',set_value('username',''));
echo "<p>password:";
echo form_input('password','','placeholder="" class="password"');
echo "<p>password confirm:";
echo form_input('password_confirm','','placeholder="" class="password_confirm"');
echo form_submit('submit','create account');
echo "<p>click here:";
echo anchor('login/index','go to login');
?>
<?php echo validation_errors('<p class="error">');?>
</div>
</body>
</html>


