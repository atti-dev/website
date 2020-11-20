<template>
    <div class="container container-lg container-xxl">
        <!-- Choose Course Modal -->
        <CourseModal />
        <div class="row py-5">
            <div class="col-12">
                <div class="card border-0">
                    <h1 class="card-header h1 py-3 border-0 bg-brand text-light">Application Form</h1>
                    <div class="card-body">
                        <div class="row px-2 mb-4">
                            <div class="col-12 rounded p-3 border border-primary border-w-2 bg-light mb-2" v-if="data.course.id">
                                <!-- Course Short Description here -->
                                <h3 class="h5">{{ data.course.course }}</h3>
                                <p class="my-1">{{ data.course.description }}</p>
                                <p class="my-1 text-sm">Period: {{ data.course.period }} months</p>
                            </div>
                            <div class="col-12 px-0">
                                <button type="button" class="btn bg-brand text-light" data-toggle="modal" data-target="#curseStaticModal">
                                    Choose your Course
                                    <span class="fas fa-external-link-square-alt pl-1"></span>
                                </button>
                            </div>
                        </div>
                        <form action="api/application" method="post" @submit.prevent="sendApplication" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input v-model="data.firstname" type="text" class="form-control ip-1 bg-light border-0" id="firstname" placeholder="eg: Will">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input v-model="data.lastname" type="text" class="form-control ip-1 bg-light border-0" id="contactName" placeholder="eg: Smith">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label for="identityNumber" class="form-label">ID Number</label>
                                    <input v-model="data.id_number" type="text" class="form-control ip-1 bg-light border-0" id="identityNumber" placeholder="eg: 000000 000 00 00">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input v-model="data.email" type="email" class="form-control ip-1 bg-light border-0" id="email" placeholder="eg: example@mail.com">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label for="contactNumber" class="form-label">Contact Number</label>
                                    <input v-model="data.contact_number" type="text" class="form-control ip-1 bg-light border-0" id="contactNumber" placeholder="eg: 071 222 3333">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-4 col-xxl-3">
                                    <button type="submit" class="btn btn-success btn-block" :disabled="control.loading">
                                        Send Application
                                        <span v-if="!control.loading" class="fa pl-1 fa-paper-plane"></span>
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
import CourseModal from './CourseModal.vue'
import { computed, onMounted, reactive } from 'vue'
import { useStore } from 'vuex'
import { useRoute, useRouter } from 'vue-router'
import axios from 'axios'
export default {
    components: { CourseModal },
    setup() {
        const router = useRouter()
        const route = useRoute()
        const store = useStore()

        onMounted(()=> {
            if (route.query.course_id) {
                store.dispatch('setCourse', route.query.course_id)
            }
        })

        const data = computed(()=> store.state.Enroll.application)
        const control = reactive({
            loading: false,
            errorMessage: ""
        })

        function sendApplication() {
            control.loading = true,
            control.errorMessage = ""
            const formData = new FormData
            formData.append('course_id', data.value.course.id)
            formData.append('firstname', data.value.firstname)
            formData.append('lastname', data.value.lastname)
            formData.append('id_number', data.value.id_number)
            formData.append('contact_number', data.value.contact_number)
            formData.append('email', data.value.email)

            const config = {headers: { 'Content-Type': 'multipart/form-data' }}
            axios.post(`${ store.state.baseAPI_URL }api/applications`, formData, config)
            .then(response => {
                if (response.status != 203) {
                    return router.push({
                        name: 'EnrolmentForm',
                        params: { 
                            id_number: data.value.id_number,
                            course_id: data.value.course.id
                        }
                    })
                }
                control.loading = false
                control.errorMessage = response.data.message
            })
            .catch(error => {
                control.loading = false
                control.errorMessage = error.message
            })
        }        

        // return variables and function that needs to be public to the component
        return {
            data,
            control,
            sendApplication,
        }
    }
}
</script>