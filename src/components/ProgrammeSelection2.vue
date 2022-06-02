<template>
  <section id="programme_list" style="padding: 3rem 0">
    <div
      class="container"
      v-for="(prog_cat, index) in prog_cats"
      :id="prog_cat.slug"
      :key="prog_cat.id"
    >
      <div class="row">
        <div class="col-auto">
          <h2 class="h4 programme__title">
            <i class="bi bi-alarm-fill"></i> {{ prog_cat.name }}
            <!-- <img width="32" :src="Icons[index]" alt="" /> {{ prog_cat.name }} -->
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
// import Icon1 from "../assets/cat_icons/icon-preu.svg";
// import Icon2 from "../assets/cat_icons/icon-undergrad.svg";
// import Icon3 from "../assets/cat_icons/icon-proacc.svg";
// import Icon4 from "../assets/cat_icons/icon-prodev.svg";
// import Icon5 from "../assets/cat_icons/icon-precor.svg";

export default {
  data() {
    return {
      // icons: [Icon1, Icon2, Icon3, Icon4, Icon5],
      programmes_category: null,
      // prog_cats: null,
    };
  },
  async mounted() {
    // const Icons = [Icon1, Icon2, Icon3, Icon4, Icon5];

    const res = await fetch("https://mckl.edu.my/graphql", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        query: `
query ProgrammeQuery {
  programmeCategories(where: {orderby: TERM_ORDER, order: ASC}) {
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

    this.programmes_category = await res.json();
  },
  computed: {
    prog_cats() {
      if (this.programmes_category != null)
        return this.programmes_category.data.programmeCategories.nodes;
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
@import "bootstrap/scss/_functions.scss";
@import "../scss/style-override.scss";
@import "bootstrap/scss/_variables.scss";
@import "bootstrap/scss/_mixins.scss";
@import "bootstrap/scss/_grid.scss";
@import "bootstrap/scss/_utilities.scss";

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

