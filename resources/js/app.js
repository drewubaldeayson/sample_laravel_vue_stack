import './bootstrap';

import {createApp} from 'vue';
import router from './routes/routes'

import app from './components/App.vue';

createApp(app).use(router).mount('#app');
