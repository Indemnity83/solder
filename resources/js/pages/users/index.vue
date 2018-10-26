<template>
    <div>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Users</h3>
                <router-link :to="{ name: 'users.create' }" class="btn btn-primary">
                    Create User
                </router-link>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center" v-for="user in users" :key="user.id">
                    <div>
                        {{ user.name }}
                    </div>
                    <div class="btn-group btn-group-sm" role="user" aria-label="Basic example">
                        <router-link :to="{ name: 'users.show', params: { userId: user.id } }"
                                     class="btn btn-outline-primary"
                        >
                            View
                        </router-link>
                        <router-link :to="{ name: 'users.edit', params: { userId: user.id } }"
                                     class="btn btn-outline-primary"
                        >
                            Edit
                        </router-link>
                        <button type="button" @click="destroy(user)" class="btn btn-outline-primary">Delete</button>
                    </div>
                </li>
            </ul>
        </div>



    </div>
</template>

<script>
    import User from '../../models/User'

    export default {
        name: "users-index",

        data() {
            return {
                users: [],
                userForm: new User({}),
            }
        },

        async mounted() {
            this.users = await User
                .orderBy('name')
                .$get()
        },

        methods: {
            async postUserForm() {
                let response = await this.userForm.save();
                this.users.push(response);
                this.userForm = new User({});
            },

            async destroy(user) {
                let response = await user.delete();
                this.users.splice(user, 1)
            }
        }
    }
</script>
