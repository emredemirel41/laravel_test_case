<template>
    <div class="container">
        <div class="row mt-5">
            <div class="mt-5 col-12 mx-auto">
                <h3>{{ author.first_name }} {{ author.last_name }}</h3>
                <small>{{ author.birthday }} | {{ author.gender }} | {{ author.place_of_birth }}</small>
                <p>{{ author.biography }}</p>
                <hr>
                <h3>Books</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Release Date</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">Format</th>
                            <th scope="col">Num.Of.Page</th>
                            <th scope="col">Description</th>
                            <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in author.books">
                            <td>{{ item.title }} </td>
                            <td>{{ item.release_date }}</td>
                            <td>{{ item.isbn }}</td>
                            <td>{{ item.format }}</td>
                            <td>{{ item.number_of_pages }}</td>
                            <td>{{ item.description }}</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <button @click="deleteBook(item.id)" class="btn btn-sm btn-danger">Delete</button>
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
            author: null,
        }
    },
    computed: {
        ...mapGetters([
            'getToken',
        ]),
    },
    methods: {
        getAuthorData() {
            axios.get('/authors/' + this.$route.params.id, {
                headers: {
                    Authorization: `Bearer ${this.getToken}`,
                },
            })
                .then(response => {
                    this.author = response.data.data;
                })
                .catch(e => {
                    alert(e.response.data.message);
                })
        },
        deleteBook(id){
            axios.delete('/books/'+id, {
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