<template>
    <div>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Groups</h3>
                <router-link :to="{ name: 'groups.create' }" class="btn btn-primary">
                    Create Group
                </router-link>
            </div>

            <ul class="list-group list-group-flush">
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


    </div>
</template>

<script>
    import Group from '../../models/Group'

    export default {
        name: "groups-index",

        data() {
            return {
                groups: [],
            }
        },

        async mounted() {
            this.groups = await Group
                .orderBy('name')
                .$get()
        },

        methods: {
            async destroy(group) {
                let response = await group.delete();
                this.groups.splice(group, 1)
            }
        }
    }
</script>
