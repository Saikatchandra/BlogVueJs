
require('./bootstrap');
window.Vue = require('vue');

//Support VueX
import Vuex from "vuex"
Vue.use(Vuex)

import storeData from './store/index'

const store = new Vuex.Store(
         
        storeData    
  )

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

//SweetAlert 2 
import Swal from 'sweetalert2'

window.Swal =Swal;


const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})


window.Toast = Toast;



import {routes} from './routes';

const router = new VueRouter({
  routes // short for `routes: routes`
})


const app = new Vue({
    el: '#app',
    router,
    mode: 'hash',
    store
});
