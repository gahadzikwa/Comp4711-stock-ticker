<h1>Sign In</h1>
<div class="col-md-4">
    <form role="form" action="/account/submitLogin" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-default pull-right">Sign In</button>
    </form>
</div>