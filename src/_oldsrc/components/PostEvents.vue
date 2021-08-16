<template>
  <section id="post-events">
    <b-container fluid="lg">
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
                <b-card-title class="h5">Upcoming Events</b-card-title>
                <b-card-text>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem error earum perferendis fugiat
                </b-card-text>
                <a href="#">Read More ></a>
              </b-card-body>
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
