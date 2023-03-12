<template>
    <div class="container">
        <div class="row mt-5">
            <div class="mt-5 col-8 mx-auto">
                <h3>Add Book</h3>
                <hr>
                <form ref="addingForm" @submit.prevent="handleFormSubmit">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input v-model="title" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input v-model="description" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ISBN</label>
                        <input v-model="isbn" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Format</label>
                        <select v-model="format" class="form-select" aria-label="Default select example">
                            <option selected value="Hardcover Books">Hardcover Books</option>
                            <option value="Trade Paperbacks">Trade Paperbacks</option>
                            <option value="Miniature Books">Miniature Books</option>
                            <option value="Photo Books">Photo Books</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Number of Pages</label>
                        <input v-model="number_of_pages" type="number" min="1" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Release Date</label>
                        <input v-model="release_date" type="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Author</label>
                        <select v-model="author_id" class="form-select" aria-label="Default select example">
                            <option value="">Select Author</option>
                            <option v-for="item in authors" :value="item.id">{{ item.first_name }} {{ item.last_name }}
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-block btn-success">Add New Book</button>
                </form>
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
            author_id: null,
            title: null,
            release_date: null,
            description: null,
            format: null,
            isbn: null,
            number_of_pages: null,
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
        handleFormSubmit() {
            axios.post('/books', 
            {
                'title': this.title,
                'release_date': this.release_date,
                'description': this.description,
                'isbn': this.isbn,
                'format': this.format,
                'number_of_pages': this.number_of_pages,
                'author_id': this.author_id,
            }, {
                headers: {
                    'Authorization': `Bearer ${this.getToken}`
                }
            })
                .then(response => {
                    this.$refs.addingForm.reset();
                    alert('Book Added');
                })
                .catch(e => {
                    alert(e.response.data.message);
                })
        }
    },
    created() {
        this.getAuthorData();
    }
}
</script>