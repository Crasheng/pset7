<form action="register.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="e_mail" placeholder="e_mail" type="email"/>
        </div>

        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">    
            <input class="form-control" name="confpass" type="password" placeholder="confirm password" required/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Register!</button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">Login</a> to your account
</div>


