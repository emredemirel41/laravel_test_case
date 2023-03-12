// app.js
import {createApp} from 'vue'

import App from './App.vue'
import router from './src/router'
import store from './src/store'
import axios from 'axios'

 axios.defaults.baseURL = window.location.origin+'/api';
 axios.defaults.headers.common['Content-Type'] = 'application/json';
 axios.defaults.headers.common['Accept'] = 'application/json';

createApp(App).use(router).use(store).mount("#app")