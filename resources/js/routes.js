import AllRooms from './components/AllRooms.vue';
import AllUserRooms from './components/AllUserRooms.vue';
import AddRoom from './components/AddRoom.vue';
import EditRoom from './components/EditRoom.vue';
import AddUserRoom from './components/AddUserRoom.vue';
import EditUserRoom from './components/EditUserRoom.vue';
import Login from './components/Login.vue';
import { createRouter, createWebHistory } from "vue-router"



const routes = [
    {
        name: 'home',
        path: '/admin',
        component: AllRooms
    },
    {
        name: 'homeuser',
        path: '/user',
        component: AllUserRooms
    },
    {
        name: 'add',
        path: '/add',
        component: AddRoom
    },

    {
        name: 'edit',
        path: '/edit/:uid',
        component: EditRoom
    },
    {
        name: 'adduser',
        path: '/adduser',
        component: AddUserRoom
    },
    {
        name: 'edituser',
        path: '/edit/:uid',
        component: EditUserRoom
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    }
]



/*
const router =VueRouter.createRouter({
     history: VueRouter.createWebHistory(),
     routes,
} );*/
const router = createRouter({
      history : createWebHistory(),
      routes : routes
    })
    
export default router;


// export default routes