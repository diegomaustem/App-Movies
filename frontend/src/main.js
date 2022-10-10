import { createApp } from 'vue'
import App from './App.vue'
import routes from './routes/routes'

import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'

createApp(App).use(routes).mount('#app')

