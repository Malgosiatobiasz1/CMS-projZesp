<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">nawigacja</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Projekt sklepu </a>
    </div>
    
    <ul class="nav navbar-right top-nav">
        <li><a href="../index.php">strona glowna</a></li>


        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                <?php
                if(isset($_SESSION['user_first_name'])){
                    echo $_SESSION['user_first_name'].$_SESSION['user_last_name'];
                    echo "<b class='caret'></b>";
                }
            ?>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="profile.php"><i class="fa fa-fw fa-user"></i>moje konto</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i>wyloguj</a>
                </li>
            </ul>
        </li>
    </ul>


    
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>ustawienia</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-arrows-v"></i>posty<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts" class="collapse">
                    <li>
                        <a href="posts.php">zobacz wszystkie</a>
                    </li>
                    <li>
                        <a href="posts.php?source=add-post">dodaj</a>
                    </li>
                </ul>
            </li>



            <li>
                <a href="categories.php"><i class="fa fa-fw fa-wrench"></i> kategorie</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#categories"><i class="fa fa-fw fa-arrows-v"></i> uzytkownicy<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="categories" class="collapse">
                    <li>
                        <a href="users.php">wszyscy uzytkownicy</a>
                    </li>
                    <li>
                        <a href="users.php?source=add-user">dodaj uzytkownika</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="comments.php"><i class="fa fa-fw fa-file"></i>komentarze</a>
            </li>
            <li>
                <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i>konto</a>
            </li>

        </ul>
    </div>
    
</nav>
