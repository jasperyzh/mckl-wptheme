<template>
  <div id="programme-selection-dropdown" class="dropdown">
    <button
      class="btn btn-dropdown dropdown-toggle"
      type="button"
      id="dropdown-programme"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
    >
      Choose A Programme
    </button>
    <div
      class="dropdown-menu dropdown-menu__programme"
      aria-labelledby="dropdown-programme"
    >
      <a
        v-for="category in content"
        :href="`#${category.slug}`"
        class="dropdown-item"
        :key="category.id"
        v-html="category.name"
      >
      </a>
    </div>
  </div>
</template>
<script>
export default {
  async mounted() {
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
};
</script>