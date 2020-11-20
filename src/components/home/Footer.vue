<template>
    <div class="footer">
        <div class="container-fluid bg-light py-2 border-top border-w-3 ">
            <div class="row justify-content-center">
                <div class="col-3 col-md-2 col-lg-1 p-1">
                    <img src="@/assets/accreditation/comptia2.png" class="img-fluid" alt="" srcset="">
                </div>
                <div class="col-3 col-md-2 col-lg-1 p-1">
                    <img src="@/assets/accreditation/dmi2.png" class="img-fluid" alt="" srcset="">
                </div>
                <div class="col-3 col-md-2 col-lg-1 p-1">
                    <img src="@/assets/accreditation/fasset2.png" class="img-fluid" alt="" srcset="">
                </div>
                <div class="col-3 col-md-2 col-lg-1 p-1">
                    <img src="@/assets/accreditation/icb2.png" class="img-fluid" alt="" srcset="">
                </div>
                <div class="col-3 col-md-2 col-lg-1 p-1">
                    <img src="@/assets/accreditation/microsoftacademy2.png" class="img-fluid" alt="" srcset="">
                </div>
                <div class="col-3 col-md-2 col-lg-1 p-1">
                    <img src="@/assets/accreditation/mictseta2.png" class="img-fluid" alt="" srcset="">
                </div>
                <div class="col-3 col-md-2 col-lg-1 p-1">
                    <img src="@/assets/accreditation/pearsonvue2.png" class="img-fluid" alt="" srcset="">
                </div>
                <div class="col-3 col-md-2 col-lg-1 p-1">
                    <img src="@/assets/accreditation/servicesseta2.png" class="img-fluid" alt="" srcset="">
                </div>
                <div class="col-3 col-md-2 col-lg-1 p-1">
                    <img src="@/assets/accreditation/teta2.png" class="img-fluid" alt="" srcset="">
                </div>
            </div>
        </div>
        <div class="container-xl py-3">
            <div class="row">
                <div class="col-6 col-md-3 py-2">
                    <h5 class="font-weight-bold mt-1 mb-3 footer-text">Contact Information</h5>
                    <p class="my-2">
                        <a href="tel:013-755-2638" class="text-decoration-none">
                            <span class="fa fa-4 pr-1 fa-tty"></span>
                            013 755 2638
                        </a>
                    </p>
                    <p class="my-2">
                        <a href="https://api.whatsapp.com/send?phone=0822223563" target="__black" class="text-decoration-none">
                            <span class="fab fa-4 pr-1 fa-whatsapp"></span>
                            082 222 3563
                        </a>
                    </p>
                    <p class="my-2">
                        <a class="text-decoration-none" href="mailto:nicolette@atti.co.za">
                            <span class="fa fa-4 pr-1 fa-envelope"></span>
                            nicolette@atti.co.za
                        </a>
                    </p>
                </div>

                <div class="col-6 col-md-3 py-2">
                    <h5 class="font-weight-bold mt-1 mb-3 footer-text">Quick Links</h5>
                    <p class="my-2">
                        <router-link :to="{ name: 'Home' }" class="text-decoration-none footer-text">Home Page</router-link>
                    </p>
                    <p class="my-2">
                        <router-link :to="{ name: 'EnrollCourse' }" class="text-decoration-none footer-text">Online Registration</router-link>
                    </p>
                    <p class="my-2">
                        <router-link :to="{ name: 'Courses' }" class="text-decoration-none footer-text">Courses</router-link>
                    </p>
                    <p class="my-2">
                        <router-link :to="{ name: 'Contact' }" class="text-decoration-none footer-text">Contact Us</router-link>
                    </p>
                </div>
                
                <div class="col-6 col-md-3 py-2">
                    <h5 class="font-weight-bold mt-1 mb-3 footer-text">Addresss</h5>
                    <p class="my-1 footer-text">Private Bag X 11284</p>
                    <p class="my-1 footer-text">16 Rothery Street</p>
                    <p class="my-1 footer-text">Nelspruit</p>
                    <p class="my-1 footer-text">1200</p>
                </div>

                <div class="col-6 col-md-3 py-2">
                    <h5 class="font-weight-bold mt-1 mb-3 footer-text">Our Social Media</h5>
                    <p class="my-2">
                        <a target="_blank" class="text-decoration-none" href="https://www.facebook.com/attinelspruit">
                            <span class="fab fa-4 pr-2 fa-facebook"></span>
                            ATTI Nelspruit
                        </a>
                    </p>
                    <p class="my-2">
                        <a target="_blank" class="text-decoration-none" href="https://twitter.com/attinelspruit?ref_src=twsrc%5Etfw">
                            <span class="fab fa-4 pr-1 fa-twitter"></span>
                            @ATTINelspruit
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-xl-0">
                    <p class="text-center footer-text my-3">
                        ATTI Nelspruit (PTY) Ltd is Provisionally Registered by the Department of Higher Education and Traning
                        as a Private College. Reg No: <span class="font-weight-bold">2010/FE07/058</span> until 31 December 2019.
                        Full Accreditation by <span class="font-weight-bold">MICT SETA</span>. Accreditation Number: <span class="">300723</span>.
                        Accredited by the Servive of SETA. Provider Accreditation Number: <span class="font-weight-bold">4189.</span>
                        <span class="font-weight-bold">BEE Level 2</span>
                    </p>
                </div>
            </div>
           <div class="row">
                <div class="col-12">
                    <p class="text-sm footer-text my-2">
                        &copy;
                        2020 ATTI Nelspruit. All Rights Reserved
                    </p>
                </div>
            </div> 
        </div>
    </div>
</template>