<template>
  <section id="programme-detail" class="programme-detail__logo-margin">
    <div class="container-fluid px-0">
      <div class="row no-gutters justify-content-center">
        <div class="col">
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
              class="btn btn-info"
              :href="content.downloadBrochure"
              download
              >Download Brochure</a
            >
          </p>
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
@import "bootstrap/scss/bootstrap-grid.scss";

.programme-detail__logo-margin {
  @include media-breakpoint-up(md) {
    margin-top: 6rem;
  }
}
</style>