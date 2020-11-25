<template>
    <div class="container container-lg container-xxl">
        <div class="row py-5">
            <div class="col-12">
                <div class="card border-0">
                    <h1 class="card-header h1 border-0 bg-brand text-light py-3">Enrolment Form <small class="text-sm">- Page 2</small></h1>
                    <div class="card-body">
                        <form action="/api/enrolment" method="post" @submit.prevent="submitEnrolment">
                            <div class="row">
                                <h2 class="h2 text-center my-2">This Section Is Optional</h2>
                            </div>
                            <div class="row">
                                <h3 class="h4 my-3 font-weight-bold">Company Information</h3>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 mb-3">
                                    <label for="cinitname" class="form-label">Company Name</label>
                                    <input v-model="data.company_name" type="text" class="form-control border-0 bg-light ip-1" id="cinitname" placeholder="eg: Company Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="cinitials" class="form-label">Initials</label>
                                    <input v-model="data.company_initials" type="text" class="form-control border-0 bg-light ip-1" id="cinitials" placeholder="eg: Mr A.B">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cname" class="form-label">Lastname</label>
                                    <input v-model="data.company_lastname" type="text" class="form-control border-0 bg-light ip-1" id="cname" placeholder="eg: Smith">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="cposition" class="form-label">Position</label>
                                    <input v-model="data.company_position" type="text" class="form-control border-0 bg-light ip-1" id="cposition" placeholder="eg: manager">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="ctelephone" class="form-label">Telephone</label>
                                    <input v-model="data.company_telephone" type="text" class="form-control border-0 bg-light ip-1" id="ctelephone" placeholder="eg: 013 000 1111">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 mb-3">
                                    <label for="cmail" class="form-label">Email</label>
                                    <input v-model="data.company_email" type="text" class="form-control border-0 bg-light ip-1" id="cmail" placeholder="eg: name@compannyName.com">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="creg" class="form-label">Reg Number</label>
                                    <input v-model="data.company_reg_number" type="text" class="form-control border-0 bg-light ip-1" id="creg" placeholder="eg: 123456789">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cvat" class="form-label">VAT Number</label>
                                    <input v-model="data.company_vat_number" type="text" class="form-control border-0 bg-light ip-1" id="cvat" placeholder="eg: 123456789">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 mb-3">
                                    <label for="physical-city" class="form-label">Physical Address</label>
                                    <input v-model="data.physical.address" type="text" class="form-control border-0 bg-light ip-1" id="physicalAddress" placeholder="eg: 1st Main Street">
                                </div>
                                <div class="col-md-7 mb-2">
                                    <input v-model="data.physical.city" type="text" class="form-control border-0 bg-light ip-1" id="pysical-city" placeholder="eg: Mbombela">
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text border-0 bg-light" id="physicalAddress-code">code</span>
                                        <input v-model="data.physical.code" type="text" class="form-control border-0 bg-light ip-1" aria-describedby="homeAddress-code" id="homeAddress-code" placeholder="eg: 1200">
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

                            <div class="row">
                                <h3 class="h4 my-3 font-weight-bold">Medical Information</h3>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 mb-3">
                                    <label for="mscheme" class="form-label">Mediacal Aid Scheme</label>
                                    <input v-model="data.medical.medical_aid_scheme" type="text" class="form-control border-0 bg-light ip-1" id="mscheme" placeholder="eg: Aid Scheme">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="mnumber" class="form-label">Member Number</label>
                                    <input v-model="data.medical.medical_member_number" type="text" class="form-control border-0 bg-light ip-1" id="mnumber" placeholder="eg: 123456789">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="mtelephone" class="form-label">Telephone</label>
                                    <input v-model="data.medical.medical_telephone" type="text" class="form-control border-0 bg-light ip-1" id="mtelephone" placeholder="eg: 013 000 1111">
                                </div>
                            </div>
                            
                            <div class="row px-3 mb-3">
                                <div class="col-12 form-check">
                                    <input class="form-check-input" type="checkbox" id="millness" v-model="data.medical.medical_illness">
                                    <label class="form-check-label" for="millness">
                                        Check: Any Nature Of Illness
                                    </label>
                                </div>
                            </div>

                            <div class="row" v-if="data.medical.medical_illness">
                                <div class="col-12 mb-3">
                                    <label for="mdescription" class="form-label">Specify Illness</label>
                                    <textarea v-model="data.medical.medical_illness_description" class="form-control border-0 bg-light ip-1" id="mdescription" rows="3"></textarea>
                                </div>
                            </div>
                            
                            <div class="row justify-content-center pt-3">
                                <div class="col-12"><p class="text-center"> 2 of 2 pages </p></div>
                                <div class="col-7 col-md-5 col-xxl-3">
                                    <button class="btn btn-success btn-block" type="submit">
                                        Submit
                                        <span v-if="!control.loading" class="fa pl-1 fa-paper-plane"></span>
                                        <span v-if="control.loading" class="spinner-grow pl-1 spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="row" v-if="control.errorMessage" >
                                <div class="col-12 py-2">
                                    <p class="text-center text-danger mt-3 mb-1">{{ control.errorMessage }}</p>
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
import { reactive } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from 'axios'
import { useStore } from 'vuex'
export default {
    setup() {
        const router = useRouter()
        const route = useRoute()
        const store = useStore()

        const control = reactive({
            loading: false,
            errorMessage: ''
        })
        const data = reactive({
            company_name: '',
            company_initials: '',
            company_lastname: '',
            company_position: '',
            company_email: '',
            company_reg_number: '',
            company_vat_number: '',
            company_telephone: '',
            postal: {
                address: '',
                city: '',
                code: ''
            },
            physical: {
                address: '',
                city: '',
                code: ''
            },
            medical: {
                medical_aid_scheme: '',
                medical_member_number: '',
                medical_telephone: '',
                medical_illness:  false,
                medical_illness_description: ''
            }
        })

        function submitEnrolment() {
            control.loading = true
            control.errorMessage = ''
            const formData = new FormData
            formData.append('company_name', data.company_name)
            formData.append('company_initials', data.company_initials)
            formData.append('company_lastname', data.company_lastname)
            formData.append('company_position', data.company_position)
            formData.append('company_email', data.company_email)
            formData.append('company_telephone', data.company_telephone)
            formData.append('company_reg_number', data.company_reg_number)
            formData.append('company_vat_number', data.company_vat_number)
            formData.append('company_postal_address', data.postal.address)
            formData.append('company_postal_city', data.postal.city)
            formData.append('company_postal_code', data.postal.code)
            formData.append('company_physical_address', data.physical.address)
            formData.append('company_physical_city', data.physical.city)
            formData.append('company_physical_code', data.physical.code)
            formData.append('medical_aid_scheme', data.medical.medical_aid_scheme)
            formData.append('medical_telephone', data.medical.medical_telephone)
            formData.append('medical_member_number', data.medical.medical_member_number)
            formData.append('medical_illness', data.medical.medical_illness)
            formData.append('medical_illness_description', data.medical.medical_illness_description)

            const config = {headers: { 'Content-Type': 'multipart/form-data' }}
            axios.post(`${ store.state.baseAPI_URL }api/register/${route.params.id_number}`, formData, config)
            .then(response => {
                if (response.status != 203) {
                    const notify = {
                        title: 'Enrolment Form',
                        message: response.data.message,
                        success: true,
                    }
                    store.dispatch('notify', notify)
                    return router.push({
                        name: 'Home',
                    })
                }
                control.loading = false
                control.errorMessage = response.data.message
                const notify = {
                    title: 'Enrolment Form',
                    message: response.data.message,
                    success: false,
                }
                store.dispatch('notify', notify)
            })
        }

        return { control, data, submitEnrolment }
    }
}
</script>