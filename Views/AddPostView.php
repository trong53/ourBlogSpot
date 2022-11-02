<?php include 'includes/header.php'; ?>

<form action = "/?controller=AddPost" method="post" style = "margin-left:20px">

    <table>
        <tr>
            <td colspan="2"> <h2 style="margin: 20px 0 40px 0;"> Add new article </h2> </td>
        </tr>	
        <tr>
            <td nowrap="nowrap"> <label for="title" style="font-size : 1.2rem; margin : 10px 20px 10px 0;" > Title of the article : </label> </td>
            <td> <input type="text" id="title" name="title" style="font-size : 1.2rem; margin : 10px 20px 10px 0; width:500px;" required /> </td>
        </tr>
        <tr>
            <td> <label for="content" style="font-size : 1.2rem; margin : 10px 20px 10px 0;" > Content : </label> </td>
            <td> <textarea name="content" id="content" rows="10" cols="120" style="font-size : 1.2rem; margin : 10px 20px 10px 0;" required> </textarea> 
                <script>CKEDITOR.replace('content');</script>
            </td>
        </tr>
        <tr>
            <td nowrap="nowrap"> <label for="is_public" style="font-size : 1.2rem; margin : 10px 20px 10px 0;" > Public of the article ? : </label> </td>
            <td> <input type="checkbox" id="is_public" name="is_public" value="1" /> <span style="font-size : 1.2rem; margin : 10px 20px 10px 0;" > public </span> </td>
                                        <!-- when we check, the value of is_public will be 1-->
        </tr>
        <tr>
            <td colspan="2" align="center"> <input type="submit" name="AddPostsubmit" value="Add the article" style="font-size : 1.5rem; margin : 10px 20px 10px 0; padding: 5px 10px;" /> </td>
        </tr>
        <tr>
            <td colspan="2" style = "font-size : 1.2rem; font-weight: 600; margin:30px 0; text-align: center;"> <?= $messageAddPost ?> </td>
        </tr>

    </table>
    
</form>


<?php include 'includes/footer.php'; ?>