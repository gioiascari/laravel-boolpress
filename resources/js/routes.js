import Vue from "vue";

import VueRouter from "vue-router";

Vue.use(VueRouter);

import HomeComponent from "./pages/HomeComponent";

//Qua si definiscono le rotte
const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: HomeComponent,
        },
    ],
});

export default router;
