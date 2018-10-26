<template>
    <div class="card mb-4">
        <div class="card-header">Edit User</div>

        <div class="card-body">

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name"
                           v-model="user.name"
                    >
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email"
                           v-model="user.email"
                    >
                </div>
            </div>

            <div class="form-user row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" @click="save(false)">Update & Continue Editing</button>
                    <button type="submit" class="btn btn-primary" @click="save(true)">Update User</button>
                </div>
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
                user: new User({}),
            }
        },

        async mounted() {
            this.user = await User.find(this.userId)
        },

        methods: {
            async save(redirect) {
                this.user = await this.user.save();

                if(redirect) {
                    this.$router.push({name: 'users.show', params: {userId: this.user.id}})
                }
            }
        }
    }
</script>