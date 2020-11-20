<template>
    <div class="container container-lg container-xxl">
        <div class="row py-5">
            <div class="col-12">
                <div class="card border-0">
                    <h1 class="card-header h1 border-0 bg-brand text-light py-3">Enrolment Form</h1>
                    <div class="card-body">
                        <div class="row px-2 mb-4">
                            <div class="col-12 rounded p-3 border border-primary border-w-2 bg-light">
                                <!-- Course Short Description here -->
                                <h3 class="h5">PC Technician</h3>
                                <p class="my-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis voluptatum, perferendis sunt esse accusamus pariatur. Facilis aperiam nostrum quae quasi,</p>
                                <p class="my-1 text-sm">Period: 12 months</p>
                            </div>
                        </div>
                        <p class="card-text mt-1 mb-3"><span class="font-weight-bold pr-1">Full Name:</span> {{ data.firstname }} {{ data.lastname }} </p>
                        <p class="card-text mt-1 mb-3"><span class="font-weight-bold pr-1">ID Number:</span> {{ data.id_number}}</p>
                        <p class="card-text mt-1 mb-3"><span class="font-weight-bold pr-1">Email Address:</span> {{ data.email }}</p>
                        <div class="row g-2 align-items-center mb-4">
                            <div class="col-auto">
                                <label for="phone" class="col-form-label font-weight-bold">Phone Number:</label>
                            </div>
                            <div class="col-auto">
                                <input v-model="data.contact_number" type="text" id="phone" class="form-control border-left-0 border-top-0 border-right-0 rounded-0 border-w-3" aria-describedby="phone">
                            </div>
                        </div>
                        <form action="/api/enrolment" method="post" @submit.prevent="sendEnrolment">
                            <div class="row mb-3">
                                <div class="col-12 mb-3">
                                    <label for="home-city" class="form-label">Home Address</label>
                                    <input v-model="data.home.address" type="text" class="form-control border-0 bg-light ip-1" id="homeAddress" placeholder="eg: 1st Main Street">
                                </div>
                                <div class="col-md-7 mb-2">
                                    <input v-model="data.home.city" type="text" class="form-control border-0 bg-light ip-1" id="home-city" placeholder="eg: Mbombela">
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text border-0 bg-light" id="homeAddress-code">code</span>
                                        <input v-model="data.home.code" type="text" class="form-control border-0 bg-light ip-1" aria-describedby="homeAddress-code" id="homeAddress-code" placeholder="eg: 1200">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="postal" class="form-label">Postal Address</label>
                                    <input v-model="data.postal.address" type="text" class="form-control border-0 bg-light ip-1" id="postal" placeholder="eg: P.O Box 001">
                                </div>
                                <div class="col-md-7 mb-2">
                                    <input v-model="data.postal.city" type="text" class="form-control border-0 bg-light ip-1" id="postal-city" placeholder="eg: Mbombela">
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text border-0 bg-light" id="postal-code">code</span>
                                        <input v-model="data.postal.code" type="text" class="form-control border-0 bg-light ip-1" aria-describedby="postal-code" id="postal-code" placeholder="eg: 1200">
                                    </div>
                                </div>
                            </div>
                            <div class="row px-3 mb-3">
                                <div class="col-12 form-check">
                                    <input class="form-check-input" type="checkbox" id="foreign" v-model="data.foreign">
                                    <label class="form-check-label" for="foreign">
                                        Check: if you are a foreign student
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="qualification" class="form-label">Highest Qualification</label>
                                    <input v-model="data.qualification.name" type="text" class="form-control border-0 bg-light ip-1" id="qualification" placeholder="eg: Systems Development NQF Level 5">
                                </div>
                                <div class="col-6 col-md-3 mb-2">
                                    <div class="card border-0 bg-light pointer h-100">
                                        <div class="card-body" @click="chooseQualification">
                                            <p class="card-text text-center my-1 font-weight-bold">Choose Document</p>
                                            <p class="card-text text-center my-1 text-sm">Highest Qualification</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-2">
                                    <div class="card border-0 bg-light pointer h-100">
                                        <div class="card-body" @click="chooseQualification">
                                            <p class="card-text text-center my-1 font-weight-bold">Choose Document</p>
                                            <p class="card-text text-center my-1 text-sm">Copy of I.D</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-2" v-if="data.foreign">
                                    <div class="card border-0 bg-light pointer h-100">
                                        <div class="card-body" @click="chooseQualification">
                                            <p class="card-text text-center my-1 font-weight-bold">Choose Document</p>
                                            <p class="card-text text-center my-1 text-sm">Copy of Study Permit</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row px-2">
                                <h4 class="h4 my-4 border-bottom border-w-3 py-2">Parent or Guardian</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="gname" class="form-label">Firstname</label>
                                    <input v-model="data.guardian.firstname" type="text" class="form-control border-0 bg-light ip-1" id="gname" placeholder="eg: Jane">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="glastname" class="form-label">Lastname</label>
                                    <input v-model="data.guardian.lastname" type="text" class="form-control border-0 bg-light ip-1" id="glastname" placeholder="eg: Doe">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="gphone" class="form-label">Phone Number</label>
                                    <input v-model="data.guardian.contact_number" type="text" class="form-control border-0 bg-light ip-1" id="gphone" placeholder="eg: Jane">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="grelationship" class="form-label">Relationship</label>
                                    <input v-model="data.guardian.relationship" type="text" class="form-control border-0 bg-light ip-1" id="grelationship" placeholder="eg: Mother">
                                </div>
                            </div>

                            <div class="row justify-content-center pt-3">
                                <div class="col-12"><p class="text-center"> 1 of 2 pages </p></div>
                                <div class="col-7 col-md-5 col-xxl-3">
                                    <button class="btn btn-success btn-block" type="submit">
                                        next
                                        <span v-if="!control.loading" class="fa pl-1 fa-forward"></span>
                                        <span v-if="control.loading" class="spinner-grow pl-1 spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 py-0">
                                    <p v-if="control.errorMessage" class="text-center text-danger mt-3 mb-1">{{ control.errorMessage }}</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { onMounted, reactive } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from 'axios'
