<template>
    <div class="d-flex h-screen flex-column">

        <header class="d-flex">
            <div class="flex-nav bg-primary text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="fill-current m-1.5"><path d="M50.3 1.2C23.6 1.2 1.9 22.9 1.9 49.7c0 26.7 21.7 48.4 48.4 48.4s48.4-21.7 48.4-48.4c0-26.8-21.6-48.5-48.4-48.5zm0 87c-21.3 0-38.5-17.3-38.5-38.5 0-21.3 17.3-38.5 38.5-38.5 21.3 0 38.5 17.3 38.5 38.5.1 21.2-17.2 38.5-38.5 38.5z"></path> <path d="M62.9 90.7l.5-45.2 1.3-.5.5-1.7-14.8-3.7-.7 2.4h-3.4V29.7l.6-.7h18.8v-3.6s-6.4-8.5-18-8.5c-12 0-11.8 8.8-11.8 9.7v15.3c-1.5 0-4.4 1.1-4.4 5.2 0 3.8 2 4.8 1.7 8.4-.4 4.2.8 4.9 2.7 5.4v2.5h-2.2v7.1h2.2v7.2c0 3.4 1.4 5.4 5 5.4 3.7 0 4.9-1.8 4.9-5.5v-.8c1.4 0 4 1.6 4 3.9v1.8c0 3.5 0 4.6.1 8.2h13zM49.8 61.1c0 3.6 0 7.5.1 11.6h-4v-2.2h2v-7.1h-2v-2.3h3.9z"></path></svg>
            </div>
            <nav class="flex-1 navbar navbar-expand-lg navbar-light bg-white">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <router-link :to="{ name: 'home' }"
                                         class="nav-link"
                                         active-class="active"
                            >
                                Home
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'users.index' }"
                                         class="nav-link"
                                         active-class="active"
                            >
                                Users
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'modpacks.index' }"
                                         class="nav-link"
                                         active-class="active"
                            >
                                Modpacks
                            </router-link>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                User
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <router-link :to="{ name: 'profile' }"
                                             class="dropdown-item"
                                             active-class="active"
                                >
                                    Profile
                                </router-link>
                                <a class="dropdown-item" @click="logout">Logout</a>
                            </div>
                        </li>
                    </div>
                </div>
            </nav>
        </header>

        <div class="d-flex flex-1">
            <main class="flex-1 bg-light overflow-scroll">
                <div class="container mt-4">
                    <router-view></router-view>
                </div>
            </main>
            <nav class="flex-nav -order-1 bg-dark text-light overflow-scroll">

            </nav>
            <aside class="flex-aside d-none">
                Aside
            </aside>
        </div>

    </div>
</template>

<script>
    export default {
        name: "app",

        methods: {
            logout() {
                axios.post('/logout').then(function (response) {
                    window.location.replace('/');
                })
            }
        }
    }
</script>
