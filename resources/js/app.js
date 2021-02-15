require('./bootstrap')

import Vue from 'vue'

import App from './views/app'

const app = new Vue({
  el: '#app',
  components: { App },
})
