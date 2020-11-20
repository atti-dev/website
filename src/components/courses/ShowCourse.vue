<template>

	<div class="container-lg py-5">
		<div class="row bg-light p-2 p-md-3 shadow">
            <div class="col-12">
                <h1 class="h1 mt-2 mb-3">{{ course.course }}</h1>
            </div>
            <div class="col-md-6 mb-3 mb-md-0">
                <img src="/images/static/informationtech.jpg" class="img-fluid rounded" alt="" srcset="">
            </div>
            <div class="col-md-6">
                <h5 class="h5 font-weight-bold mt-auto mb-3">About the Course</h5>
                <p class="my-2">Qualification: {{ course.qualifications }} </p>
                <p class="my-2">Period: {{ course.period }} months</p>
                <p class="my-2">Course Total Price: R{{ course.total_price }}</p>
                <p class="my-2">R{{ course.price_per_month }} Per Month</p>
                <p class="my-2 text-info" v-if="course.full_time">This is a Fulltime Course</p>
                <p class="text-center my-3">
                    <router-link :to="{ name: 'EnrollCourse', query: { course_id: course.id } }" class="btn btn-success btn px-4">Register</router-link>
                </p>
            </div>
            <div class="col-12 py-3">
                <p class="my-2">{{ course.description }}</p>
                <h4 class="h5 font-weight-bold my-3 mb-2">What You'll learn</h4>
                <p class="my-3" v-for="item in course.list" :key="item.id">
                    <span class="fa fa-check pr-1"></span>
                    {{ item.item }}
                </p>
            </div>
			<!-- Course Information card -->
		</div>
	</div>

	<!-- Add Footer Componets here -->
    <Footer />
</template>

<script>
import Footer from '@/components/home/Footer.vue'
import axios from 'axios'
import { onMounted, reactive } from 'vue'
import { useRoute } from 'vue-router'
import { useStore } from 'vuex'
export default {
	components: { Footer },
    setup() {
        const route = useRoute()
        const store = useStore()
        const course = reactive({
            id: '',
            course: '',
            course_type: '',
            created_at: '',
            description: '',
            full_time: '',
            img_url: null,
            period: '',
            price_per_month: '',
            qualifications: '',
            total_price: '',
            list: []
        })

		onMounted(() => {
            const course_id = route.params.course_id
			axios.get(`${ store.state.baseAPI_URL }api/courses/show/${course_id}`)
			.then(response => {
                course.id = response.data.id
                course.course = response.data.course
                course.course_type = response.data.course_type
                course.description = response.data.description
                course.full_time = response.data.full_time
                course.img_url = response.data.img_url
                course.period = response.data.period
                course.price_per_month = response.data.price_per_month
                course.total_price = response.data.total_price
                course.qualifications = response.data.qualifications
                course.list = response.data.list
			})
		})

		return { course }
    }
}
</script>