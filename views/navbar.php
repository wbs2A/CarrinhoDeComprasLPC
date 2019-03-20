<?php

echo '
<div class="super_container">

    <!-- Header -->

    <header class="header trans_300">

        <!-- Main Navigation -->

        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                            <a href="#">Comprinhas<span>Dahora</span></a>
                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li><a href="#">home</a></li>
                                <li><a href="htmlFiles/contact.html">contact</a></li>
                            </ul>
                            <ul class="navbar_user">
                                <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link  " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="fa fa-user" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a id="navUserTopo" class="dropdown-item row p-0 m-0 text-center href="login.php"><i class="fa m-2 fa-sign-in" aria-hidden="true"></i>Sign In</a>
                                        <a id="navUserBase" class="dropdown-item row p-0 m-0 text-center href="registrar.php"><i class="fa m-2 fa-user-plus" aria-hidden="true"></i>Register</a>
                                    </div>
                                  </li>
                               
                                <li class="checkout">
                                    <a href="#">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="checkout_items" class="checkout_items">2</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="hamburger_container">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <div class="fs_menu_overlay"></div>
    <div class="hamburger_menu">
        <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="hamburger_menu_content text-right">
            <ul class="menu_top_nav">
                <li class="menu_item has-children">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i><i class="fa fa-angle-down"></i></a>
                    <ul class="menu_selection">
                        <li>
                            <a id="navUserTopo" class="dropdown-item row p-0 m-0 text-center" href="login.php"><i class="fa m-2 fa-sign-in" aria-hidden="true"></i>Sign In</a>
                            <a id="navUserBase" class="text-center" href="registrar.php"><i class="fa m-2 fa-user-plus" aria-hidden="true"></i>Register</a>
                        </li>
                    </ul>
                </li>
                <li class="menu_item"><a href="#">home</a></li>
                <li class="menu_item"><a href="#">contact</a></li>
            </ul>
        </div>
    </div>
';