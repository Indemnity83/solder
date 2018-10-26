<template>
    <div class="card mb-4">
        <div class="card-header">Modpack Details</div>

        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex">
                    <div class="w-25">Name</div>
                    <div class="w-75">{{ modpack.name }}</div>
                </li>
            </ul>
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
                modpack: {},
            }
        },

        async mounted() {
            this.modpack = await Modpack.find(this.modpackId)
        }
    }
</script>