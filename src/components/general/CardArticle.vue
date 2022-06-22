<template>
  <div class="card card-article shadow h-100">
    <img :src="item.featuredImage" class="card-img" :alt="item.title" />
    <div class="card-body">
      <h5 class="card-title">{{ item.title }}</h5>
      <div class="card-text" v-html="item.excerpt"></div>
    </div>
    <div class="card-footer">
      <a :href="item.link" class="btn btn-secondary btn-sm">{{
        item.btn_label ? item.btn_label : "Read more"
      }}</a>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      default() {
        return {
          featuredImage: "https://via.placeholder.com/512x512",
          title: "Card title",
          excerpt: "Card excerpt.",
          link: "#",
          btn_label: "Read more",
        };
      },
    },
  },
  methods: {
    excerpt_max(str, max_length = 160) {
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
@import "bootstrap/scss/bootstrap.scss";

.card-article {
  border: 0;
  border-radius: 0;
  .card-img {
    aspect-ratio: 16/9;
    object-fit: cover;
    object-position: center;
    width: 100%;

    border-radius: 0;
  }
  .card-body {
    background-color: $primary;
    padding-bottom: 0;
    color: $white;
  }
  .card-title {
    color: $secondary;
    font-size: 1rem;
  }
  .card-text {
    font-size: 0.825rem;
  }
  .card-footer {
    background-color: $primary;
    border-top: 0;
    border-radius: 0;
  }

  &--horizontal {
    @include media-breakpoint-up(md) {
      display: grid;
      grid-template-columns: 2fr 3fr;
      grid-template-rows: 3fr 1fr;
      .card-img {
        grid-row: 1/3;
        height: 100%;
      }
      .card-body {
        grid-column: 2/3;
        grid-row: 1/2;

        display: flex;
        justify-content: center;
        flex-direction: column;
      }
      .card-footer {
        grid-column: 2/3;
        grid-row: 2/3;
      }
    }
  }
}
</style>