<template>
    <div class="card mb-4">
        <div class="card-header">Create Group</div>

        <div class="card-body">

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name"
                           v-model="group.name"
                    >
                </div>
            </div>

            <div class="form-user row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" @click="create(false)">Create & Add Another</button>
                    <button type="submit" class="btn btn-primary" @click="create(true)">Create Group</button>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import Group from '../../models/Group'

    export default {
        name: "groups-create",

        data() {
            return {
                group: new Group({}),
            }
        },

        methods: {
            async create(redirect = true) {
                await this.group.save();
                this.group = new Group({});

                if(redirect) {
                    this.$router.push({name: 'groups.show', params: {groupId: this.group.id}})
                }
            }
        }
    }
</script>