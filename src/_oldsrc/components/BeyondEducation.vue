<template>
  <section id="beyond-education" class="py-5">
    <b-container>
      <b-card-group deck>
        <b-card
          no-body
          v-for="(item, index) in items"
          :key="index"
          class="border-0 rounded-0 text-center"
        >
          <a :href="`${secret.siteUrl}${item.link}`">
            <b-card-img
              :src="item.img_src"
              :alt="item.title"
              class="rounded-0"
            ></b-card-img>

            <b-card-body>
              <b-card-title class="h6">{{ item.title }}</b-card-title>
            </b-card-body>
          </a>
        </b-card>
      </b-card-group>
    </b-container>
  </section>
</template>

<script>
import BeyondEducation1 from "@/assets/beyondeducation-1.jpg";
import BeyondEducation2 from "@/assets/beyondeducation-2.jpg";
import BeyondEducation3 from "@/assets/beyondeducation-3.jpg";
export default {
  mounted() {
    this.secret = window.secret;
  },
  data() {
    return {
      secret: {},
      items: [
        {
          title: "Mandatory Subjects (MPU)",
          img_src: BeyondEducation1,
          link: "/whole-person-education/mandatory-subjects",
        },
        {
          title: "Character Formation And Service Learning ",
          img_src: BeyondEducation2,
          link: "/whole-person-education/character-formation-service-learning",
        },
        {
          title: "Digital Education Unit",
          img_src: BeyondEducation3,
          link: "/whole-person-education/digital-education-unit",
        },
      ],
    };
  },
};
</script>