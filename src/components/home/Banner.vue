<template>
    <div class="banner mb-5">
        <div class="container-xxl">
            <div class="row py-4 py-md-5">
                <div class="col-md-7 pl-md-4">
                    <h1 class="h1 text-head text-banner font-weight-bold animate__animated animate__pulse animate__delay-1s">
                        ADVANCED TECHNOLOGY TRAINING INSTITUTE
                    </h1>
                    <p class="my-3 text-dark">
                        We offer our student national and international certified courses, A variety of career options We also specialise in vendor specific international courses with testing delivered through Pearson’s Vue
                    </p>
                    <p class="mt-3 text-center">
                        <router-link :to="{ name: 'Registration' }" class="btn btn-lg btn-success border border-w-2">Register Online Now</router-link>
                    </p>
                </div>
                <div class="col-md-5">
                    <!-- <img src="@/assets/images/computersystems.png" alt=""> -->
                </div>
            </div>
        </div>
    </div>
</template>