/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 import {createApp} from 'vue';
 import App from './components/App.vue';
 import router from './routes';

 
 /* creating app, with component according to route */

 const app = createApp({})

 const theroute = route().current()
 console.log("theroute : " + theroute)


 //if (theroute=="admin.view")  app.component('rooms', App).mount('#app')
 if (theroute=="admin.view")  app.component('rooms', App).use(router).mount('#app')
 if (theroute=="user.view")  app.component('rooms', App).use(router).mount('#app')



