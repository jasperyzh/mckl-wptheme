<template>
  <main id="programme" v-if="content.id">
    <!-- <pre>{{ content }}</pre> -->
    <!-- <pre>{{ programme_category }}</pre> -->

    <section id="welcome">
      <b-container>
        <b-row class="justify-content-center">
          <b-col lg="10">
            <h1 v-html="content.title.rendered"></h1>

            <p class="lead" v-html="programme_category.name"></p>
          </b-col>
        </b-row>

        <b-row class="justify-content-center">
          <b-col lg="9">
            <!-- <div
              v-if="content.content.rendered"
              v-html="content.content.rendered"
            ></div> -->

           <!--  <div
              v-if="acf['Welcome Message']"
              v-html="acf['Welcome Message']"
            ></div> -->

            <ul>
              <li>{{ acf["Approval Code"] }}</li>
              <li>{{ acf["Intake"] }}</li>
              <li>{{ acf["Course Mode"] }}</li>
              <li>{{ acf["Course Duration"] }}</li>
            </ul>

            <a
              class="btn btn-info"
              :href="acf['Download Brochure'].url"
              download
              v-if="acf['Download Brochure']"
              >Download</a
            >
          </b-col>
        </b-row>

        <b-row class="justify-content-center" v-if="acf['Entry Requirements']">
          <b-col>
            <b-card
              bg-variant="info"
              text-variant="white"
              header="Entry Requirements"
              class="text-center mx-auto my-4"
              style="max-width: 30rem"
            >
              <b-card-text>{{ acf["Entry Requirements"] }}</b-card-text>
            </b-card>
          </b-col>
        </b-row>
      </b-container>
    </section>

    <!-- testimonials -->
    <section id="testimonials" v-if="acf['Testimonials']['Testimonials 1']">
      <b-container>
        <b-row class="justify-content-center">
          <b-col lg="10">
            <h2>Testimonials</h2>
            <!-- <pre>{{ acf["Testimonials"] }}</pre> -->
            <div v-for="item in acf['Testimonials']" :key="item.id">
              <p>{{ item.description }}</p>
              <b-img
                :src="item.sizes.thumbnail"
                rounded="circle"
                :alt="item.title"
                v-if="item.sizes"
              ></b-img>
              <h4>{{ item.title }}</h4>
              <h5>{{ item.caption }}</h5>
            </div>
          </b-col>
        </b-row>
      </b-container>
    </section>

    <WhyMckl />
  </main>
</template>

<script>
import WhyMckl from "@/components/WhyMckl";

export default {
  components: { WhyMckl },
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
.entry-content {
  max-width: 920px;
  margin: 1rem auto;
}
</style>