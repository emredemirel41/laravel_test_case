import { createWebHistory, createRouter } from "vue-router";
import Home from "../views/Home.vue";
import Authors from "../views/Authors.vue";
import AddBook from "../views/AddBook.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/authors",
    name: "Authors",
    component: Authors,
  },
  {
    path: "/addbook",
    name: "AddBook",
    component: AddBook,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;