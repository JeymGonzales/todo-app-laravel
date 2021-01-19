require('./bootstrap');
window.Vue = require('vue');
window.axios = require('axios');

window.onload = function(){
    let token = document.head.querySelector('meta[name="csrf-token"]');
  
    if (token) {
      window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    } else {
      console.info('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
    }
}

Vue.component('todo', require('./components/TodoComponent.vue').default);

const app = new Vue({
    el: '#app',
});