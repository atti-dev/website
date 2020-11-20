<template>
    <div class="banner mb-5">
        <div class="container-xxl">
            <div class="row py-3 py-md-4">
                <div class="col-md-7 pl-md-0 d-flex align-items-center">
                    <div class="">
                        <h1 class="h1 text-center text-md-left py-3 p-md-4 rounded text-head text-banner font-weight-bold">
                            ADVANCED TECHNOLOGY TRAINING INSTITUTE
                        </h1>
                        <p class="my-4 px-md-4 text-light text-center">
                            We offer our student national and international certified courses, A variety of career options We also specialise in vendor specific international courses with testing delivered through Pearson’s Vue
                        </p>
                        <p class="text-center">
                            <router-link :to="{ name: 'EnrollCourse' }" class="btn btn-lg btn-success border border-w-2">Register Online Now</router-link>
                        </p>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="@/assets/images/bannerUnsplash.jpg" class="img-fluid rounded-circle border-w-3 border-right border-bottom border-warning p-1" alt="">
                </div>
            </div>
        </div>
    </div>
</template>