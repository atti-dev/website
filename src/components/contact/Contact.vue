<template>
    <div class="container-lg">
        <div class="row py-4 py-lg-5">
            <div class="col-lg-5 mb-4">
                <h2>Contact Information</h2>
                <div class="d-block mb-3">
                    <p class="my-2">Telephone Number</p>
                    <p class="my-2 pl-2">
                        <span class="fa fa-4 pr-1 fa-tty"></span>
                        013 755 2638
                    </p>
                </div>
                
                <div class="d-block mb-3">
                    <p class="my-2">Contact Number</p>
                    <p class="my-2 pl-2">
                        <span class="fa fa-4 pr-1 fa-phone"></span>
                        082 222 3563
                    </p>
                </div>
                <div class="d-block mb-3">
                    <p class="my-2">Email address</p>
                    <a class="text-decoration-none text-dark pl-2" href="mailto:nicolette@atti.co.za">
                        <span class="fa fa-4 pr-1 fa-envelope"></span>
                        nicolette@atti.co.za
                    </a>
                </div>

                <h3 class="h5 mt-4 font-weight-bold">Pysical Address</h3>
                <div class="d-block mb-3">
                    <p class="my-1">Private Bag X 11284</p>
                    <p class="my-1">16 Rothery Street</p>
                    <p class="my-1">Nelspruit</p>
                    <p class="my-1">1200</p>
                </div>
            </div>

            <div class="col-lg-7 px-lg-0">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center h3 my-2">Send Message</h2>
                        <form action="#" method="post" @submit.prevent="sendMessage">
                            <div class="mb-3 mb-lg-4">
                                <label for="contactName" class="form-label">Name</label>
                                <input v-model="contactForm.name" type="text" class="form-control" id="contactName" placeholder="eg: John Doe">
                            </div>
                            <div class="mb-3 mb-lg-4">
                                <label for="conatactEmail" class="form-label">Email - optional</label>
                                <input v-model="contactForm.email" type="email" class="form-control" id="conatactEmail" placeholder="eg: johndoe@example.com">
                            </div>
                            <div class="mb-3 mb-lg-4">
                                <label for="contactNumber" class="form-label">Phone Number</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-light border-right-0" id="basic-addon1">+27</span>
                                    <input v-model="contactForm.phone" type="text" class="form-control border-left-0" aria-describedby="basic-addon1" id="contactNumber" placeholder="71 222 3333">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="contactMessage" class="form-label">Meassage</label>
                                <textarea v-model="contactForm.message" class="form-control" id="contactMessage" rows="5" placeholder="eg: Hello, how are you..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">
                                Send Message
                                <span class="fa fa-paper-plane pl-1"></span>
                            </button>
                        </form>
                        <p class="card-text text-danger mt-4 mb-2 text-center">{{ contactForm.error }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pin ATTI Location on Google Maps -->
        <!-- <Location /> -->
    </div>

    <!-- Add Footer Componets here -->
    <Footer />
</template>
<script>
    import Footer from '@/components/home/Footer.vue'
    // import Location from './Location.vue'
    import { reactive } from 'vue'
    export default {
        components: { Footer },
        setup() {
            const contactForm = reactive({
                name: '',
                email: '',
                phone: '',
                message: '',
                error: ''
            })

            function sendMessage() {
                const contactFormIsValid  = validation()
                if (contactFormIsValid) {
                    console.log(contactForm)
                    alert('Message Sent')
                }
            }

            const validation = ()=> {
                if (contactForm.name.length < 3) {
                    contactForm.error = "The name field is invalid. Please enter your Fullname"
                    return false
                }

                if (contactForm.email && !validateEmail(contactForm.email)) {
                    contactForm.error = "The email you have enter is invalid"
                    return false
                }

                if (contactForm.phone.length < 9 || contactForm.phone.length > 10) {
                    contactForm.error = "Please enter a valid phone number"
                    return false
                }

                if (contactForm.message.length < 10) {
                    contactForm.error = "Sorry! the massage can not be less than 10 char"
                    return false
                }

                contactForm.error = ''
                return true
            }

            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
                return re.test(String(email).toLowerCase());
            }

            return { sendMessage, contactForm }
        }
    }
</script>