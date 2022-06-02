<template>
  <div class="dropdown">
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
        v-for="category in categories"
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
    }
  }
}
        `,
      }),
    });
    this.programmes_category = await res.json();
  },
  data() {
    return {
      programmes_category: null,
      all_categories: null,
    };
  },
  computed: {
    categories() {
      if (this.programmes_category != null)
        return this.programmes_category.data.programmeCategories.nodes;
    },
  },
};
</script>