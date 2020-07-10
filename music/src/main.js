import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import '@/assets/iconfont/iconfont.css' ;
import axios from 'axios';
import qs from 'qs';
Vue.prototype.$ajax = axios // 把axios换成$ajax变量
Vue.prototype.$qs = qs;
Vue.use(ElementUI);
Vue.config.productionTip = false

Vue.config.debug = true;
axios.defaults.withCredentials=true;
Vue.prototype.$axios = axios;

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
