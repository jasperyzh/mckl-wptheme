<template>
  <section id="why_mckl">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 text-center">
        <div
          class="col mb-3"
          v-for="(item, index) in track_record"
          :key="`why_mckl-${index}`"
        >
          <card-icon :item="item"></card-icon>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import WhyMckl1 from "@/assets/images/whymckl-1.svg";
import WhyMckl2 from "@/assets/images/whymckl-2.svg";
import WhyMckl3 from "@/assets/images/whymckl-3.svg";
import WhyMckl4 from "@/assets/images/whymckl-4.svg";

import CardIcon from "@/components/general/CardIcon.vue";

export default {
  components: { CardIcon },
  data() {
    return {
      track_record: [
        {
          img_src: WhyMckl1,
          title: "Platinum Status ACCA",
          desc: "The most prestigious level as Approved Learning Partner with the highest standards and proven record to sustain student pass rates.",
        },
        {
          img_src: WhyMckl2,
          title: "Industry Revolution 4.0",
          desc: "Operations & learning system in line with the IR 4.0 environment.",
        },
        {
          img_src: WhyMckl3,
          title: "Microsoft Recognition",
          desc: "Providing flexibility with 100% blended learning via Microsoft cloud learning system.",
        },
        {
          img_src: WhyMckl4,
          title: "MCKL DNA",
          desc: "Nurturing students with Character Formation and Service Learning programmes throughout their studies.",
        },
      ],
    };
  },
};
</script>