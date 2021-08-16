<template>
  <div v-if="data.id">
    <section id="masthead" class="masthead jumbotron px-0 m-0">
      <div class="container-fluid">
        <div class="row px-0">
          <div
            class="col-md-4 masthead__content"
            v-html="data.acf.masthead_content"
          >
            <!-- <h1 class="display-3">Welcome to MCKL!</h1>
            <p>
              This is a template for a simple marketing or informational
              website. It includes a large callout called a jumbotron and three
              supporting pieces of content. Use it as a starting point to create
              something more unique.
            </p>
            <p>
              <a class="btn btn-light btn-lg" href="#" role="button"
                >Learn more »</a
              >
            </p> -->
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
import Axios from "axios";

export default {
  async mounted() {
    console.log(window.secret);

    let res = await Axios.get("http://localhost/mckl/wp-json/wp/v2/pages/8");
    // console.log(res.data);
    this.data = res.data;

    console.log(this.data);
    // http://localhost/mckl/wp-json/wp/v2/pages/8
  },
  data() {
    return {
      data: {},
    };
  },
};
</script>
<style>
.bgcolor--blue {
  background-color: navy;
}
</style>

<style scoped>
.card--no-default {
  background-color: transparent;
  border: 0;
}
.masthead__content {
  background-color: navy;
  color: #fff;
}
.mission {
  border-bottom-right-radius: 5rem;
}

/* .news {
    background-color: #fff;
    border: 1px solid #aaa;
} */
.news-header__img {
  border-bottom-right-radius: 5rem;
}
</style>