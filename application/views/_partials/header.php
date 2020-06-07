<body class="body">

    <!-- header -->
    <header class="header">
        <div class="header__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header__content">
                            <!-- header logo -->
                            <a href="<?=base_url()?>" class="header__logo">
                                <img src="<?=base_url('_themes/')?>img/logo.png" alt="">
                            </a>
                            <!-- end header logo -->

                            <!-- header nav -->
                            <ul class="header__nav">

                                <li class="header__nav-item">
                                    <a class="header__nav-link header__nav-link" href="<?=base_url()?>">Home</a>
                                </li>

                                <li class="header__nav-item">
                                    <a class="header__nav-link header__nav-link"
                                        href="<?=base_url('animes')?>">Anime's</a>
                                </li>
                                <li class="header__nav-item">
                                    <a class="header__nav-link header__nav-link"
                                        href="<?=base_url('genres')?>">Genre's</a>
                                </li>
                                <li class="header__nav-item">
                                    <a class="header__nav-link header__nav-link"
                                        href="<?=base_url('seasons')?>">Season's</a>
                                </li>
                                <!-- dropdown -->
                                <!-- <li class="dropdown header__nav-item">
                                    <a class="dropdown-toggle header__nav-link header__nav-link--more" href="#"
                                        role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><i class="icon ion-ios-more"></i></a>

                                    <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="profile.html">Profile</a></li>
                                        <li><a href="signin.html">Sign In</a></li>
                                        <li><a href="signup.html">Sign Up</a></li>
                                        <li><a href="forgot.html">Forgot password</a></li>
                                        <li><a href="privacy.html">Privacy Policy</a></li>
                                        <li><a href="contacts.html">Contacts</a></li>
                                        <li><a href="404.html">404 Page</a></li>
                                    </ul>
                                </li> -->
                                <!-- end dropdown -->
                            </ul>
                            <!-- end header nav -->

                            <!-- header auth -->
                            <div class="header__auth">
                                <button class="header__search-btn" type="button">
                                    <i class="icon ion-ios-search"></i>
                                </button>

                                <a href="javascript:void(0)" class="header__sign-in">
                                    <i class="icon ion-ios-log-in"></i>
                                    <span>LOGIN</span>
                                </a>
                            </div>
                            <!-- end header auth -->

                            <!-- header menu btn -->
                            <button class="header__btn" type="button">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <!-- end header menu btn -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- header search -->
        <form action="<?=base_url('search')?>" method="POST" class="header__search">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header__search-content">
                            <input type="text" name="search"
                                placeholder="Masukan Nama Pencarian Anime Anda..">
                            <button type="submit">search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- end header search -->
    </header>
    <!-- end header -->