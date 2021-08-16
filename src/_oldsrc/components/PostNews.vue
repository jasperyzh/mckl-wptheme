<template>
  <section id="post-news">
    <b-container fluid="lg">
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

              <div class="date text-centezr">
                10<span class="date__month d-block">APR</span>
              </div>
            </b-card>
          </b-card-group>
        </b-col>
      </b-row>
    </b-container>
  </section>
</template>



<script>
import McklParanoma from "@/assets/mckl-paranoma.jpg";
// import FrontpageIntro from "@/assets/frontpage-intro.jpg";
import FrontpageIntro from "@/assets/50501239-group-of-students-sharing-with-the-ideas-on-the-campus-lawn.jpg";

// import ImgProgramme1 from "@/assets/programme-1.jpg";
// import ImgProgramme2 from "@/assets/programme-2.jpg";
// import ImgProgramme3 from "@/assets/programme-3.jpg";
// import ImgProgramme4 from "@/assets/programme-4.jpg";
import FeaturedPlaceholder from "@/assets/featured-placeholder.jpg";
import FeaturedPlaceholder2 from "@/assets/featured-placeholder2.jpg";

// import WhyMckl from "@/components/WhyMckl";
// import CtaApply from "@/components/CtaApply";
export default {
  data() {
    return {
      secret: {},
      images: {
        FrontpageIntro,
        McklParanoma,
        FeaturedPlaceholder,
        FeaturedPlaceholder2,
      },
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