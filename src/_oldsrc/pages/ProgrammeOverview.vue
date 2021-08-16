<template>
  <div id="programme_overview">
    <section id="landing" class="mt-5 mt-md-0">
      <b-container fluid>
        <b-row>
          <b-col cols="12" md="6" lg="5" class="d-flex align-items-center">
            <div class="landing__content">
              <p class="lead text-uppercase">Kuala Lumpur Campus</p>
              <h1>Programmes Overview</h1>
              <p>
                Here at Methodist College Kuala Lumpur (MCKL), we provide the
                highest quality in education and nurture students to have strong
                core values, which we call the MCKL DNA.
              </p>
            </div>
          </b-col>
          <b-col
            cols="12"
            md="6"
            lg="7"
            class="landing__bg"
            :style="`background: url(${images.Student}) no-repeat 0 30% / cover; min-height: 500px`"
          >
          </b-col>
        </b-row>
      </b-container>
    </section>

    <section
      id="offer"
      class="bg-blue bg-blue bg-blend bg-blend--1 py-5 text-white"
    >
      <b-container fluid="lg">
        <b-row
          class="justify-content-center justify-content-md-start text-center text-md-left"
        >
          <b-col md="8">
            <h2>Programmes Offered</h2>
            <p>
              Since 1983, MCKL has been providing holistic education to students
              from all walks of life. Our renowned professional pre-university
              and tertiary programmes are globally recognised and accredited by
              MQA.
            </p>
          </b-col>
        </b-row>
      </b-container>
    </section>

    <section id="category" class="py-5">
      <b-container>
        <b-card-group deck>
          <b-row cols="1" cols-md="2" class="justify-content-center">
            <b-col
              v-for="(item, index) in categories"
              :key="index"
              class="d-flex align-items-stretch"
            >
              <b-card
                deck
                no-body
                text-variant="white"
                class="mb-4 rounded-0 card__programme"
              >
                <!-- 
                   
                img-width="300"
                img-height="300"
              :img-src="item.img_src"
                :img-alt="item.title" -->
                <a class="text-white" :href="`${secret.siteUrl}${item.link}`">
                  <!-- <figure class="ratio--16x9">
                    <b-card-img
                      src="https://picsum.photos/300/300/?image=41"
                      alt="Image"
                      class="rounded-0"
                      top
                    ></b-card-img>
                  </figure> -->
                  <!-- :style="`background: url(${images.McklParanoma}) no-repeat 0 30% / cover`" -->

                  <b-card-body
                    class="card__programme-body"
                    :style="`background-image: url(${item.img_src})`"
                  >
                    <b-card-title>{{ item.title }}</b-card-title>
                    <b-card-text>
                      {{ item.content }}
                    </b-card-text>
                  </b-card-body>
                </a>
              </b-card>
            </b-col>
          </b-row>
        </b-card-group>
      </b-container>
    </section>

    <WhyMckl />

    <CtaApply />

    <BeyondEducation />
  </div>
</template>

<script>
import Student from "@/assets/student.jpg";
import ImgProgramme1 from "@/assets/programme-1.jpg";
import ImgProgramme2 from "@/assets/programme-2.jpg";
import ImgProgramme3 from "@/assets/programme-3.jpg";
import ImgProgramme4 from "@/assets/programme-4.jpg";

import WhyMckl from "@/components/WhyMckl";
import CtaApply from "@/components/CtaApply";
import BeyondEducation from "@/components/BeyondEducation";
export default {
  mounted() {
    this.secret = window.secret;
  },
  components: { WhyMckl, CtaApply, BeyondEducation },
  data() {
    return {
      secret: {},
      images: {
        Student,
      },
      categories: [
        {
          title: "Pre University",
          content:
            "MCKL offers pre-university courses such as A Level, AUSMAT and Professional Accounting CAT & ACCA.",
          img_src: ImgProgramme1,
          link: "/programme_category/pre-u-foundation/",
        },
        {
          title: "Tertiary Programs",
          content:
            "MCKL offers pre-university courses such as A Level, AUSMAT and Professional Accounting CAT & ACCA.",
          img_src: ImgProgramme2,
          link: "/programme_category/diploma-degree/",
        },
        {
          title: "Accounting",
          content:
            "MCKL offers pre-university courses such as A Level, AUSMAT and Professional Accounting CAT & ACCA.",
          img_src: ImgProgramme3,
          link: "/programme_category/professional-accounting",
        },
        {
          title: "Personal Development",
          content:
            "MCKL offers pre-university courses such as A Level, AUSMAT and Professional Accounting CAT & ACCA.",
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

.landing__bg {
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
}
.card__programme {
  min-height: 300px;
  a {
    text-decoration: none;
    text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.5);
  }
}
.card__programme-body {
  min-height: 300px;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;

  background-color: $orange;
  background-blend-mode: multiply;

  opacity: 0.85;
  transition: opacity 0.3s ease;
  &:hover,
  &:active {
    opacity: 1;
  }
}
</style>