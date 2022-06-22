<template>
  <section id="programme-detail" v-if="content">
    <div class="container-fluid px-0">
      <div class="row no-gutters justify-content-center">
        <div class="col-md-6 order-2 px-3 px-lg-5 py-2 py-md-5">
          <h1 v-html="content.title"></h1>
          <p class="lead">{{ content.programmeCategories }}</p>

          <p>
            <small>{{ content.approvalCode }}</small>
          </p>

          <div v-html="content.welcomeMessage"></div>

          <p>
            <span class="badge badge-secondary mr-1">{{
              content.courseMode
            }}</span>
            <span class="badge badge-secondary mr-1">{{
              content.courseDuration
            }}</span>
          </p>

          <p class="lead">
            Next Intake: <span class="h4">{{ content.intake }}</span>
          </p>

          <p>
            <a
              class="btn btn-secondary"
              :href="content.downloadBrochure"
              download
              >Download Brochure</a
            >
          </p>
        </div>
        <div class="col-md-6 order-1 order-md-3">
          <img
            class="programme-cover"
            :src="content.featuredImage"
            :alt="content.title"
          />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  // 220622-considering moving to PHP for SEO purposes
  async mounted() {
    const get_site_url =
      window.secret.siteUrl != "http://localhost/mckl"
        ? window.secret.siteUrl
        : "https://mckl.edu.my";

    const page_id = window.secret.pageId;

    try {
      const res = await fetch(`${get_site_url}/graphql`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          query: `
query ProgrammeDetail($id: ID = "${page_id}") {
  programme(idType: DATABASE_ID, id: $id) {
    id
    title
    slug
    excerpt
    menuOrder
    link
    featuredImage {
      node {
        mediaItemUrl
      }
    }
    programme {
      approvalCode
      intake
      courseMode
      courseDuration
      welcomeMessage
      downloadBrochure {
        mediaItemUrl
      }
    }
    programmeCategories {
      edges {
        node {
          name
        }
      }
    }
  }
}
        `,
        }),
      });

      this.response = await res.json();
    } catch (err) {
      console.log("gql-programme_detail_2", err);
    }
  },
  data() {
    return {
      response: null,
    };
  },
  computed: {
    content() {
      if (this.response != null) {
        let content = this.response.data.programme;

        // replace
        content.featuredImage = content.featuredImage.node.mediaItemUrl;
        // merge
        Object.assign(content, content.programme);
        delete content.programme;
        // replace
        content.downloadBrochure = content.downloadBrochure.mediaItemUrl;
        content.programmeCategories =
          content.programmeCategories.edges[0].node.name;
        return content;
      } else {
        return null;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.programme-cover {
  object-fit: cover;
  object-position: center;
  width: 100%;
  height: 100%;
}
</style>