<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">         
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Mynavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a href="index.php" class="navbar-brand">
                    <span style="color:red; padding:0;"><strong>C</strong></span>
                    <span style=" margin:-1px;"><strong>t</strong></span>
                    <span style="color:blue; margin:-1px;"><strong>₹</strong></span>
                    <span style="color:yellow;  margin:-1px;"><strong>l</strong></span>
                    Budget
                    </a>
        </div>       
        <div class="collapse navbar-collapse" id="Mynavbar">
            <ul class="nav navbar-nav navbar-right ">
                <?php 
                if(isset($_SESSION['email'])) { 
                    ?>
                    <li ><a href="aboutus.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
                    <li ><a href="settings.php"><span class="glyphicon glyphicon-cog"></span > Change Password</a></li>
                    <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>         
                <?php 
                } else {
                     ?>
                    <li ><a href="aboutus.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
                    <li ><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
                    <li ><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

                <?php 
                       } ?>         
            </ul>
        </div>
    </div>
</nav>