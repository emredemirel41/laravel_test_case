<template>
    <nav class="navbar navbar-expand-lg bg-dark " data-bs-theme="dark" id="nav">
        <div class="container-fluid">
            <router-link class="navbar-brand" to="/">CaseStudy</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link class="nav-link" to="/authors">Authors</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/addbook">Add Book</router-link>
                    </li>
                </ul>
                <div class="d-flex">
                    <div v-if="getToken != ''">
                        <router-link to="/" class="mt-2" style="margin-right: 10px;">{{getUserName}}</router-link>
                        <button @click="setLogout" class="btn btn-outline-danger">Logout</button>
                    </div>
                    <div v-else>
                        <router-link class="btn btn-outline-danger" to="/">Login</router-link>
                    </div>

                </div>
            </div>
        </div>
    </nav>
    <router-view />
</template>

<script>

import axios from "axios";
import { mapGetters, mapActions } from "vuex";
export default {
    computed: {
        ...mapGetters([
            'getToken','getUserName',
        ]
        ),
    },
    methods : {
        ...mapActions([
        'initAuth','setLogout',
        ]),
    },
    created() {
        this.initAuth();
    }, 
}
</script>