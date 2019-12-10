<h2>Register</h2>
<hr>

<form action="include/register_process.php" method="POST" enctype="multipart/form-data">

    UserName:
    <br>
    <input type="text" name="user_name" size="20" maxlength="15" placeholder="Cell Phone Number">
    <br>
    Password:
    <br>
    <input type="password" name="password" size="20" maxlength="15">
    <br>
    Comfirm Password:
    <br>
    <input type="password" name="confirm_password" size="20" maxlength="15">
    <br>

    <input type="submit" name="submit" value="Register">
    <input type="button" onclick="window.location.href='login.php'" value="Go to Log In">
</form>
