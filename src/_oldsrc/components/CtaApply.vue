<template>
  <section
    id="cta-apply"
    class="cta-apply jumbotron jumbotron-fluid px-0 m-0 bg-blue bg-blend bg-blend--2 text-white text-center text-md-left"
  >
    <b-container fluid="lg">
      <b-row cols="1" cols-md="2" class="px-0">
        <b-col>
          <div class="cta-apply__content">
            <h2>Explore Your Passion With Us</h2>
            <p>
              Welcome to Methodist College Kuala Lumpur – a College where values
              and tradition meet excellence in education!
            </p>
          </div>
        </b-col>

        <b-col
          class="d-flex flex-md-column justify-content-center align-items-center"
        >
          <p>
            <a class="btn btn-light rounded-0" href="#" role="button"
              >Apply Now »</a
            >
          </p>
          <p>
            <a class="btn btn-outline-light rounded-0" href="#" role="button"
              >View Scholarship »</a
            >
          </p>
        </b-col>
      </b-row>
    </b-container>
  </section>
</template>

<script>
// export default {
//   data() {
//     return {
//     };
//   },
// };
</script>
<style lang="scss" scoped>
// @use "@/scss/variable.scss" as *;
@use "@/scss/background.scss" as *;
@use "~bootstrap/scss/bootstrap-grid" as *;

.btn {
  @include media-breakpoint-up(md) {
    min-width: 240px;
    font-size: 1.2rem;
    padding: 0.5rem;
  }
}
</style>
