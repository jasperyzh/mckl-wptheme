<template>
  <div id="frontpage">
    <section
      id="frontpage-landing"
      class="bg-blend bg-blend--blue text-white"
      :style="`background: url(${images.McklParanoma}) no-repeat 0 30% / cover`"
    >
      <b-container fluid="lg">
        <b-row class="frontpage-landing__row">
          <b-col cols="12" md="6" lg="5" class="d-flex align-items-center">
            <div class="landing__content">
              <p class="lead text-uppercase">Kuala Lumpur Campus</p>
              <h1>Ignite your Mission</h1>
              <p>
                We are committed to providing an excellent education purposely
                designed to inspire a pursuit of learning, loving and leading
                from the heart.
              </p>
            </div>
          </b-col>
        </b-row>
      </b-container>
    </section>

    <section id="frontpage-quick-link">
      <b-container fluid="lg">
        <b-row>
          <b-col cols="12" lg="6">
            <b-button-group
              size="lg"
              class="frontpage__quick-link"
              :vertical="vertical"
            >
              <b-button variant="outline-light"
                >Study
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="48"
                  height="48"
                  fill="currentColor"
                  class="bi bi-arrow-right-short"
                  viewBox="0 0 16 16"
                >
                  <path
                    fill-rule="evenodd"
                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"
                  /></svg
              ></b-button>
              <b-button variant="outline-light"
                >Admission
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="48"
                  height="48"
                  fill="currentColor"
                  class="bi bi-arrow-right-short"
                  viewBox="0 0 16 16"
                >
                  <path
                    fill-rule="evenodd"
                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"
                  /></svg
              ></b-button>
            </b-button-group>
          </b-col>
        </b-row>
      </b-container>
    </section>

    <section id="intro">
      <b-container fluid="lg">
        <b-row cols="1" cols-md="2" align-v="center" class="py-5">
          <b-col>
            <h2>Welcome to Methodist College Kuala Lumpur</h2>
            <p class="lead">
              A college where values and tradition meet excellence in education
            </p>
            <p>
              For over 37 years, Methodist College Kuala Lumpur (MCKL) has been
              providing quality, holistic education in the best of Methodist
              tradition, while provide a safe environment for a purposeful
              learning experience.
            </p>
            <p>
              To meet the demands of an ever rapidly changing world, MCKL fully
              embraces the challenges and opportunities of educating and
              preparing students for further education, professional development
              and job careers.
            </p>
          </b-col>
          <b-col>
            <b-img
              :src="images.FrontpageIntro"
              fluid
              alt="Responsive image"
              class="mb-3"
            ></b-img>
            <h3>Envisioning your future</h3>
            <p>
              We are committed to providing an excellent education purposely
              designed to inspire a pursuit of learning, loving and leading from
              the heart.
            </p>
          </b-col>
        </b-row>
      </b-container>
    </section>

    <section id="news" class="bg-svg-1">
      <b-container fluid="lg">
        <b-row cols="1" align-v="center" class="py-5">
          <b-col cols="12" md="6">
            <h2>In the News</h2>
            <p>
              We are committed to providing an excellent education purposely
              designed to inspire a pursuit of learning, loving and leading from
              the heart.
            </p>
            <a href="#">View More ></a>
          </b-col>
        </b-row>
        <b-row>
          <b-col>
            <b-card-group deck>
              <b-card
                border-variant="light"
                bg-variant="primary"
                no-body
                v-for="(item, index) in 3"
                :key="index"
                class="mb-4 text-white"
              >
                <figure class="ratio--16x9">
                  <b-card-img
                    :src="images.FeaturedPlaceholder"
                    alt="Welcome to MCKL"
                    class="rounded-0"
                    top
                  ></b-card-img>
                </figure>
                <b-card-body>
                  <b-card-title class="h5">Covid Update</b-card-title>
                  <b-card-text>
                    CEO's Statement On Extension Of Conditional Movement Control
                    Order (CMCO)
                  </b-card-text>
                </b-card-body>

                <div class="date text-center">
                  10<span class="date__month d-block">APR</span>
                </div>
              </b-card>
            </b-card-group>
          </b-col>
        </b-row>
      </b-container>
    </section>

    <section id="events" class="bg-svg-1 bg-blend bg-blend--3">
      <b-container fluid="lg">
        <b-row cols="1" align-v="center" class="py-5">
          <b-col cols="12" md="6">
            <h2>Upcoming Events</h2>
            <p>
              We are committed to providing an excellent education purposely
              designed to inspire a pursuit of learning, loving and leading from
              the heart.
            </p>
            <a href="#">View More ></a>
          </b-col>
        </b-row>
        <b-row>
          <b-col>
            <b-card-group deck class="custom-breakpoint">
              <b-card
                border-variant="light"
                bg-variant="primary"
                no-body
                v-for="(item, index) in 4"
                :key="index"
                class="mb-4 text-white"
              >
                <figure class="ratio--16x9">
                  <b-card-img
                    :src="images.FeaturedPlaceholder2"
                    alt="Welcome to MCKL"
                    class="rounded-0"
                    top
                  ></b-card-img>
                </figure>
                <b-card-body>
                  <b-card-title class="h5">Covid Update</b-card-title>
                  <b-card-text>
                    CEO's Statement On Extension Of Conditional Movement Control
                    Order (CMCO)
                  </b-card-text>
                  <a href="#">Read More ></a>
                </b-card-body>
              </b-card>
            </b-card-group>
          </b-col>
        </b-row>
      </b-container>
    </section>

    <CtaApply />

    <WhyMckl />
  </div>
