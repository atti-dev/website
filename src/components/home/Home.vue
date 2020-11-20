<template>
	<!-- Homepage Banner -->
	<Banner />

	<div class="container-xl">
		<!-- Why Choose US or Why Choos ATTI Component Section -->
		<div class="row justify-content-center py-4 mb-5">
			<div class="col-10 col-md-8">
				<h2 class="display-4 text-center font-weight-bold">Why Choose ATTI College?</h2>
				<p class="text-center my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis autem maxime dignissimos repudiandae facilis sunt minus dicta repellat iusto ullam dolore in, architecto ex praesentium quas est reprehenderit doloribus possimus.</p>
				<p class="text-center mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ullam dolor cum laborum eos consequuntur fugit ipsa repellendus, eum voluptatibus consectetur natus harum enim nesciunt dignissimos dolore aliquid? Ad, non.</p>
			</div>
		</div>

		<!-- Show Types of Programme that ATTI Have Component Section -->
		<div class="row mb-5 justify-content-center">
			<div class="col-6 col-md-4">
				<router-link :to="{ name: 'Courses' }" class="text-decoration-none card border-0 bg-light mb-4 shadow">
					<img src="@/assets/images/informationtech.jpg" class="card-img-top" alt="Information Technology" srcset="">
					<div class="card-body">
						<h3 class="card-title h5 text-secondary font-weight-bold text-center my-auto">Information Technology</h3>
					</div>
				</router-link>
			</div>
			<div class="col-6 col-md-4">
				<router-link :to="{ name: 'Courses' }" class="text-decoration-none card border-0 bg-light mb-4 shadow">
				<img src="@/assets/images/financeaccounting.jpg" class="card-img-top" alt="Finance and Accounting" srcset="">
					<div class="card-body">
						<h3 class="card-title h5 text-secondary font-weight-bold text-center my-auto">Finance and Accounting</h3>
					</div>
				</router-link>
			</div>
			<div class="col-8 col-md-4">
				<router-link :to="{ name: 'Courses' }" class="text-decoration-none card border-0 bg-light mb-4 shadow">
				<img src="@/assets/images/businessmanagement.jpg" class="card-img-top" alt="Business Management" srcset="">
					<div class="card-body">
						<h3 class="card-title h5 text-secondary font-weight-bold text-center my-auto">Business Management</h3>
					</div>
				</router-link>
			</div>
		</div>

		<div class="row g-0 bg-light mb-5">
			<div class="col-md-5 mb-md-0 p-4 d-flex align-items-center">
				<img src="@/assets/images/advertising.png" class="img-fluid" alt="Digital Marketing Professional">
			</div>
			<div class="col-md-7 p-4 pl-md-0 align-self-center">
				<router-link :to="{ name: 'Courses' }" class="text-decoration-none text-head">
					<h3 class="text-center mb-3 h3">Digital Marketing Professional</h3>
				</router-link>
				<p class="mt-2 mb-3 border-left border-w-4 border-primary pl-2"> Communicating with advertising agency stakeholders in a variety of ways in two languages</p>
				<p class="mt-2 mb-3  border-left border-w-4 border-warning pl-2"> Using mathematics in advertising and personal applications for specified purposes</p>
				<p class="mt-2 mb-3  border-left border-w-4 border-success pl-2"> Adhering to advertising work ethic and industry accepted practice standards</p>
				<p class="my-0 border-left border-w-4 border-info pl-2"> Describing advertising clients, products and business systems in competitive environments</p>
				<p class="text-center mt-3 mb-0">
					<a href="https://diagnostic.digitalmarketinginstitute.com/auth/affiliate/ZA-ATN" class="btn text-white btn-success" target="_blank" rel="noopener noreferrer">Digital Marketing Diagnostic</a>
				</p>
			</div>
		</div>

		<!-- Register for Corporate training or individual  -->
		<div class="row justify-content-center py-4 py-md-5 banner mb-5 g-md-0">
			<div class="col-10 col-md-8">
				<h2 class="display-5 text-center text-light font-weight-bold my-auto">Discover More</h2>
				<p class="text-center text-light mt-3 mb-4">
					Are you looking for Corporate Training or are you an Individual? <br>
					you can Register now.
				</p>
			</div>
			<div class="col-8 col-md-6 btn-group">
				<button class="btn btn-warning border-light border-w-3">Corporate</button>
				<router-link :to="{ name: 'EnrollCourse' }" class="btn btn-success border-light border-w-3">Individual</router-link>
			</div>
		</div>
		
	</div>

	<!-- add footer template at the bottom of the home page -->
	<Footer />
</template>
<script>
	import Footer from "./Footer";
	import Banner from "./Banner.vue"
	export default {
		components: { Footer, Banner }
	}
</script>
