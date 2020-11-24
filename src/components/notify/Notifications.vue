<template>
    <teleport to="#notifications">
        <div class="notification d-block p-3 m-3 rounded text-light" v-for="(item, index) in notifications" :key="index"
            :class="{'bg-success': item.success, 'bg-danger': !item.success}">
            <div class="d-flex justify-content-between aligh-item-center border-bottom border-w-3 pb-2">
                <h4 class="h5 my-auto">{{ item.title }}</h4>
                <button @click="remove(index)" type="button" class="btn-close" aria-label="Close"></button>
            </div>
            <p class="mt-3 mb-auto">{{ item.message }}</p>        </div>
    </teleport>
</template>
<script>
import { computed } from 'vue'
import { useStore } from 'vuex'
export default {
    setup() {
        const store = useStore()
        const notifications = computed(()=> store.state.Notifications.data)

        // const data = {
        //     title: 'Student Application',
        //     message: 'Application Sent Success',
        //     success: true,
        // }

        function remove(index) {
            store.dispatch('removeNotification', index)
        }

        return { notifications, remove }
    }
}
</script>