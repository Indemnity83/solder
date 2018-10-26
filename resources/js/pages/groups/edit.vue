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

            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" @click="save">Save</button>
                </div>
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
                group: new Group({}),
            }
        },

        async mounted() {
            this.group = await Group.find(this.groupId)
        },

        methods: {
            async save() {
                await this.group.save();
                this.$router.push({ name: 'groups.show', params: { groupId: this.group.id } })
            }
        }
    }
</script>