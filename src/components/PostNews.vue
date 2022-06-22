<template>
  <section id="post-news">
    <div class="container-lg">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4">
        <div
          class="col px-2 mb-3"
          v-for="(item, index) in content"
          :key="`card-news-${index}`"
        >
          <card-article :item="item"></card-article>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import CardArticle from "./general/CardArticle.vue";

export default {
  components: { CardArticle },
  async mounted() {
    const get_site_url =
      window.secret.siteUrl != "http://localhost/mckl"
        ? window.secret.siteUrl
        : "https://mckl.edu.my";

    const category_name = "news";

    try {
      const res = await fetch(`${get_site_url}/graphql`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          query: `
query GetPosts($categoryName: String = "${category_name}") {
  posts(
    where: {categoryName: $categoryName, orderby: {field: DATE, order: DESC}}
    first: 4
  ) {
    nodes {
      id
      link
      title
      excerpt
      featuredImage {
        node {
          mediaItemUrl
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
        let content = this.response.data.posts.nodes;

        content.forEach((item, index) => {
          content[index].featuredImage =
            content[index].featuredImage.node.mediaItemUrl;
        });

        return content;
        /* // replace
        content.featuredImage = content.featuredImage.node.mediaItemUrl;
        // merge
        Object.assign(content, content.programme);
        delete content.programme;
        // replace
        content.downloadBrochure = content.downloadBrochure.mediaItemUrl;
        content.programmeCategories =
          content.programmeCategories.edges[0].node.name;
        return content; */
      } else {
        return null;
      }
    },
  },
};
</script>