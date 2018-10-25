<template>
    <ul class="list-group list-group-flush">
        <li v-for="user in users" class="list-group-item">{{ user.name }}</li>
    </ul>
</template>

<script>
    import User from '../models/User'

    export default {
        name: "users-index",

        data() {
            return {
                users: {},
            }
        },

        async mounted() {
            this.users = await User.get()
        }
    }
</script>