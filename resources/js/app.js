import './bootstrap.js';
import 'vuestic-ui/css';
import { createApp } from 'vue';
import { createVuestic } from 'vuestic-ui';


import dashboardPage from './pages/dashboard.vue';
import accountPage from './pages/account.vue';
import registerpage from './pages/register.vue';
import login from './pages/login.vue';
import newspage from './pages/news.vue';
const app = createApp({
    methods: {
        // TODO: For future use
        arrayFind(array, condition) {
            const item = array.find(condition);
            return array.indexOf(item);
        },
        prompt(msg = "Oops, something went wrong!") {
            this.$vaToast.init({ message: msg, position: 'bottom-right' });
        },
        redirectToPage(url) {
            window.location = url;
        }
    }
});

app.component('dashboard', dashboardPage);
app.component('account', accountPage);
app.component('login', login);
app.component('register', registerpage);
app.component('news', newspage);
//import App from './App.vue'

app.use(createVuestic()).mount('#app');