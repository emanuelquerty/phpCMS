<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-md navbar-light bg-primary">
            <a class="navbar-brand ml-2 mr-4" href="../index.php">CMS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <form class="form-inline my-2 my-lg-0 userinfo-form">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link email"><?php  echo $_SESSION['fullname'][0]  ?></a>
                        </li>
                        <li class="nav-item logout-btn">
                            <a class="nav-link" href="#" id="logout-btn"> Logout</a>
                        </li>
                    </ul>
                </form>
            </div>
        </nav>
    </div>
</div>