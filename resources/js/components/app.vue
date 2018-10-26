<template>
    <div class="container">
        <div class="row">

            <!-- Navigation -->
            <div class="col-2">
                <nav class="nav nav-pills flex-column">
                    <router-link :to="{ name: 'home' }"
                                 class="nav-item nav-link"
                                 active-class="active"
                    >
                        Home
                    </router-link>
                    <router-link :to="{ name: 'users.index' }"
                                 class="nav-item nav-link"
                                 active-class="active"
                    >
                        Users
                    </router-link>
                    <router-link :to="{ name: 'groups.index' }"
                                 class="nav-item nav-link"
                                 active-class="active"
                    >
                        Groups
                    </router-link>
                    <router-link :to="{ name: 'modpacks.index' }"
                                 class="nav-item nav-link"
                                 active-class="active"
                    >
                        Modpacks
                    </router-link>
                </nav>
            </div>

            <!-- Content -->
            <div class="col-10">
                <router-view></router-view>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "app"
    }
</script>
