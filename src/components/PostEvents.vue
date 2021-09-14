<template>
  <section id="post-news" class="color__invert">
    <div class="container-lg">
      <div class="row row-cols-1">
        <!-- start row -->

        <div
          class="col my-2 px-lg-2"
          v-for="(item, index) in posts"
          :key="`news-${index}`"
        >
          <div class="card">
            <div class="row no-gutters flex-md-nowrap">
              <div class="col-12 col-sm-auto col-md-5 mx-auto d-flex align-items-center">
                <figure class="ratio--16x9 overflow-hidden">
                  <img
                    class="object-fit-cover"
                    :src="
                      item.featured_media_url
                        ? item.featured_media_url
                        : `${secret.siteUrl}/wp-content/uploads/2021/07/mckl-logo.jpg`
                    "
                    :alt="item.title.rendered"
                  />
                </figure>
              </div>
              <div class="col-12 col-sm-auto flex-fill mx-auto bg__blue">
                <div class="card-body">
                  <a :href="item.link">
                    <h5 class="card-title h6" v-html="item.title.rendered"></h5>
                  </a>
                  <p class="card-text small" v-html="item.excerpt.rendered"></p>
                </div>
                <footer class="card-footer">
                  <a :href="item.link" class="btn">Read More ></a>
                </footer>
              </div>
            </div>
          </div>
        </div>
        <!-- end row -->
      </div>
    </div>
  </section>
</template>



<script>
import Axios from "axios";

export default {
  async mounted() {
    this.secret = window.secret;
    const baseUrl = window.secret.restUrl;

    // get news: http://localhost/mckl/wp-json/wp/v2/categories/16 (events)
    const res = await Axios.get(
      `${baseUrl}wp/v2/posts?categories=16&per_page=4`
    );
    this.posts = res.data;
    // console.log(res.data);
  },
  data() {
    return {
      secret: {},
      posts: [],
    };
  },
};
</script>

<style lang="scss" scoped>
@use "../scss/abstract" as *;

.card {
  height: 100%;
  border: 0;
  border-radius: 0;
  box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.4);
}
.card-body {
  background-color: $color-blue;
  color: $color-white;
  padding-bottom: 0;

  .card-title {
    color: $color-orange;
    font-weight: bold;
  }
}
.card-footer {
  background-color: $color-blue;
  border: 0;
  border-radius: 0;

  .btn {
    color: $color-orange;
    font-weight: bold;
    padding: 0;
    &:hover,
    &:active {
      color: $color-white;
    }
  }
}
</style>