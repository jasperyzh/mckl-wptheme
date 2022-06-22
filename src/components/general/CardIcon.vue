<template>
  <div class="card card__icon">
    <figure>
      <img width="120" :src="item.img_src" :alt="item.title" class="card-img" />
      <!-- :src="require(`~/assets/images${item.img_src}`)" -->
    </figure>
    <div class="card-body">
      <h5 class="card-title" v-html="item.title"></h5>
      <p class="card-text">
        {{ item.desc }}
      </p>
    </div>
  </div>
</template>

<script>
export default {
  props: ["item"],
};
</script>

<style lang="scss" scoped>
@import "bootstrap/scss/bootstrap-grid.scss";
.card__icon {
  border: 0;

  figure img {
    object-fit: contain;
    object-position: center;
    width: 100%;
    max-height: 92px;
  }
  .card-title {
    font-size: 1rem;
    display: inline-flex;
    align-items: center;
    @include media-breakpoint-up(sm) {
      min-height: 5ch;
    }
  }
  .card-body {
    padding: 0;
    color: $text-muted;
    font-size: 0.90625rem;
  }

  &--left-style {
    text-align: left;

    figure img {
      object-position: left;
    }
    .card-title {
      color: $secondary;
    }
    .card-body {
      color: $white;
    }
  }
}
</style>