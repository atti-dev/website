const Notifications = {
    state: {
        data: [],
    },

    mutations: {
        SET_NOTIFICATION: (state, payload)=> {
            const data = {
                title: payload.title,
                message: payload.message,
                success: payload.success
            }
            state.data.push(data)
            for (let index = 0; index < state.data.length; index++) {
                setTimeout(() => {
                    state.data.splice(index, 1)
                }, 8000);// const element = state.data[index];
            }
        },
        REMOVE_NOFIFICATIONS: (state, index)=> { 
            state.data.splice(index, 1)
        }
    },

    actions: {
        notify: ({commit}, payload) => {
            commit('SET_NOTIFICATION', payload)
        },

        removeNotification: ({commit}, index) => {
            commit('REMOVE_NOFIFICATIONS', index)
        }
    },
}
export default Notifications