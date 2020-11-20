<template>
	<div class="container-fluid bg-light shadow-sm mb-4">
		<div class="container-lg py-2">
			<div class="row">
				<!-- Course Search and Filter -->
				<div class="col-12">
					<div class="row">
						<!-- Filter goes here and other things -->
						<div class="col-md-4 d-flex px-lg-0">
							<div class="dropdown flex-fill">
								<button class="btn btn-light btn-block ip-2 dropdown-toggle" type="button" id="dropdownCourseFilter" data-toggle="dropdown" aria-expanded="false">
									{{ filter.type }}
								</button>
								<ul class="dropdown-menu border-w-3 border-info" aria-labelledby="dropdownCourseFilter">
									<li><a class="dropdown-item py-2" @click="filterByType('Information Technology')" href="#">Information Technology</a></li>
									<li><a class="dropdown-item py-2" @click="filterByType('Finance Accounting')" href="#">Finance and Accounting</a></li>
									<li><a class="dropdown-item py-2" @click="filterByType('Bussiness Management')" href="#">Bussiness Management</a></li>
								</ul>
							</div>
							<div class="dropdown flex-fill">
								<button class="btn btn-light btn-block ip-2 dropdown-toggle" type="button" id="dropdownQualification" data-toggle="dropdown" aria-expanded="false">
									{{ filter.qualification }}
								</button>
								<ul class="dropdown-menu border-w-3 border-info" aria-labelledby="dropdownQualification">
									<li><a class="dropdown-item py-2" @click="filterByQualification('NQF')"  href="#">NQF Level 4</a></li>
									<li><a class="dropdown-item py-2" @click="filterByQualification('NQF L5')" href="#">NQF Level 5</a></li>
									<li><a class="dropdown-item py-2" @click="filterByQualification('SAQA')" href="#">SAQA Level 4</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-8">
							<form action="#" method="GET" @submit.prevent="submitSearch">
								<div class="input-group">
									<input type="text" v-model="search.input" class="form-control search ip-2 border-0" placeholder="Search Course..." aria-label="search" aria-describedby="search">
									<button class="btn search border-0 px-3" type="submit" id="search">
										<span class="fa fa-search fa-4"></span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-lg">
		<div class="row mb-4">
			<!-- Course Information card -->
			<router-link :to="{name: 'ShowCourse', params: { course_id: course.id }}" class="col-md-6 px-2 mb-4 text-decoration-none text-dark" v-for="course in courses" :key="course.id">
				<div class="bg-light p-3 h-100">
					<h2 class="h2 mb-3">{{ course.course }}</h2>
					<div class="row mb-2 mb-md-3">
						<div class="col-md-6 mb-3 mb-md-0">
							<img src="/images/static/informationtech.jpg" class="img-fluid rounded" :alt="course.course" srcset="">
						</div>
						<div class="col-md-6">
							<h5 class="h6 font-weight-bold my-auto">About the Course</h5>
							<p class="my-2">Qualification: {{ course.qualifications }} </p>
							<p class="my-2">Period: {{ course.period }} months</p>
							<p class="my-2">R{{ course.price_per_month }} Per Month</p>
							<!-- <p class="my-2">R{{ course.total_price }} Once Off</p> -->
							<div class="my-2">
								<!-- <button class="btn btn-primary btn-sm px-3">Apply</button> -->
								<router-link :to="{ name: 'EnrollCourse', query: { course_id: course.id } }" class="btn btn-success btn-sm px-3">Register</router-link>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<p class="my-1">{{ course.description }}</p>
							<h5 class="h6 font-weight-bold mt-3 mb-2">What You'll learn</h5>
							<p class="my-3" v-for="item in course.list" :key="item.id">
								<span class="fa fa-check pr-1"></span>
								{{ item.item }}
							</p>
							<p class="my-auto">And More...</p>
						</div>
					</div>
				</div>
			</router-link>
		</div>
	</div>

	<!-- Add Footer Componets here -->
    <Footer />
</template>

<script>
import Footer from '@/components/home/Footer.vue'
import axios from 'axios'
import { onMounted, reactive } from 'vue'
import { useStore } from 'vuex'
export default {
	components: { Footer },
    setup() {
		const store = useStore()
		const courses = reactive([])

		onMounted(() => {
			axios.get(`${ store.state.baseAPI_URL }api/courses`)
			.then(response => {
				response.data.forEach(data => {
					courses.push(data)
				})
			})
		})

		const search = reactive({
			input: '',
			errorMessage: ''
		})
		function submitSearch() {
			axios.get(`${ store.state.baseAPI_URL }api/search?search=${ search.input }`)
			.then(response => {
				if (response.status == 203) {
					return search.errorMessage = response.data.message
				}
				courses.length = 0
				response.data.forEach(data => {
					courses.push(data)
				})
			})
		}
		
		const filter = reactive({
			type: 'Course Type',
			type_active: false,
			qualification: 'Qualification',
			qualification_active: false
		})

		function filterByType(params) {
			filter.type = params
			filter.type_active = true,
			getFilterData()
		}
		function filterByQualification(params) {
			filter.qualification = params
			filter.qualification_active = true,
			getFilterData()
		}

		function getFilterData() {
			const type = filter.type_active ? filter.type : ''
			const qualification = filter.qualification_active ? filter.qualification : ''
			axios.get(`${ store.state.baseAPI_URL }api/filter?type=${ type }&qualification=${ qualification }`)
			.then(response => {
				if (response.data.length > 0) {
					courses.length = 0
					response.data.forEach(data => {
						courses.push(data)
					})
				}
			})
		}

		return {
			courses, 
			search, 
			submitSearch, 
			filter,
			filterByType,
			filterByQualification
		}
    }
}
</script>