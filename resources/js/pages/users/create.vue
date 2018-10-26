<template>
    <div class="card mb-4">
        <div class="card-header">Create User</div>

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

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password"
                           v-model="user.password"
                    >
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password_confirm"
                           v-model="user.password_confirm"
                    >
                </div>
            </div>

            <div class="form-user row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" @click="create(false)">Create & Add Another</button>
                    <button type="submit" class="btn btn-primary" @click="create(true)">Create User</button>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import User from '../../models/User'

    export default {
        name: "users-add",

        data() {
            return {
                user: new User({}),
            }
        },

        methods: {
            async create(redirect = true) {
                await this.user.save();
                this.user = new User({});

                if(redirect) {
                    this.$router.push({name: 'users.show', params: {userId: this.user.id}})
                }
            }
        }
    }
</script>