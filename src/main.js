import "bootstrap/dist/js/bootstrap.bundle";

import "./scss/style.scss";

import { tns } from "tiny-slider/src/tiny-slider";

class SiteHeader {
  constructor(siteHeader, slimStartingFrom = 100) {
    this.siteHeader = document.querySelector(siteHeader);
    this.slimStartingFrom = slimStartingFrom;
    this.events();
  }
  events() {
    document.addEventListener("DOMContentLoaded", () => {
      this.addSlimClassToHeader(this.siteHeader);
    });

    document.addEventListener("scroll", () => {
      this.addSlimClassToHeader(this.siteHeader);
    });
  }
  addSlimClassToHeader(element) {
    let scrollTop = document.scrollingElement.scrollTop;
    if (scrollTop > this.slimStartingFrom) {
      element.classList.add("slim");
    } else {
      element.classList.remove("slim");
    }
  }
}

import Vue from "vue";
// Vue.config.productionTip = false;

// import AboutTimeline from "./components/AboutTimeline.vue";
import ProgrammeDetail from "./components/ProgrammeDetail.vue";
import ProgrammeDetail2 from "./components/ProgrammeDetail2.vue";
import ProgrammeLead from "./components/ProgrammeLead.vue";
import ProgrammesList from "./components/ProgrammesList.vue";
import ProgrammesDropdown from "./components/ProgrammesDropdown.vue";
import PostNews from "./components/PostNews.vue";
import PostEvents from "./components/PostEvents.vue";
import NavCampusDropdown from "./components/NavCampusDropdown.vue";
import WhyMckl from "./components/WhyMckl.vue";

let vueApp = {
  /**
   * https://mckl.edu.my/about-mckl
   */
  // "#content-timeline": AboutTimeline, // 220623 - not activated

  /**
   * https://mckl.edu.my/programme/*
   */
  "#programme-detail": ProgrammeDetail,
  "#programme-detail2": ProgrammeDetail2, // new layout -> php instead
  "#programme-lead": ProgrammeLead,

  /**
   * https://mckl.edu.my/programmes
   */
  "#programmes_list": ProgrammesList,
  "#programmes_dropdown": ProgrammesDropdown,

  /**
   * https://mckl.edu.my/
   */
  "#campus-dropdown": NavCampusDropdown,
  "#post-events": PostEvents,
  "#post-news": PostNews,

  /**
   * https://mckl.edu.my/programmes/
   * https://mckl.edu.my/admission/
   */
  "#why_mckl": WhyMckl,
};

document.addEventListener("DOMContentLoaded", () => {
  // vue-init
  for (const key in vueApp) {
    if (document.querySelector(key)) {
      // console.log("vue-", key);
      new Vue({
        render: (h) => h(vueApp[key]),
      }).$mount(key);
    }
  }

  // site-header
  if (document.querySelector(".site-header")) {
    new SiteHeader(".site-header", 20);
  }

  // programmes-testimonial
  if (
    document.querySelector(
      ".elementor-section.tns-testimonial .elementor-container"
    )
  ) {
    tns({
      container: ".elementor-section.tns-testimonial .elementor-container",
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
});
