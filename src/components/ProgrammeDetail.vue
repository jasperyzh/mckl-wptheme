<template>
  <section id="programme-detail" class="logo-spacing-desktop">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h1 class="font-weight-bold" v-html="content.title.rendered"></h1>
          <p class="lead" v-html="programme_category.name"></p>
          <p>
            <small>{{ acf["Approval Code"] }}</small>
          </p>

          <div
            v-if="acf['Welcome Message']"
            v-html="acf['Welcome Message']"
          ></div>

          <div class="d-flex">
            <span class="badge badge__mckl" v-if="acf['Course Mode']">{{
              acf["Course Mode"]
            }}</span>
            <span class="badge badge__mckl" v-if="acf['Course Duration']">{{
              acf["Course Duration"]
            }}</span>
          </div>

          <p class="lead mb-0">Next Intake</p>
          <h4 class="font-weight-bold">{{ acf["Intake"] }}</h4>

          <a
            class="btn btn-info"
            :href="acf['Download Brochure'].url"
            download
            v-if="acf['Download Brochure']"
            >Download Brochure</a
          >
        </div>
      </div>
    </div>
  </section>
</template>


<script>
// import WhyMckl from "@/components/WhyMckl";

export default {
  //   components: { WhyMckl },
  async mounted() {
    // this.secret = window.secret;

    try {
      let response = await this.$api.get(`programme/${window.secret.pageId}`);
      this.content = response.data;
      this.acf = response.data.acf;
      //   console.log(response.data._links['wp:term'][0].href)

      let link_programme_category = response.data._links["wp:term"][0].href;
      let response2 = await this.$api_nobaseurl.get(link_programme_category);
      this.programme_category = response2.data[0];
    } catch (err) {
      console.log(err);
    }
  },
  data() {
    return {
      //   secret: {},
      content: {},
      acf: {},
      programme_category: {},
    };
  },
};
</script>

<style lang="scss" scoped>
@use "../scss/abstract" as *;
.badge__mckl {
  background-color: $color-orange;
  margin-right: 8px;
  margin-bottom: 1rem;
}
.logo-spacing-desktop {
  @include media-breakpoint-up(md) {
    margin-top: 6rem;
  }
}
</style>