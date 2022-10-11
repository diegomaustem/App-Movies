

import ListMovie from '../components/movies/ListMovie.vue'
import CreateMovie from '../components/movies/CreateMovie.vue'

import ListTag from '../components/tags/ListTag.vue'
import CreateTag from '../components/tags/CreateTag.vue'

import { createRouter, createWebHistory } from 'vue-router'

const routes = [

    {
        name: 'Home',
        path: '/',
        component: ListMovie
    },
    {
        name: 'ListTag',
        path: '/tags',
        component: ListTag
    },
    {
        name: 'CreateTag',
        path: '/tag/add',
        component: CreateTag
    },




    {
        name: 'ListMovie',
        path: '/movies',
        component: ListMovie
    },
    {   
        name: 'CreateMovie',
        path: '/movie/add',
        component: CreateMovie
    }
    
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;