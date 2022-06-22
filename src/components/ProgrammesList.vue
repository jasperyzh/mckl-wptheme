<template>
  <section id="programme_list" class="py-5">
    <div
      class="container"
      v-for="prog_cat in content"
      :id="prog_cat.slug"
      :key="prog_cat.id"
    >
      <div class="row">
        <div class="col-auto">
          <h2 class="h4 programme__title">
            {{ prog_cat.name }}
          </h2>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
        <div
          class="col mb-4"
          v-for="prog in prog_cat.programmes.nodes"
          :key="prog.id"
        >
          <a class="card--hover-highlight" :href="prog.link">
            <div class="card">
              <img
                v-if="prog.featuredImage != null"
                class="card-img"
                :src="prog.featuredImage.node.mediaItemUrl"
                :alt="prog.title"
              />
              <img
                v-else
                class="card-img"
                src="https://via.placeholder.com/512x512"
                :alt="prog.title"
              />
              <div class="card-body">
                <h3 class="card-title">{{ prog.title }}</h3>
                <div class="card-text" v-html="excerpt_max(prog.excerpt)"></div>
              </div>
              <div class="card-footer d-md-none">
                <a href="#" class="btn btn-primary btn-sm">Learn more</a>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
</template>
  
<script>
export default {
  async mounted() {
    // get site url
    const get_site_url =
      window.secret.siteUrl != "http://localhost/mckl"
        ? window.secret.siteUrl
        : "https://mckl.edu.my";

    // graphql - get programmes
    const res = await fetch(`${get_site_url}/graphql`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        query: `
query ProgrammeQuery {
  programmeCategories(where: {orderby: TERM_ORDER, order: ASC, hideEmpty: true}) {
    nodes {
      name
      slug
      id
      programmes(where: {orderby: {field: MENU_ORDER, order: ASC}}) {
        nodes {
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
        }
      }
    }
  }
}
        `,
      }),
    });

    this.response = await res.json();
  },
  data() {
    return {
      response: null,
    };
  },
  computed: {
    content() {
      if (this.response != null) {
        return this.response.data.programmeCategories.nodes;
      } else {
        return null;
      }
    },
  },
  methods: {
    excerpt_max(str, max_length = 140) {
      if (str.length > max_length) {
        str = str.substring(0, max_length) + "...";
      }
      return str;
    },
  },
};
</script>
<style lang="scss" scoped>
@import "@/scss/_override.scss";
@import "bootstrap/scss/bootstrap-grid.scss";

h2.programme__title {
  background-color: $secondary;
  padding: 0.5rem 1rem;
  margin: 1.5rem auto;
}
a.card--hover-highlight {
  .card {
    background-color: #fff;
    transition: all 0.3s ease;
  }
  &:hover .card {
    background-color: $secondary;
  }
}

.card {
  height: 100%;
  border: 0;
  border-radius: 0;
  border-bottom: 1px solid #ddd;
  margin-bottom: 1rem;
}
.card-img {
  width: 100%;
  object-fit: cover;
  border-radius: 0;
  aspect-ratio: 16/9;
  @include media-breakpoint-down(sm) {
    display: none;
  }
}
.card-title {
  font-size: 1.125rem;
  margin-bottom: 0.5rem;
}
.card-body {
  padding-left: 0.75rem;
  padding-right: 0.75rem;
  padding-bottom: 0;
}
.card-text :deep(p) {
  font-size: 0.85rem;
  margin-bottom: 0;
}
.card-footer {
  background-color: transparent;
  border: 0;
  padding-left: 0.75rem;
  padding-right: 0.75rem;
  padding-top: 0;
}
</style>

