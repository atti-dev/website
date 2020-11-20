<template>
    <nav class="navbar navbar-expand-lg shadow-sm navbar-dark bg-navbar py-2 py-md-1"><!-- py-sm-2 py-md-0 --->
        <div class="container-fluid">
            <router-link class="navbar-brand py-0 py-md-1" to="/">
                <img alt="ATTI logo" src="@/assets/logo.png" width="130">
            </router-link>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2 mx-lg-3">
                        <router-link to="/" class="nav-link" aria-current="page">Home</router-link>
                    </li>
                    <li class="nav-item mx-2 mx-lg-3">
                        <router-link :to="{ name: 'EnrollCourse' }" class="nav-link">Register Online</router-link>
                    </li>
                    <li class="nav-item mx-2 mx-lg-3">
                        <router-link :to="{ name: 'Courses' }" class="nav-link">Courses</router-link>
                    </li>
                    <!-- <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Courses
                        </a>
                        <ul class="dropdown-menu py-0" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item py-2" href="#">DMI</a></li>
                            <li><a class="dropdown-item py-2" href="#">Microsoft</a></li>
                            <li><a class="dropdown-item py-2" href="#">CompTIA</a></li>
                            <li><a class="dropdown-item py-2" href="#">MictSETA</a></li>
                            <li><a class="dropdown-item py-2" href="#">Advetising</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item py-2" href="#">Journalism</a></li>
                            <li><a class="dropdown-item py-2" href="#">ICB Bussiness Management</a></li>
                            <li><a class="dropdown-item py-2" href="#">ICB Office Administration</a></li>
                            <li><a class="dropdown-item py-2" href="#">ICB Finacial Accounting</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item mx-2 mx-lg-3">
                        <router-link :to="{ name: 'Contact' }" class="nav-link">Contact</router-link>
                    </li>
                    <li class="nav-item mx-2 mx-lg-3">
                        <router-link :to="{ name: 'About' }" class="nav-link">About</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>