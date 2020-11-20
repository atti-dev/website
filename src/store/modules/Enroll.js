import axios from 'axios'
const Enroll = {
    state: {
        application: {
            course: {
                id: "",
                course: "",
                decription: "",
                period: ""
            },
            firstname: "",
            lastname: "",
            id_number: "",
            contact_number: "",
            email: "",
            pending: true
        }
    },

    mutations: {
        SET_COURSE: (state, course)=> {
            state.application.course.id = course.id
            state.application.course.course = course.course
            state.application.course.description = course.description
            state.application.course.period = course.period
        }
    },

    actions: {
        setCourse: ({commit, rootState}, course_id)=> {
            axios.get(`${ rootState.baseAPI_URL }api/courses/${course_id}`)
            .then(response => {
                commit('SET_COURSE', response.data)
            })
        }
    },
}
export default Enroll