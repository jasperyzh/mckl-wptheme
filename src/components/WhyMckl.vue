<template>
  <section id="why-mckl" class="bg-svg-1">
    <div class="container-md my-5 text-center">
      <div>
        <div>
          <h3 class="h4 my-3">Why MCKL?</h3>
        </div>
      </div>
      <div
        class="
          row row-cols-2 row-cols-md-4
          about__record
          justify-content-center
        "
      >
        <div class="col">
          <figure class="why__figure">
            <img width="150" :src="images.WhyMckl1" alt="" />
          </figure>
          <h3 class="h6">Platinum Status ACCA</h3>
          <p class="text-muted">
            The most prestigious level as Approved Learning Partner with the
            highest standards and proven record to sustain student pass rates.
          </p>
        </div>
        <div class="col">
          <figure class="why__figure">
            <img width="150" :src="images.WhyMckl2" alt="" />
          </figure>
          <h3 class="h6">Industry Revolution 4.0</h3>
          <p class="text-muted">
            Operations & learning system in line with the IR 4.0 environment.
          </p>
        </div>
        <div class="col">
          <figure class="why__figure">
            <img width="150" :src="images.WhyMckl3" alt="" />
          </figure>
          <h3 class="h6">Microsoft Recognition</h3>
          <p class="text-muted">
            Providing flexibility with 100% blended learning via Microsoft cloud
            learning system.
          </p>
        </div>
        <div class="col">
          <figure class="why__figure">
            <img width="150" :src="images.WhyMckl4" alt="" />
          </figure>
          <h3 class="h6">MCKL DNA</h3>
          <p class="text-muted">
            Nurturing students with Character Formation and Service Learning
            programmes throughout their studies.
          </p>
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
export default {
  data() {
    return {
      images: {
        WhyMckl1,
        WhyMckl2,
        WhyMckl3,
        WhyMckl4,
      },
    };
  },
};
</script>

<style scoped>
.elementor .why__figure {
  max-width: 128px;
  margin: auto !important;
  margin-bottom: 1rem;
}
</style>