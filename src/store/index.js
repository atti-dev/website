import { createStore } from 'vuex'

import Enroll from './modules/Enroll'
import Notifications from './modules/Notifications'

export default createStore({
	state: {
		baseAPI_URL: process.env.NODE_ENV == 'development'? 'http://localhost:8000/': 'http://localhost:9000/'
	},
	modules: {
		Enroll,
		Notifications
	}
})
