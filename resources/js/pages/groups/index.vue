<template>
    <div>
        <div class="card mb-4">
            <div class="card-header">Create Group</div>

            <div class="card-body">

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name"
                                   v-model="groupForm.name"
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" @click="postGroupForm">Add</button>
                        </div>
                    </div>

            </div>
        </div>

        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center" v-for="group in groups" :key="group.id">
                <div>
                    {{ group.name }}
                </div>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <router-link :to="{ name: 'groups.show', params: { groupId: group.id } }"
                                 class="btn btn-outline-primary"
                    >
                        View
                    </router-link>
                    <router-link :to="{ name: 'groups.edit', params: { groupId: group.id } }"
                                 class="btn btn-outline-primary"
                    >
                        Edit
                    </router-link>
                    <button type="button" @click="destroy(group)" class="btn btn-outline-primary">Delete</button>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    import Group from '../../models/Group'

    export default {
        name: "groups-index",

        data() {
            return {
                groups: [],
                groupForm: new Group({}),
            }
        },

        async mounted() {
            this.groups = await Group
                .orderBy('name')
                .$get()
        },

        methods: {
            async postGroupForm() {
                let response = await this.groupForm.save();
                this.groups.push(response);
                this.groupForm = new Group({});
            },

            async destroy(group) {
                let response = await group.delete();
                this.groups.splice(group, 1)
            }
        }
    }
</script>
