<template>
    <nav class="navbar navbar-expand-lg shadow-sm navbar-light bg-light py-sm-2 py-md-1"><!-- py-sm-2 py-md-0 --->
        <div class="container-fluid">
            <router-link class="navbar-brand" to="/">
                <img alt="ATTI logo" src="@/assets/logo.png" width="108">
            </router-link>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                        <router-link to="/" class="nav-link" aria-current="page">Home</router-link>
                    </li>
                    <li class="nav-item mx-2">
                        <router-link :to="{ name: 'Registration' }" class="nav-link" href="#">Register Online</router-link>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Courses
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">DMI</a></li>
                            <li><a class="dropdown-item" href="#">Microsoft</a></li>
                            <li><a class="dropdown-item" href="#">CompTIA</a></li>
                            <li><a class="dropdown-item" href="#">MictSETA</a></li>
                            <li><a class="dropdown-item" href="#">Advetising</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Journalism</a></li>
                            <li><a class="dropdown-item" href="#">ICB Bussiness Management</a></li>
                            <li><a class="dropdown-item" href="#">ICB Office Administration</a></li>
                            <li><a class="dropdown-item" href="#">ICB Finacial Accounting</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <router-link :to="{ name: 'Contact' }" class="nav-link" href="#">Contact</router-link>
                    </li>
                    <li class="nav-item mx-2">
                        <router-link :to="{ name: 'About' }" class="nav-link" href="#">About</router-link>
                    </li>
                    <div class="nav-item dropdown mx-2">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" data-display="static" aria-expanded="false">
                            <span class="fa fa-5 fa-th-large"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg-right">
                            <li>
                                <button class="dropdown-item" type="button">
                                    <span class="fa fa-user-graduate pr-1"></span>
                                    Student Login
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <span class="fa fa-sign-in-alt pr-1"></span>
                                    Administration Panel
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    other link
                                </button>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</template>