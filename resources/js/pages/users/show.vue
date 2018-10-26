<template>
    <div>
        <div class="card mb-4">
            <div class="card-header">User Details</div>

            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex">
                        <div class="w-25">Name</div>
                        <div class="w-75">{{ user.name }}</div>
                    </li>

                    <li class="list-group-item d-flex">
                        <div class="w-25">Email</div>
                        <div class="w-75">{{ user.email }}</div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</template>

<script>
    import User from '../../models/User'

    export default {
        name: "users-show",

        props: ['userId'],

        data() {
            return {
                user: {},
            }
        },

        async mounted() {
            this.user = await User.find(this.userId)
        }
    }
</script>