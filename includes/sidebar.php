<div class="well">
    <h4>Search</h4>
    <form action="search.php" method="post">
        <div class="input-group">
            <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
        </div>
    </form>
</div>

<div class="well">
    <?php if (! isset($_SESSION['username'])) { ?>
    <h4>Login</h4>
    <form action="includes/login.php" method="post">
        <div class="form-group">
            <input name="username" type="text" class="form-control" placeholder="Username">
        </div>

        <div class="input-group">
            <input name="user_password" type="password" class="form-control" placeholder="Password">
            <span class="input-group-btn">
                <button class="btn btn-primary" name="login" type="submit">Login</button>
            </span>
        </div>

    </form>
<?php } else { ?>
    <h1>Witaj <?php echo $_SESSION['username']; ?> !</h1>
        <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i>wyloguj</a>
<?php } ?>
</div>