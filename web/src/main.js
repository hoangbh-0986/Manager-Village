import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";
import locale from "element-ui/lib/locale/lang/vi";
import "@/assets/css/tailwind.css";

Vue.use(ElementUI, { locale });
Vue.config.productionTip = false;

new Vue({
  router,
  store,
  el: "#app",
  render: (h) => h(App),
}).$mount("#app");
