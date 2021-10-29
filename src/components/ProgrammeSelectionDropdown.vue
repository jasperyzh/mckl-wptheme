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
        :href="`#${category.slug}`"
        class="dropdown-item"
        v-for="category in enabled_categories"
        :key="category.id"
        v-html="category.name"
      >
      </a>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  async mounted() {
    const baseUrl = window.secret.restUrl;

    // sample link - http://localhost/mckl/wp-json/wp/v2/programme?programme_category=5
    this.all_categories = await Axios.get(
      `${baseUrl}wp/v2/programme_category?per_page=5`
    );
  },
  data() {
    return {
      all_categories: null,
    };
  },
  computed: {
    enabled_categories() {
      if (this.all_categories === null) return;
      let output = this.all_categories.data;
      output = output.filter(
        (programme_category) =>
          programme_category.acf.show_category == true &&
          programme_category.count > 0
      );
      return output;
    },
  },
};
</script>