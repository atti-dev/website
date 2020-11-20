import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import(/* webpackChunkName: "home" */ '@/components/home/Home.vue')
  },
  {
    path: '/courses',
    name: 'Courses',
    component: () => import(/* webpackChunkName: "courses" */ '@/components/courses/Courses.vue')
  },
  {
    path: '/courses/:course_id',
    name: 'ShowCourse',
    component: () => import(/* webpackChunkName: "courses" */ '@/components/courses/ShowCourse.vue')
  },
  {
    path: '/about',
    name: 'About',
    component: () => import(/* webpackChunkName: "about" */ '@/components/about/About.vue')
  },
  {
    path: '/contact',
    name: 'Contact',
    component: () => import(/* webpackChunkName: "contact" */ '@/components/contact/Contact.vue')
  },
  {
    path: '/enrolment/apply',
    name: 'EnrollCourse',
    component: () => import(/* webpackChunkName: "applicationform" */ '@/components/enroll/ApplicationForm.vue')
  },
  {
    path: '/enrolment/:id_number/:course_id',
    name: 'EnrolmentForm',
    component: () => import(/* webpackChunkName: "enrolmentform" */ '@/components/enroll/EnrolmentForm.vue')
  },
  {
    path: '/enrolment/update/:id_number',
    name: 'EnrolmentFormP2',
    component: () => import(/* webpackChunkName: "enrolmenteormpage2" */ '@/components/enroll/EnrolmentFormP2.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
