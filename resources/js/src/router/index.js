import { createWebHistory, createRouter } from "vue-router";
import Home from "../views/Home.vue";
import Authors from "../views/Authors.vue";
import AddBook from "../views/AddBook.vue";
import AuthorDetail from "../views/AuthorDetail.vue";

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
    beforeEnter: (to, from) => {
      // reject the navigation
      return localStorage.getItem("token") ? true : false;
    },
  },
  {
    path: "/authors/:id",
    name: "AuthorDetail",
    component: AuthorDetail,
    beforeEnter: (to, from) => {
      // reject the navigation
      return localStorage.getItem("token") ? true : false;
    },
  },
  {
    path: "/addbook",
    name: "AddBook",
    component: AddBook,
    beforeEnter: (to, from) => {
      // reject the navigation
      return localStorage.getItem("token") ? true : false;
    },
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;