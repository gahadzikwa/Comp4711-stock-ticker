<h1>Register</h1>
<div class="col-md-4">
    <?php if (isset($error)) echo $error;?>
    <?php echo form_open_multipart('/account/submitRegister');?>
    <form role="form" action="/account/submitRegister" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label for=avatar">Avatar:</label>
            <input type="file" name="userfile" accept="image/*">
        </div>
        <button type="submit" class="btn btn-default pull-right">Submit</button>
    </form>
</div>