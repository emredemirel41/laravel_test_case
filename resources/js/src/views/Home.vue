<template>
    <div class="container">
        <div class="row mt-5">
            <div class="mt-5 col-8 mx-auto">
                <div v-if="getToken != ''">
                    <h6>You're logged in.</h6>
                    <h1>Hello {{getUserName}}</h1>
                </div>
                <div v-else>
                    <form @submit.prevent="handleFormSubmit">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input v-model="email" type="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input v-model="password" type="password" class="form-control">
                        </div>
                        <button  type="submit" class="btn btn-success">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


import { mapGetters, mapActions } from "vuex";
export default {
    data() {
        return {
            email: '',
            password: '',
        }
    },
    computed: {
        ...mapGetters([
            'getToken','getUserName',
        ]),
    },
    methods: {
        ...mapActions([
            'setLogin',
        ]),
        handleFormSubmit() {
            this.setLogin({ email: this.email, password: this.password });
        }
    },
}
</script>