import { useStore } from 'vuex'
export default {
    setup() {
        const store = useStore()
        const data = reactive({
            firstname: '',
            lastname: '',
            id_number: '',
            email: '',
            contact_number: '',
            home: {
                address: '',
                city: '',
                code: ''
            },
            postal: {
                address: '',
                city: '',
                code: ''
            },
            qualification: {
                name: '',
                document: '',
            },
            id_copy: '',
            foreign: false,
            permit: '',
            guardian: {
                firstname: '',
                lastname: '',
                relationship: '',
                contact_number: ''
            }
        })

        const route = useRoute()
        function getStudentApplication() {
            const id_number = route.params.id_number
            const course_id = route.params.course_id
            axios.get(`${ store.state.baseAPI_URL }api/applications/${ id_number }/${ course_id }`)
            .then(response => {
                data.firstname = response.data.firstname
                data.lastname =  response.data.lastname
                data.id_number = response.data.id_number
                data.email = response.data.email
                data.contact_number = response.data.contact_number
            })
        }
        onMounted(()=> getStudentApplication())
        
        const control = reactive({
            loading: false,
            errorMessage: ''
        })
        const router = useRouter()
        function sendEnrolment() {
            control.loading = true
            control.errorMessage = ''
            const formData = new FormData
            formData.append('firstname', data.firstname)
            formData.append('lastname', data.lastname)
            formData.append('email', data.email)
            formData.append('id_number', data.id_number)
            formData.append('contact_number', data.contact_number)
            formData.append('home_address', data.home.address)
            formData.append('home_city', data.home.city)
            formData.append('home_code', data.home.code)
            formData.append('postal_address', data.postal.address)
            formData.append('postal_city', data.postal.city)
            formData.append('postal_code', data.postal.code)
            formData.append('qualification_name', data.qualification.name)
            formData.append('qualification_doc', data.qualification.document)
            formData.append('id_copy', data.id_copy)
            formData.append('is_foreign', data.foreign)
            formData.append('permit', data.permit)
            formData.append('guardian_firstname', data.guardian.firstname)
            formData.append('guardian_lastname', data.guardian.lastname)
            formData.append('guardian_relation', data.guardian.relationship)
            formData.append('guardian_contact', data.guardian.contact_number)
            const config = {headers: { 'Content-Type': 'multipart/form-data' }}
            axios.post(`${ store.state.baseAPI_URL }api/register`, formData, config)
            .then(response => {
                if (response.status != 203) {
                    return router.push({
                        name: 'EnrolmentFormP2',
                        params: { 
                            id_number: data.id_number
                        }
                    })
                }
                control.loading = false
                control.errorMessage = response.data.message
            })
        }
        
        function chooseQualification() {
            const input = document.createElement('input');
            input.setAttribute("type", "file");
            input.click()
            input.addEventListener('change', (event)=> {
                const file = event.target.files[0]
                const formData = new FormData
                formData.append('HQ_doc', file)
                const config = { headers: { 'Content-Type': 'multipart/form-data' }}
                const upload =  axios.post(`${ store.state.baseAPI_URL }api/upload`, formData, config)
                upload.then(response => {
                    console.log(response)
                })
            })
        }
        
        function chooseIdCopy() {
            console.log("Choose ID Copy")
        }
        function choosePermit() {
            console.log("Choose Permit")
        }

        return {
            data,
            control,
            sendEnrolment,
            chooseQualification,
            chooseIdCopy,
            choosePermit
        }
    }
}
</script>