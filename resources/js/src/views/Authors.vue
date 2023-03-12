<template>
    <div class="container">
        <div class="row mt-5">
            <div class="mt-5 col-12 mx-auto">
                <h3>Authors</h3>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name Surname</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Place of Birth</th>
                            <th scope="col">Num.Of.Books</th>
                            <th scope="col">Biography</th>
                            <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in authors">
                            <td>{{ item.first_name }} {{ item.last_name }}</td>
                            <td>{{ item.birthday }}</td>
                            <td>{{ item.gender }}</td>
                            <td>{{ item.place_of_birth }}</td>
                            <td>{{ item.number_of_books }}</td>
                            <td>{{ item.biography }}</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <router-link class="btn btn-sm btn-warning" :to="{ name: 'AuthorDetail', params: { id: item.id }}">Detail</router-link>
                                    <button @click="deleteAuthor(item.id)" class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

import { mapGetters } from "vuex";
import axios from 'axios'

export default {
    data() {
        return {
            authors: [
            ],
        }
    },
    computed: {
        ...mapGetters([
            'getToken',
        ]),
    },
    methods: {
        getAuthorData() {
            axios.get('/authors', {
                headers: {
                    Authorization: `Bearer ${this.getToken}`,
                },
            })
                .then(response => {
                    this.authors = response.data.data;
                })
                .catch(e => {
                    alert(e.response.data.message);
                })
        },
        deleteAuthor(id){
            axios.delete('/authors/'+id, {
                headers: {
                    Authorization: `Bearer ${this.getToken}`,
                },
            })
                .then(response => {
                    this.getAuthorData();
                })
                .catch(e => {
                    console.log(e.response.data);
                    alert(e.response.data.data);
                })
        }
    },
    created() {
        this.getAuthorData();
    }
}
</script>