</template>

<script>
import McklParanoma from "@/assets/mckl-paranoma.jpg";
// import FrontpageIntro from "@/assets/frontpage-intro.jpg";
import FrontpageIntro from "@/assets/50501239-group-of-students-sharing-with-the-ideas-on-the-campus-lawn.jpg";

import ImgProgramme1 from "@/assets/programme-1.jpg";
import ImgProgramme2 from "@/assets/programme-2.jpg";
import ImgProgramme3 from "@/assets/programme-3.jpg";
import ImgProgramme4 from "@/assets/programme-4.jpg";
import FeaturedPlaceholder from "@/assets/featured-placeholder.jpg";
import FeaturedPlaceholder2 from "@/assets/featured-placeholder2.jpg";

import WhyMckl from "@/components/WhyMckl";
import CtaApply from "@/components/CtaApply";
export default {
  mounted() {
    this.secret = window.secret;

    // media query sm-md
    const mediaQuery = "(max-width: 575px)";
    const mediaQueryList = window.matchMedia(mediaQuery);
    mediaQueryList.addEventListener("change", (event) => {
      if (event.matches) {
        this.vertical = true;
      } else {
        this.vertical = false;
      }
    });
  },
  methods: {},
  components: { WhyMckl, CtaApply },
  data() {
    return {
      secret: {},
      images: {
        FrontpageIntro,
        McklParanoma,
        FeaturedPlaceholder,
        FeaturedPlaceholder2,
      },
      vertical: false,
      categories: [
        {
          title: "Pre University",
          content:
            "Some quick example text to build on the card and make up the bulk of the card's content.",
          img_src: ImgProgramme1,
          link: "/programme_category/pre-u-foundation/",
        },
        {
          title: "Tertiary Programs",
          content:
            "Some quick example text to build on the card and make up the bulk of the card's content.",
          img_src: ImgProgramme2,
          link: "/programme_category/diploma-degree/",
        },
        {
          title: "Accounting",
          content:
            "Some quick example text to build on the card and make up the bulk of the card's content.",
          img_src: ImgProgramme3,
          link: "/programme_category/professional-accounting",
        },
        {
          title: "Personal Development",
          content:
            "Some quick example text to build on the card and make up the bulk of the card's content.",
          img_src: ImgProgramme4,
          link: "/programme_category/professional-development",
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
@use "~@/scss/variable.scss" as *;
@use "~bootstrap/scss/bootstrap-grid" as *;

.frontpage__quick-link {
  margin-top: -40px;
  width: 100%;

  .btn-outline-light {
    background: #fff;
    border: 0;
    font-size: 2rem;
    font-weight: 600;
    color: $darkblue;
    padding: 1rem;
    box-shadow: 3px 3px 6px rgba(0, 0, 0, 0.2);

    &:hover,
    &:active {
      background-color: #fcaf17;
      color: #fff;
    }
  }
  &.btn-lg,
  &.btn-group-lg > .btn {
    @include media-breakpoint-down(sm) {
      min-width: auto;
    }
  }
}

.landing__bg {
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
}

.frontpage-landing__row {
  min-height: 620px;
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
}

.card-text {
  font-size: 0.8rem;
}

.card .date {
  position: absolute;
  top: 0;
  right: 0;
  background-color: $darkblue;
  padding: 0.5rem;
  font-size: 2rem;
  font-weight: bold;
  line-height: 1.1;
  &__month {
    font-size: 1rem;
  }
}
.card figure {
  margin: 0;
}
// card
.ratio--16x9 {
  aspect-ratio: 16/9;
  overflow: hidden;
  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center center;
  }
}
@supports not (aspect-ratio: 16 / 9) {
  // width: 10%;
  .ratio--16x9 {
    position: relative;
    padding-top: 56.25%;
    overflow: hidden;
    img {
      position: absolute;
      top: 0;
    }
  }
}
.custom-breakpoint {
  &.card-deck .card {
    flex: 1 0 30%;

    @include media-breakpoint-up(md) {
      flex: 1 0 0%;
    }
  }
}
</style>