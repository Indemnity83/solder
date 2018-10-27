<template>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Modpacks</span>
            <router-link :to="{ name: 'modpacks.create' }" class="action-link">
                Create New Modpack
            </router-link>
        </div>

        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center" v-for="modpack in modpacks" :key="modpack.id">
                <div>
                    {{ modpack.name }}
                </div>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <router-link :to="{ name: 'modpacks.show', params: { modpackId: modpack.id } }"
                                 class="btn btn-link"
                    >
                        View
                    </router-link>
                    <router-link :to="{ name: 'modpacks.edit', params: { modpackId: modpack.id } }"
                                 class="btn btn-link"
                    >
                        Edit
                    </router-link>
                    <button type="button" @click="destroy(modpack)" class="btn btn-link text-danger">Delete</button>
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
            }
        },

        async mounted() {
            this.modpacks = await Modpack
                .orderBy('name')
                .$get()
        },

        methods: {
            async destroy(modpack) {
                let response = await modpack.delete();
                this.modpacks.splice(modpack, 1)
            }
        }
    }
</script>
