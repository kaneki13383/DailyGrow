import { createRouter, createWebHistory } from "vue-router";
import MainView from '../views/MainView.vue';
import ClientList from '../views/ClientList.vue';

const router = new createRouter({
    base: "/",
    history: createWebHistory(),
    routes: [
        { path: "/", component: MainView },
        { path: "/client/list", component: ClientList },
    ],
});

export default router;