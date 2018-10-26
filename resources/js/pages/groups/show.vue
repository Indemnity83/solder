<template>
    <div class="card mb-4">
        <div class="card-header">Group Details</div>

        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex">
                    <div class="w-25">Name</div>
                    <div class="w-75">{{ group.name }}</div>
                </li>
            </ul>
        </div>

    </div>
</template>

<script>
    import Group from '../../models/Group'

    export default {
        name: "groups-show",

        props: ['groupId'],

        data() {
            return {
                group: {},
            }
        },

        async mounted() {
            this.group = await Group.find(this.groupId)
        }
    }
</script>