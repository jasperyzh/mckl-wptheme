<template>
  <section id="programme_category" v-if="content.name">
    <h1 v-html="content.name"></h1>
  </section>
</template>

<script>
export default {
  async mounted() {
    // this.secret = window.secret;

    try {
      let response = await this.$api.get(`programme_category/${window.secret.termId}`);
      this.content = response.data;
      console.log(this.content)
   
    } catch (err) {
      console.log(err);
    }
  },
  data() {
    return {
      //   secret: {},
      content: {},
    };
  },
};
</script>