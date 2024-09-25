import './assets/main.css';
import './assets/tailwind.css';
import { createApp } from 'vue';
import { createPinia } from 'pinia';

import App from './Pages/Frontend/App.vue';
import router from '.';
import ElementPlus from 'element-plus';
import 'element-plus/dist/index.css';
const app = createApp(App);

app.use(createPinia());
app.use(router);
app.use(ElementPlus);
app.mount('#app');
