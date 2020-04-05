
require('./bootstrap');
window.Vue = require('vue');

//Vue Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/master.vue').default);


// V -Form
import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;


import {routes} from './routes';

const router = new VueRouter({
  routes // short for `routes: routes`
})


const app = new Vue({
    el: '#app',
    router,
    mode: 'history'
});
