
<?php include './Views/includes/header.php'; ?>

<form action = "/?controller=signin" method="POST" class="signin-form">
    <table cellpadding="3">
        <tr>
            <td> <h1 class="signin-title"> Sign In </h1> </td>
        </tr>
        <tr>
            <td class = "signin-field" > Username </td>
        </tr>
        <tr>
            <td> <input type="text" id="username" name="username" class = "signin-input" placeholder="Enter username" required /> </td>
        </tr> 
        <tr>
            <td class = "signin-field"> Password </td>
        </tr>
        <tr>
            <td> <input type="password" id="pass" name="pass" class = "signin-input" placeholder="Enter password" required /> </td>
        </tr>
        <tr>
            <td> <input type="submit" id="submit" name="SubmitSignin" value="Sign in" class = "signin-submit"/> </td>
        </tr>
        <tr>
            <td class = "signin-message"> <?= $messageSignin ?> </td>
        </tr>

    </table>

</form>

</body>
</html>


