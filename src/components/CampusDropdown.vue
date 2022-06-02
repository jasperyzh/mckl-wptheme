<template>
  <div class="dropdown site-header__dropdown">
    <button
      class="btn btn-primary btn-dropdown dropdown-toggle"
      type="button"
      id="dropdownMenuButton"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
    >
      {{ dropdownName }}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" :href="`${secret.mckl_url}/`"
        >Kuala Lumpur Campus</a
      >
      <a class="dropdown-item" :href="`${secret.mcpykett_url}/`"
        >Penang, Pykett Campus</a
      >
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.secret = window.secret;
  },
  data() {
    return {
      secret: {},
    };
  },
  computed: {
    dropdownName() {
      switch (this.secret.currentBlogId) {
        case "1":
          return "Kuala Lumpur Campus";
        case "5":
          return "Penang, Pykett Campus";
        default:
          return "Select a campus";
      }
    },
  },
};
</script>

<style lang="scss">
// @use "../scss/abstract" as *;
@import "../scss/abstract/variable";
@import "bootstrap/scss/bootstrap-grid.scss";

.btn-dropdown {
  border-radius: 0;
  border: 3px solid $color-white;
  color: $color-blue;
  background-color: $color-orange;
  padding-left: 25px;
  padding-right: 25px;
  &:hover,
  &:active {
    background-color: $color-orange;
    border: 3px solid $color-white;
  }
}
// dropdown campus
.site-header__dropdown {
  position: absolute;
  left: 210px;
  right: 0;
  top: 100px;
  opacity: 1;
  visibility: visible;
  transition: all 0.3s ease;
  .site-header.slim & {
    opacity: 0;
    visibility: hidden;
  }
  @include media-breakpoint-down(lg) {
    left: initial;
    right: 2rem;
    top: 3rem;
  }
}
</style>