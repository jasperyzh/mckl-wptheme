<template>
  <div id="app">
    <!-- references -->
    <h5>references:</h5>
    <ul>
      <li v-for="(link, key) in references" :key="link">
        <a :href="link">{{ key }}</a>
      </li>
    </ul>
    <hr />

    <!-- rellax - parallax -->
    <div class="rellax" data-rellax-speed="2">
      <a href="https://github.com/dixonandmoe/rellax"
        >https://github.com/dixonandmoe/rellax</a
      >
    </div>
    <div class="rellax">I’m that default chill speed of "-2"</div>
    <div class="rellax" data-rellax-speed="7">I’m super fast!!</div>
    <div class="rellax" data-rellax-speed="-4">I’m extra slow and smooth</div>

    <!-- frontpage draft -->
    <Masthead />
  </div>
</template>

<script>
// import HelloWorld from "./components/HelloWorld.vue";
// import TestAlert from "./components/TestAlert.vue";

import Masthead from "./components/Masthead.vue";

import Rellax from "rellax";

export default {
  name: "App",
  mounted() {
    var rellax = new Rellax(".rellax", {
      speed: -2,
      center: false,
      wrapper: null,
      round: true,
      vertical: true,
      horizontal: false,
    });
    console.log(rellax);
  },
  components: {
    // HelloWorld,
    // TestAlert,
    Masthead,
  },
  data() {
    return {
      references: {
        bootstrap4:
          "https://getbootstrap.com/docs/4.6/getting-started/introduction/",
        bootstrap_icon: "https://icons.getbootstrap.com/",
        bootstrapvue: "https://bootstrap-vue.org/docs",
        rellax: "https://github.com/dixonandmoe/rellax",
        acf_to_rest_api: "https://github.com/airesvsg/acf-to-rest-api/",
      },
    };
  },
};
</script>

<style lang="scss"></style>
