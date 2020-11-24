<template>
    <div class="container-lg">
        <div class="row py-4 py-lg-5">
            <div class="col-lg-5 mb-4">
                <h2>Contact Information</h2>
                <div class="d-block mb-3">
                    <p class="my-2">Telephone Number</p>
                    <p class="my-2 pl-2">
                        <a href="tel:013-755-2638" class="text-decoration-none text-dark">
                            <span class="fa fa-4 pr-1 fa-tty"></span>
                            013 755 2638
                        </a>
                    </p>
                </div>
                
                <div class="d-block mb-3">
                    <p class="my-2">Whatsapp</p>
                    <p class="my-2 pl-2">
                        <a href="https://api.whatsapp.com/send?phone=0822223563" target="_black" class="text-decoration-none text-dark">
                            <span class="fab fa-4 pr-1 fa-whatsapp"></span>
                            082 222 3563
                        </a>
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
                                <input v-model="contactForm.name" type="text" class="form-control ip-1 bg-light border-0" id="contactName" placeholder="eg: John Doe">
                            </div>
                            <div class="mb-3 mb-lg-4">
                                <label for="conatactEmail" class="form-label">Email - optional</label>
                                <input v-model="contactForm.email" type="email" class="form-control ip-1 bg-light border-0" id="conatactEmail" placeholder="eg: johndoe@example.com">
                            </div>
                            <div class="mb-3 mb-lg-4">
                                <label for="contactNumber" class="form-label">Phone Number</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text ip-1 bg-light border-0" id="basic-addon1">+27</span>
                                    <input v-model="contactForm.phone" type="text" class="form-control ip-1 bg-light border-0" aria-describedby="basic-addon1" id="contactNumber" placeholder="71 222 3333">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="contactMessage" class="form-label">Meassage</label>
                                <textarea v-model="contactForm.message" class="form-control ip-1 bg-light border-0" id="contactMessage" rows="5" placeholder="eg: Hello, how are you..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">
                                Send Message
                                <span class="fa fa-paper-plane pl-1"></span>
                            </button>
                        </form>
                        <p class="card-text text-danger mt-4 mb-2 text-center" v-if="contactForm.error">{{ contactForm.error }}</p>
                        <p class="card-text text-success font-weight-bold mt-4 mb-2 text-center" v-if="contactForm.success">{{ contactForm.success }}</p>
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
import axios from 'axios'
import { useStore } from 'vuex'
export default {
    components: { Footer },
    setup() {
        const store = useStore()
        const contactForm = reactive({
            name: '',
            email: '',
            phone: '',
            message: '',
            error: '',
            success: ''
        })

        function sendMessage() {
            const formData = new FormData
            formData.append('fullname', contactForm.name)
            formData.append('email', contactForm.email)
            formData.append('contact_number', contactForm.phone)
            formData.append('message', contactForm.message)

            const config = {headers: { 'Content-Type': 'multipart/form-data' }}
            axios.post(`${store.state.baseAPI_URL}api/contact`, formData, config)
            .then(response => {
                if (response.status == 203) {
                    return contactForm.error = response.data.message
                }
                contactForm.name = ''
                contactForm.email = ''
                contactForm.phone = ''
                contactForm.message = ''
                contactForm.error = ''
                const notify = {
                    title: 'Contact Us',
                    message: response.data.message,
                    success: true,
                }
                store.dispatch('notify', notify)
            })
        }

        return { sendMessage, contactForm }
    }
}
</script>