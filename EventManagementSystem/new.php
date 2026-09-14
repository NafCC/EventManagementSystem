<html>

<head>

<title>Registration</title>
<link rel="stylesheet" href="style.css">
</head>





<body>
<h1>EventWave - Where Every Event Begins</h1>
<a href="login.php" class="login-button">Login</a>
 <h2>Registration Form</h2>





<form method="POST" action="form.php">
<label>Name:</label><br>
<input type="text" name="name">
<br>


<label>Password:</label><br>

<input type="password" name="password">

<br>





<label>Confirm Password:</label><br>

<input type="password" name="confirm_password">

<br>




<label>Age:</label><br>

<input type="number" name="age">
<br>


    


<label>Gender:</label><br>

<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female
<input type="radio" name="gender" value="Other"> Other
<br><br>

<label>Email:</label><br>

<input type="email" name="email" id="email" onkeyup="checkEmail()">

<span id="emailMessage"></span>

<br><br>



<label>Phone:</label><br>

<input type="text" name="phone">

<br><br>


<label>Organization Name:</label><br>

<input type="text" name="organization">

<br>


<label>Role:</label><br>

<select name="role">
<option value="">-- Select Role --</option>
<option value="admin">Admin</option>
<option value="organizer">Organizer</option>
</select>
<br><br>
<input type="submit" name="submit" value="Register">
</form>






<?php

if (isset($_GET['message'])) {
echo '<div class="message">' . $_GET['message'] . '</div>';

}

?>

<script src="ajax.js"></script>

</body>

</html>