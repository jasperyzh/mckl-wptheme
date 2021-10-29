<template>
  <section id="programme-selection" class="py-5">
    <div class="container-fluid">
      <div
        class="row bg__orange overflow-hidden my-5 d-none d-lg-block"
        v-for="(category, index) in enabled_categories"
        :key="category.id"
        :id="category.slug"
      >
        <article class="container" v-if="category.acf.show_category">
          <div class="row py-4 py-md-5 row__bg-white">
            <div class="col-lg-6">
              <h3 class="font-weight-bold" v-html="category.name"></h3>

              <p class="mb-4" v-html="category.description"></p>

              <ul class="list-group">
                <span v-show="loading">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="48"
                    height="48"
                    fill="#ffffff"
                    class="bi bi-arrow-repeat rotating"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"
                    />
                    <path
                      fill-rule="evenodd"
                      d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"
                    />
                  </svg>
                </span>

                <li
                  class="list-group-item"
                  v-for="programme in courses[index]"
                  :key="programme.id"
                  @mouseover="
                    currentProg[category.id] = {
                      name: programme.title.rendered,
                      desc: programme.excerpt.rendered,
                      img_src: programme.featured_media,
                    }
                  "
                  @mouseout="currentProg[category.id] = {}"
                >
                  <a :href="programme.link">
                    <span v-html="programme.title.rendered"></span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-lg-6">
              <figure class="figure__full-width object-fit-center mb-4">
                <span v-if="!category.acf.page_banner">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="48"
                    height="48"
                    fill="#ffffff"
                    class="bi bi-arrow-repeat rotating"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"
                    />
                    <path
                      fill-rule="evenodd"
                      d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"
                    />
                  </svg>
                </span>
                <img
                  v-else
                  class=""
                  :src="category.acf.page_banner.sizes.large"
                  :alt="category.acf.page_banner.alt"
                />

                <!-- <pre v-else>{{ category.acf.page_banner }}</pre> -->
              </figure>
            </div>
          </div>
        </article>
      </div>

      <!-- mobile-start -->
      <div
        class="row overflow-hidden my-5 d-lg-none"
        v-for="(category, index) in enabled_categories"
        :key="`mobile-${category.id}`"
        :id="`mobile-${category.slug}`"
      >
        <article class="container">
          <div class="row">
            <div class="col">
              <h3 class="font-weight-bold" v-html="category.name"></h3>
              <p class="mb-4" v-html="category.description"></p>
            </div>
          </div>

          <div class="row bg__orange py-4">
            <div class="col">
              <div
                v-for="programme in courses[index]"
                :key="programme.id"
                @mouseover="
                  currentProg[category.id] = {
                    name: programme.title.rendered,
                    desc: programme.excerpt.rendered,
                    img_src: programme.featured_media,
                  }
                "
                @mouseout="currentProg[category.id] = {}"
              >
                <h4
                  class="h5 font-weight-bold"
                  v-html="programme.title.rendered"
                ></h4>
                <p v-html="programme.excerpt.rendered"></p>

                <a class="btn btn__darkblue" :href="programme.link">
                  Find out more
                </a>

                <hr class="my-3" />
              </div>
            </div>
          </div>
        </article>
      </div>
      <!-- mobile-end -->
    </div>
  </section>
</template>
<script>
import Axios from "axios";

export default {
  async mounted() {
    const baseUrl = window.secret.restUrl;

    // sample link - http://localhost/mckl/wp-json/wp/v2/programme?programme_category=5
    this.all_categories = await Axios.get(
      `${baseUrl}wp/v2/programme_category?per_page=99`
    );
    // console.log(this.all_categories);

    this.all_courses = await this.get_courses(this.all_categories.data);

    console.log(this.all_courses);
    // console.log(this.all_courses);

    /*    // get programme_category
    this.programmes_category = await this.loadProgrammeCategory(baseUrl);

    // To Section
    const navLinks = document.querySelectorAll(".dropdown-menu__programme a");

    setTimeout(() => {
      Array.from(navLinks).forEach((navLink) => {
        const href = navLink.getAttribute("href");
        const section = document.querySelector(href);
        const offset = 50 + 50; // nav and offset

        navLink.onclick = (e) => {
          // get body position
          const bodyRect = document.body.getBoundingClientRect().top;
          // get section position relative
          const sectionRect = section.getBoundingClientRect().top;
          // subtract the section from body
          const sectionPosition = sectionRect - bodyRect;
          // subtract offset
          const offsetPosition = sectionPosition - offset;

          e.preventDefault();
          window.scrollTo({
            top: offsetPosition,
            behavior: "smooth",
          });
        };
      });
    }, 100); */
  },
  methods: {
    async get_courses(cats) {
      // prepare async function to Promise.all
      let loop_through_cat = [];

      // loop through cats, create async function
      cats.forEach(async (item, index) => {
        // console.log(item.count);
        if (item.count > 0) {
          loop_through_cat.push(
            (async function () {
              const cat_course = await Axios.get(
                cats[index]._links["wp:post_type"][0].href +
                  "&orderby=menu_order&order=asc"
              );
              return cat_course.data;
            })()
          );
          // loop_through_cat[index] = (async function () {
          //   const cat_course = await Axios.get(
          //     cats[index]._links["wp:post_type"][0].href +
          //       "&orderby=menu_order&order=asc"
          //   );
          //   return cat_course.data;
          // })();
        }
      });
      // console.log(loop_through_cat);

      // execute all the async function
      const res = await Promise.all(loop_through_cat);

      this.loading = false;
      return res;
    },
  },
  data() {
    return {
      loading: true,
      programmes_category: [],
      currentProg: [],
      all_categories: null,
      all_courses: {},
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
    /*   categories() {
      if (this.all_categories === null) return;
      return this.all_categories.data;
    }, */
    courses() {
      if (this.all_courses === null) return;
      return this.all_courses;
    },
  },
};
</script>
<style lang="scss" scoped>
@use "../scss/abstract" as *;

.btn.btn__darkblue {
  background-color: $color-blue;
  color: $color-white;
  border: 2px solid $color-blue;
  border-radius: 0;
  padding-left: 25px;
  padding-right: 25px;
  &:hover,
  &:active {
    border: 2px solid $color-blue;
    color: $color-blue;
    background-color: $color-white;
  }
}

.row.row__bg-white {
  position: relative;

  @include media-breakpoint-up(md) {
    &:before {
      content: "";
      position: absolute;
      top: 0;
      left: 100%;
      width: 50vw;
      height: 100%;
      background-color: #fff;
    }
  }
}

.figure__full-width {
  width: 50vw;
  aspect-ratio: 19/9;
}

.list-group-item {
  margin-bottom: 1rem;
  border: 0;
  border-radius: 0 !important;

  font-size: 1.25rem;
  font-weight: 500;

  padding-top: 0.25rem;
  padding-bottom: 0.25rem;

  position: relative;
  @include media-breakpoint-up(md) {
    &:before {
      content: "";
      position: absolute;
      top: 0;
      right: 100%;
      width: 50vw;
      height: 100%;
      background-color: #fff;
    }
  }

  a {
    font-size: 1.05rem;
    font-weight: bold;
    color: $color-blue;
  }

  &:hover,
  &:active {
    background-color: $color-blue;

    a {
      color: $color-white;
      text-decoration: none;
    }

    @include media-breakpoint-up(md) {
      &:before {
        background-color: $color-blue;
      }
    }
  }
}
@keyframes rotating {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
.rotating {
  animation: rotating 2s linear infinite;
}
</style>