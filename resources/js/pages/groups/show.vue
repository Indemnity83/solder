<template>
    <div>
        <div class="card mb-4">
            <div class="card-header">{{ modpack.name }}</div>

            <div class="card-body">
                &nbsp;
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
                modpack: {},
            }
        },

        async mounted() {
            this.modpack = await Modpack.find(this.modpackId)
        }
    }
</script>