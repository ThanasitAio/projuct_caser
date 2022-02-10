
<nav>
    <div class="container ">
        <div class="nav-bar">
            <span class="logo" style="padding-bottom:15px"><a href="">CASER</a></span>
                <ul class="nav-links">
                    <li><a href="../index.php">Home</a></li>
                </ul>
            <div class="menu">
                <ul class="nav-links">
                <?php
                if($user_type == 'admin'){
                    ?>
                    <li><a href="Admin/admin.php">Admin</a></li>
                    <?php
                }else if($user_type == 'user') {

                }
                
                if(isset($user_type)){
                   if($user_image == ''){
                        $part_image = 'not_imguser.png';
                    
                   }else {
                        $part_image = $user_image;
                   }
                   ?>
                    <li><img style="width:50px;height:50px; border-radius: 50%;" src="img/<?php echo $part_image; ?>" alt=""></li>
                    <li><b>Hello <?php echo $user_name; ?></b></li>
                    <li><a onclick="logout()"  id="logout">Logout</a></li>
                   <?php
                }else {
                    ?>
                    <li><a href="user/login">Login</a></li>
                    <li><a href="user/register">Register</a></li>
                   <?php
                }
                ?>
                    
                    
                </ul>
            </div>
        
        </div>
    </div>
</nav>