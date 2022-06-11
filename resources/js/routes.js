import Vue from "vue";

import VueRouter from "vue-router";

Vue.use(VueRouter);

import HomeComponent from "./pages/HomeComponent";

import ContactsComponent from "./pages/ContactsComponent";

import BlogComponent from "./pages/BlogComponent";

import AboutUsComponent from "./pages/AboutUsComponent";

import NotFoundComponent from "./pages/NotFoundComponent";

import SinglePostComponent from "./pages/SinglePostComponent";

import CategoriesComponent from "./pages/CategoriesComponent";

import PostCategoriesComponent from "./pages/PostCategoriesComponent";

//Qua si definiscono le rotte
const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: HomeComponent,
        },
        {
            path: "/blog",
            name: "blog",
            component: BlogComponent,
        },
        {
            path: "/blog/:slug",
            name: "single-post",
            component: SinglePostComponent,
        },
        {
            path: "/categories",
            name: "categories",
            component: CategoriesComponent,
        },
        {
            path: "/categories/:id",
            name: "post-per-categories",
            component: PostCategoriesComponent,
        },

        {
            path: "/contacts",
            name: "contacts",
            component: ContactsComponent,
        },
        {
            path: "/aboutus",
            name: "aboutus",
            component: AboutUsComponent,
        },

        //NotFound deve essere all'ultimo posto perchè prima il programma deve controllare che il path sia inserito sulle page esistenti
        //Se non trova il path da nessuna parte mostra il '404 not found'
        {
            path: "/*",
            name: "notfound",
            component: NotFoundComponent,
        },
    ],
});

export default router;
