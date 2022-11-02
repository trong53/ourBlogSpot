<?php include './Views/includes/header.php'; ?>

<form action = "/?controller=signup" method="POST" class="signin-form signup-form">
    <table cellpadding="3" class="signup-table">
        <tr>
            <td> <h1 class="signin-title"> Sign Up </h1> </td>
        </tr>
        <tr>
            <td class = "signin-field" > Username </td>
        </tr>
        <tr>
            <td> <input type="text" id="username" name="username" class = "signin-input" placeholder=" <?= $Validation_Params['username']['bad_value'] ?> " required />
            </td>
            <td> <span class="signup-error"> <?= $Validation_Params['username']['error'] ?> </span> </td>
        </tr> 
        <tr>
            <td class = "signin-field"> Password </td>
        </tr>
        <tr>
            <td> <input type="password" id="pass" name="pass" class = "signin-input" placeholder=" <?= $Validation_Params['pass']['bad_value'] ?> " required />
            </td>
            <td> <span class="signup-error"> <?= $Validation_Params['pass']['error'] ?> </span> </td>
        </tr>
        <tr>
            <td class = "signin-field"> Name </td>
        </tr>
        <tr>
            <td> <input type="text" id="name" name="name" class = "signin-input" placeholder=" <?= $Validation_Params['name']['bad_value'] ?> " required />
            </td>
            <td> <span class="signup-error"> <?= $Validation_Params['name']['error'] ?> </span> </td>
        </tr>
        <tr>
            <td class = "signin-field"> Email </td>
        </tr>
        <tr>
            <td> <input type="email" id="email" name="email" class = "signin-input" placeholder=" <?= $Validation_Params['email']['bad_value'] ?> " required />
            </td>
            <td> <span class="signup-error"> <?= $Validation_Params['email']['error'] ?> </span> </td>
        </tr>
        <tr>
        <td> <input type="submit" id="submit" name="SubmitSignup" value="Inscription" class = "signin-submit"/> </td>
        </tr>
        <tr>
            <td> <input type="submit" id="submit" name="reset" value="Reset" class = "signin-submit signup-reset"/> </td>
        </tr> 
        <tr>
            <td class = "signin-message"> <?= $messageSignup ?> </td>
        </tr>
    </table>
</form>
</body>
</html>


<!--
<div style="display>
    <h1> Inscription </h1>
	<form action="signup.php" method="post">
        <label for="username"> Username : </label>
        <input type="text" id="username" name="username" />
		<br/>

        <label for="password"> Password : </label>
        <input type="password" id="pass" name="pass" />
        <br/>

        <label for="name"> Name :         </label>
        <input type="text" id="name" name="name" />
        <br/>

        <label for="email"> Email :        </label>
        <input type="email" id="email" name="email" />
        <br/>

        <input type="submit" id="submit" name="submit" value="Inscription" />

	</form>
</div>
-->
