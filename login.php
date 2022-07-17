<?php require 'view/layout/header.php' ?>
<body>
    <section id="login">
        <div class="container">
            <div class="row">

                <!-- Menu -->
                <div class="col-md-12">
                    <div class="sub-container m-auto">
                        <div class="row align-items-center">
                            <div class="col-md-9 col-sm-9">
                                <ul class="navbar-nav">
                                    <li>
                                        <a href="#" class="nav-link">Home</a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link active">Login</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <a href="#">
                                    <img src="upload/logo.jpg" alt="" class="logo">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <?php require 'view/layout/notification.php' ?>
                </div>
                
                <!-- Form nhập -->
                <div class="col-md-8 m-auto">
                    <div class="block text-center">
                        <form class="text-left clearfix form-login" action="index.php?c=authentication&a=login" method="POST">
                            <div class="form-group">
                                <label for="">Email address</label>
                                <input type="email" name="email" class="form-control">
                                <label id="email" for="">We'll never share your email with anyone else</label>
                            </div>
        
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="keep-sign-in">
                                <input type="checkbox" id="remember-me" name="remember-me" value="1">
                                <label for="remember-me">
                                    Remember me
                                </label>
                            </div>
        
                            <div>
                                <button type="submit" class="btn text-center bg-primary">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <footer>
                <p>Copy right @ 2022 - All right reserved</p>
            </footer>
        </div>
    </section>

<?php require 'view/layout/footer.php' ?>