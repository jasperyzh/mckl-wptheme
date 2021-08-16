import "bootstrap/dist/js/bootstrap.bundle";

import Vue from "vue";
import Axios from "axios";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";

// Import Bootstrap an BootstrapVue CSS files (order is important)
import "./scss/style.scss";

// images
import "./assets/logo-mckl-horizontal-white.svg";
import "@/assets/bg-blend-1.jpg";
import "@/assets/bg-blend-2.jpg";
import "@/assets/bg-blend-3.jpg";
import "@/assets/parallax-1.png";

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);
// Axios installed globally
Vue.use({
  install(Vue) {
    Vue.prototype.$api = Axios.create({
      baseURL: window.secret.restUrl + 'wp/v2/'
    })
    Vue.prototype.$api_nobaseurl = Axios.create({
      baseURL: ''
    })
  }
})

import App from "./App.vue";
import FooterBefore from "./components/FooterBefore.vue";
// import Frontpage from "./pages/Frontpage.vue";

import PostNews from "./components/PostNews.vue";
import PostEvents from "./components/PostEvents.vue";
import DisplayProgrammes from "./components/DisplayProgrammes.vue";
import WhyMckl from "./components/WhyMckl.vue";


import ProgrammeOverview from "./pages/ProgrammeOverview.vue";
import ProgrammeSingle from "./pages/ProgrammeSingle.vue";
import ProgrammeCategory from "./pages/ProgrammeCategory.vue";

import EnquiryForm from "./components/EnquiryForm.vue";

Vue.config.productionTip = false;

let vueApp = {
  "#app": App,
  "#footer-before": FooterBefore,
  // "#frontpage": Frontpage,

  "#post-news": PostNews,
  "#post-events": PostEvents,
  "#display-programmes": DisplayProgrammes,
  "#why-mckl": WhyMckl,

  "#programme_overview": ProgrammeOverview,
  "#programme_category": ProgrammeCategory,
  "#programme_single": ProgrammeSingle,

  
  "#enquiry_form": EnquiryForm
};
document.addEventListener("DOMContentLoaded", () => {
  for (const key in vueApp) {
    if (document.querySelector(key)) {
      console.log("vue-", key);
      new Vue({
        render: h => h(vueApp[key]),
      }).$mount(key);
    }
  }
});