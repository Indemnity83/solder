<template>
    <div>
        <div class="card mb-4">
            <div class="card-header">{{ group.name }}</div>

            <div class="card-body">
                &nbsp;
            </div>
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