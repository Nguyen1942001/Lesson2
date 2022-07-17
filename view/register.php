<?php require 'view/layout/header.php' ?>
<body>
    <section>
        <div class="container">
            <div class="row">

                <!-- Menu -->
                <div class="col-md-12">
                    <div class="sub-container m-auto">
                        <div class="row align-items-center">
                            <div class="col-md-9 col-sm-9">
                                <ul class="navbar-nav">
                                    <li>
                                        <a href="index.php?c=listStaff&a=listStaff" class="nav-link">Home</a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link active">Register</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <a href="#">
                                    <img src="upload/logo.jpg" alt="logo" class="logo">
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
                        <form class="text-left clearfix form-register" action="index.php?c=register&a=register" method="POST">
                            <div class="form-group">
                                <label for="">Full name</label>
                                <input type="text" name="fullname" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="">Email address</label>
                                <input type="email" name="email" class="form-control" >
                                <label id="email" for="">We'll never share your email with anyone else</label>
                            </div>
        
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="">Confirm password</label>
                                <input type="password" name="confirm_password" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="">Role</label>
                                <select class="form-control" name="role_id" id="">
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                            </div>
        
                            <div>
                                <button type="submit" class="btn text-center bg-primary">Register</button>
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