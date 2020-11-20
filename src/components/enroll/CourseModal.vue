<template>
	<!--Categories Modal -->
	<div class="modal fade" id="curseStaticModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="courseStaticBackdrop" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-fullscreen-md-down">
			<div class="modal-content">
				<div class="modal-header border-0 bg-brand">
                    <h5 class="modal-title text-light">Choose Course</h5>
                    <button type="button" class="close border-0 bg-brand text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
				<div class="modal-body px-md-4">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-md-6 mb-3" v-for="course in courses" :key="course.id" @click="chooseCourse(course.id)">
                                <div class="card text-secondary border-w-3 bg-light text-decoration-none pointer" :class="{'border-success': isCourseId(course.id), 'border-light': !isCourseId(course.id)}">
                                    <div class="card-body">
                                        <h3 class="h4">{{ course.course }}</h3>
                                        <p class="card-text my-1">{{ course.description.slice(0,100) }}</p>
                                        <p class="card-text my-1 text-sm">course period: {{ course.period }} months</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-sm btn-success px-3" data-dismiss="modal" aria-label="Close">
                                    Done
                                </button>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import { onMounted, reactive, computed } from 'vue'
import axios from 'axios'
import { useStore } from 'vuex'
export default {
    setup() {
        const store = useStore()
        const currentCourseId = computed(()=> store.state.Enroll.application.course.id)
        const isCourseId = cid => cid == currentCourseId.value ? true : false
        /** Get All course and expose them to component **/
        const courses = reactive([])
        onMounted(()=> {
            axios.get(`${ store.state.baseAPI_URL }api/courses`).then(response => {
                response.data.forEach(data => {
                    courses.push(data)
                })
            })
        })

        function chooseCourse(id) {
            store.dispatch('setCourse', id)
        }
        
        return { courses, chooseCourse, isCourseId }
    }
}
</script>