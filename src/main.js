import "bootstrap/dist/js/bootstrap.bundle";
import "@/scss/style.scss";

import SiteHeader from "./js/SiteHeaderSlim";
import { tns } from "tiny-slider/src/tiny-slider";

document.addEventListener('DOMContentLoaded', () => {

  // site-header
  if (document.querySelector(".site-header")) {
    new SiteHeader(".site-header", 20);
  }

  // programmes-testimonial
  if (document.querySelector('.elementor-section.tns-testimonial .elementor-container')) {
    tns({
      container: '.elementor-section.tns-testimonial .elementor-container',
      items: 1,
      slideBy: 1,
      autoplay: true,
      autoplayTimeout: 8000,
      autoplayButtonOutput: false,
      autoplayHoverPause: true,
      // loop: true,
      navPosition: "bottom",
      // mouseDrag: true,
      lazyload: true,
      controlsText: [
        `<i class="eicon-chevron-left" aria-hidden="true"></i>`,
        `<i class="eicon-chevron-right" aria-hidden="true"></i>`,
      ],
    });
  }

})

// images
import "./assets/images/logo-mckl-horizontal-white.svg";

import Vue from 'vue'
import Axios from "axios";

// // Axios installed globally
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

import ProgrammeSelection from "./components/ProgrammeSelection.vue";
import ProgrammeSelectionDropdown from "./components/ProgrammeSelectionDropdown.vue";
import WhyMckl from "./components/WhyMckl.vue";
import PostNews from "./components/PostNews.vue";
import PostEvents from "./components/PostEvents.vue";
import ProgrammeLead from "./components/ProgrammeLead.vue";
import ProgrammeDetail from "./components/ProgrammeDetail.vue";
import ContentTimeline from "./components/ContentTimeline.vue";

Vue.config.productionTip = false;

let vueApp = {
  "#programme-selection": ProgrammeSelection,
  "#programme-selection-dropdown": ProgrammeSelectionDropdown,
  "#why-mckl": WhyMckl,
  "#post-news": PostNews,
  "#post-events": PostEvents,
  "#programme-lead": ProgrammeLead,
  "#programme-detail": ProgrammeDetail,
  "#content-timeline": ContentTimeline,

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



