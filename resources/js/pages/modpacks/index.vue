<template>
    <div>
        <div class="card mb-4">
            <div class="card-header">Create Modpack</div>

            <div class="card-body">

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name"
                                   v-model="modpackForm.name"
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" @click="postModpackForm">Add</button>
                        </div>
                    </div>

            </div>
        </div>

        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center" v-for="modpack in modpacks" :key="modpack.id">
                <div>
                    {{ modpack.name }}
                </div>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <router-link :to="{ name: 'modpacks.show', params: { modpackId: modpack.id } }"
                                 class="btn btn-outline-primary"
                    >
                        View
                    </router-link>
                    <router-link :to="{ name: 'modpacks.edit', params: { modpackId: modpack.id } }"
                                 class="btn btn-outline-primary"
                    >
                        Edit
                    </router-link>
                    <button type="button" @click="destroy(modpack)" class="btn btn-outline-primary">Delete</button>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    import Modpack from '../../models/Modpack'

    export default {
        name: "modpacks-index",

        data() {
            return {
                modpacks: [],
                modpackForm: new Modpack({}),
            }
        },

        async mounted() {
            this.modpacks = await Modpack
                .orderBy('name')
                .$get()
        },

        methods: {
            async postModpackForm() {
                let response = await this.modpackForm.save();
                this.modpacks.push(response);
                this.modpackForm = new Modpack({});
            },

            async destroy(modpack) {
                let response = await modpack.delete();
                this.modpacks.splice(modpack, 1)
            }
        }
    }
</script>
