import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import "bootstrap";
import "@/assets/sass/main.scss";

const app =  createApp(App)
app.use(store)
app.use(router)
app.mount('#app')

// enable development tools
// app.config.devtools = true
