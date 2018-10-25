<template>
    <div class="card mb-4">
        <div class="card-header">Create Modpack</div>

        <div class="card-body">

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name"
                           v-model="modpack.name"
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
    import Modpack from '../../models/Modpack'

    export default {
        name: "modpacks-show",

        props: ['modpackId'],

        data() {
            return {
                modpack: new Modpack({}),
            }
        },

        async mounted() {
            this.modpack = await Modpack.find(this.modpackId)
        },

        methods: {
            async save() {
                await this.modpack.save();
                this.$router.push({ name: 'modpacks.show', params: { modpackId: this.modpack.id } })
            }
        }
    }
</script>