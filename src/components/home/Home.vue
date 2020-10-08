<template>
	<!-- Homepage Banner -->
	<Banner />

	<div class="container-xl">
		<div class="row">
		</div>

		<div class="row g-0 bg-light position-relative mb-5">
			<div class="col-md-6 mb-md-0 p-4">
				<img src="@/assets/images/advertising.png" class="img-fluid" alt="...">
			</div>
			<div class="col-md-6 p-4 pl-md-0 align-self-center">
				<h3 class="mt-0 h2 text-head mb-3">Digital Marketing Professional</h3>
				<ul>
					<li class="my-2">Communicating with advertising agency stakeholders in a variety of ways in two languages</li>
					<li class="my-2">Using mathematics in advertising and personal applications for specified purposes</li>
					<li class="my-2">Adhering to advertising work ethic and industry accepted practice standards</li>
					<li class="my-2">Describing advertising clients, products and business systems in competitive environments</li>
					<li class="my-2">Fulfilling specific roles within advertising teams to meet objectives</li>
					<li class="my-2">Selecting areas of specialisation in advertising based on assessment of own strengths and weaknesses</li>
				</ul>
			</div>
		</div>

		<div class="row mb-4">
			<div class="col-12">
				<h2 class="text-head font-weight-bold head-5 mb-3 text-center">Available Courses</h2>
			</div>
			<div class="col-md-4 col-lg-3 mb-4">
				<div class="card border-0 h-100">
					<img class="card-img-top p-3" alt="ATTI logo" src="@/assets/images/icb.png">
					<div class="card-body pt-2">
						<p class="card-text text-center my-1">Bussiness Management</p>
						<p class="card-text text-center my-1">Office Administration</p>
						<p class="card-text text-center my-1">Finacial Accounting</p>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-3 mb-4">
				<div class="card border-0 h-100">
					<img class="card-img-top" alt="ATTI logo" src="@/assets/images/microsoftAcademy.png">
					<div class="card-body pt-2">
						<p class="card-text text-center my-1">MCSA: Window 8</p>
						<p class="card-text text-center my-1">MCSA: Window Server 2012</p>
						<p class="card-text text-center my-1">MCSE: Desktop Infrastructure</p>
						<p class="card-text text-center my-1">MCSE: Server Infrastructure</p>
						<p class="card-text text-center my-1">MCSD: Web Applications</p>						
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-3 mb-4">
				<div class="card border-0 h-100">
					<img class="card-img-top" alt="ATTI logo" src="@/assets/images/attilogo.png">
					<div class="card-body pt-2 pt-lg-3">
						<p class="card-text text-center my-2">PC Technician</p>
						<p class="card-text text-center my-2">Network Technician</p>
						<p class="card-text text-center my-2">Executive Secretary</p>
						<p class="card-text text-center my-2">Web Design Basics</p>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-3 mb-4">
				<div class="card border-0 h-100">
					<img class="card-img-top" alt="ATTI logo" src="@/assets/images/mictseta.png">
					<div class="card-body pt-2 pt-lg-3">
						<p class="card-text text-center my-1">End User Computing</p>
						<p class="card-text text-center my-1">Technical Support</p>
						<p class="card-text text-center my-1">Systems Support</p>
						<p class="card-text text-center my-1">Systems Development</p>						
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-3 mb-4">
				<div class="card border-0 h-100">
					<img class="card-img-top" alt="ATTI logo" src="@/assets/images/digitalmarketing.png">
					<div class="card-body pt-2">
						<p class="card-text text-center my-2">Certified Digital Marketing Professional</p>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-3 mb-4">
				<div class="card border-0 h-100">
					<img class="card-img-top" alt="ATTI logo" src="@/assets/images/fureralservices.png">
					<div class="card-body pt-2 pt-lg-3">
						<p class="card-text text-center my-2">Funeral Services Practice</p>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-3 mb-4">
				<div class="card border-0 h-100">
					<img class="card-img-top" alt="ATTI logo" src="@/assets/images/comptia.png">
					<div class="card-body pt-2">
						<p class="card-text text-center my-2">CompTIA <span class="font-weight-bold text-danger">A+</span></p>
						<p class="card-text text-center my-2">CompTIA <span class="font-weight-bold text-info">N+</span></p>
					</div>
				</div>
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
		components: { Footer, Banner },
		setup() {

		}
	}
</script>
