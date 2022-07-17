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
                                        <a href="index.php?c=listStaff&a=listStaff" class="nav-link active">Home</a>
                                    </li>
                                    <li>
                                        <a href="index.php?c=authentication&a=logout" class="nav-link">Logout</a>
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
                <div class="col-md-12">
                    <div class="sub-container text-center m-auto">
                        <div class="search">
                            <form action="index.php?c=listStaff&a=listStaff" method="GET">
                                <input type="search" class="form-control" placeholder="Search" name="search" value="<?=$search?>">
                                <button type="submit" class="btn-search" hidden></button>
                            </form>
                        </div>

                        <div class="number-result text-left">
                            <p>Search found <b><?=count($totalStaffs)?></b> results</p>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($staffs as $staff): ?>
                                        <tr>
                                            <td><?=$staff->getId()?></td>
                                            <td><?=$staff->getFullname()?></td>
                                            <td><?=$staff->getEmail()?></td>
                                            <td><?=$staff->getRole()->getName()?></td>
                                            <td>
                                                <a href="index.php?c=update&a=showDetail&id=<?=$staff->getId()?>" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="index.php?c=delete&a=deleteUser&id=<?=$staff->getId()?>" onclick="return confirm('Do you want to delete this user?')" title="Delete"><i class="fas fa-ban"></i></a>
                                                <a href="index.php?c=register&a=showRegister" title="Register"><i class="far fa-clipboard"></i></a>
                                                <a href="index.php?c=update&a=showDetail&id=<?=$staff->getId()?>" title="Edit"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php if ($page != 1): ?>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="goToPage(<?=$page-1?>)">Previous</a></li>
                    <?php endif ?>

                    <?php for ($i = 1; $i <= $pageNumber; $i++): ?>
                        <li class="page-item <?=$page == $i ? "active" : ""?>"><a class="page-link" href="javascript:void(0)" onclick="goToPage(<?=$i?>)"><?=$i?></a></li>
                    <?php endfor ?>

                    <?php if ($page != $pageNumber): ?>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="goToPage(<?=$page+1?>)">Next</a></li>
                    <?php endif ?>
                </ul>
              </nav>

            <footer>
                <p>Copy right @ 2022 - All right reserved</p>
            </footer>
        </div>
    </section>


<?php require 'view/layout/footer.php' ?>