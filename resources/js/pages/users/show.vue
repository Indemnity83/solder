<template>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>User Details</span>
            <router-link :to="{ name: 'users.edit', params: { userId: user.id }}">
                Edit User
            </router-link>
        </div>

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

                <li class="list-group-item d-flex">
                    <div class="w-25">Email Verified</div>
                    <div class="w-75">{{ user.email_verified_at | formatDate }}</div>
                </li>

                <li class="list-group-item d-flex">
                    <div class="w-25">Created</div>
                    <div class="w-75">{{ user.created_at | formatDate }}</div>
                </li>

                <li class="list-group-item d-flex">
                    <div class="w-25">Updated</div>
                    <div class="w-75">{{ user.updated_at | formatDate }}</div>
                </li>
            </ul>
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