<h1>Register</h1>


<div>
    <?php if (isset($error)) echo $error;?>
    <?php echo form_open_multipart('/Account/submitRegister');?>
    
        <label>Username:</label>
        <br>
        <input type="text" name="username">
        <br><br>
        <label>Password:</label>
        <br>
        <input type="text" name="password">
        <br><br>
        <label>Avatar:</label>
        <br>
        <input type="file" name="userfile" accept="image/*">
        <br><br>
        <input type="submit" value="register">
    </form>
</div>