import { createApp } from 'vue'
import App from './App.vue'
import routes from './routes/routes'

import axios from 'axios'
import VueAxios from 'vue-axios'

import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'

createApp(App).use(routes, VueAxios, axios).mount('#app')

