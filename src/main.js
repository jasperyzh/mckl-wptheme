import "bootstrap/dist/js/bootstrap.bundle";

import { tns } from "tiny-slider/src/tiny-slider";

import SiteHeader from "./js/SiteHeaderSlim";

document.addEventListener('DOMContentLoaded', () => {

  // programmes-testimonial
  if (document.querySelector('.elementor-section.tns-testimonial .elementor-container')) {

    var slider = tns({
      container: '.elementor-section.tns-testimonial .elementor-container',
      items: 1,
      slideBy: 1,
      autoplay: true,
      autoplayTimeout: 8000,
      autoplayButtonOutput: false,
      autoplayHoverPause: true,
      loop: true,
      navPosition: "bottom",
      mouseDrag: true,
      lazyload: true,
      controlsText: [
        `<i class="eicon-chevron-left" aria-hidden="true"></i>`,
        `<i class="eicon-chevron-right" aria-hidden="true"></i>`,
      ],
    });
    console.log(slider)
  }

  if (document.querySelector(".site-header")) {
    let test = new SiteHeader(".site-header", 20);
    console.log(test)
  }

})


import Vue from 'vue'
import Axios from "axios";
// import App from './App.vue'

Vue.config.productionTip = false
/* 
new Vue({
  render: h => h(App),
}).$mount('#app') */



// Import Bootstrap an BootstrapVue CSS files (order is important)
import "@/scss/style.scss";

// images
import "./assets/images/logo-mckl-horizontal-white.svg";
/* 
import "@/assets/bg-blend-1.jpg";
import "@/assets/bg-blend-2.jpg";
import "@/assets/bg-blend-3.jpg";
import "@/assets/parallax-1.png";
 */

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

/* import App from "./App.vue";
import FooterBefore from "./components/FooterBefore.vue";
// import Frontpage from "./pages/Frontpage.vue";

import PostNews from "./components/PostNews.vue";
import PostEvents from "./components/PostEvents.vue";


import ProgrammeOverview from "./pages/ProgrammeOverview.vue";
import ProgrammeSingle from "./pages/ProgrammeSingle.vue";
import ProgrammeCategory from "./pages/ProgrammeCategory.vue";

 */
import ProgrammeSelection from "./components/ProgrammeSelection.vue";
import WhyMckl from "./components/WhyMckl.vue";
import PostNews from "./components/PostNews.vue";
import PostEvents from "./components/PostEvents.vue";
import ProgrammeLead from "./components/ProgrammeLead.vue";
import ProgrammeDetail from "./components/ProgrammeDetail.vue";

Vue.config.productionTip = false;


let vueApp = {
  "#programme-selection": ProgrammeSelection,
  "#why-mckl": WhyMckl,
  "#post-news": PostNews,
  "#post-events": PostEvents,
  "#programme-lead": ProgrammeLead,
  "#programme-detail": ProgrammeDetail,

  /*   "#app": App,
  "#footer-before": FooterBefore,
  // "#frontpage": Frontpage,


  "#programme_overview": ProgrammeOverview,
  "#programme_category": ProgrammeCategory,
  "#programme_single": ProgrammeSingle,

  
  "#enquiry_form": EnquiryForm */
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



