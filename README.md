
# Laravel 9 & Vue 3 SPA

You can only login. After logging in, you can see the list of authors. You can see the books of the authors. Can add and delete books. If an author does not have a book, you can delete that author.


## Get Started

Clone this Project

```bash
  git clone https://github.com/emredemirel41/laravel_test_case.git
```

Go to your project folder

```bash
  cd my-project
```

Run the following commands in order.

```bash 
  composer install
  cp .env.example .env
```

Open your `.env` file and change the database name `(DB_DATABASE)` to whatever you have, username `(DB_USERNAME)` and `password` `(DB_PASSWORD)` field correspond to your configuration.

Run the following commands in order.

```bash 
  php artisan key:generate
  php artisan migrate
  php artisan db:seed
```

To set up the frontend side.

```bash 
  npm install
```

To get the project up and running

```bash
  php artisan serve
  npm run dev
```


## Extra Informations

You can create a random author with the number of books you defined, For this, you can below artisan command.

```bash
    php artisan create:new-author {numberofbooks}
	ex: php artisan create:new-author 10
```
## Test Credentials

**Email:** ahsoka.tano@q.agency

**password:** Kryze4President

  
## API Usage

#### Get Access Token

```http
  POST /api/login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required**. your email. |
| `password` | `string` | **Required**. your password. |


#### Revoke Access Token

```http
  POST /api/logout
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Authorization` | `string` | **Required**. your access_token. |


#### Get Authors

```http
  GET /api/authors
```
#### Get Author Detail

```http
  GET /api/authors/{author_id}
```

#### Delete Author

```http
  DELETE /api/authors/{author_id}
```

#### Create A Book

```http
  POST /api/books/
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `title` | `string` | **Required**. book title. |
| `release_date` | `string` | **Required**. book release date. |
| `description` | `string` | **Required**. book description. |
| `isbn` | `string` | **Required**. book isbn. |
| `format` | `string` | **Required**. book format. |
| `number_of_pages` | `integer` | **Required**. book number of pages. |
| `author_id` | `integer` | **Required**. Author ID. |


#### Delete Book

```http
  DELETE /api/books/{book_id}
```

  
## Notes

Only the desired functions are written in the project.

There are many improvements that can be made to Vue.js. But it has been kept in its simplest form.


The test was not written because it was not requested.
