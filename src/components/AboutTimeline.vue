<template>
  <section class="container timeline-container">
    <!-- <pre>https://codepen.io/Jaspery/pen/GRExBRw</pre> -->
    <article v-for="item in timeline" :key="item.year" class="timeline-block">
      <div class="timeline-img cd-picture"></div>
      <!-- timeline-img -->
      <div
        class="timeline-content timeline-content__arrow"
        data-aos="fade-up"
        data-aos-offset="200"
        data-aos-delay="50"
      >
        <!-- <h3>Title of section 3</h3> -->
        <h3 class="timeline-date">{{ item.year }}</h3>
        <p
          class="timeline-item"
          v-for="(list, index) in item.content"
          :key="`list-${index}`"
        >
          {{ list }}
        </p>
      </div>
      <!-- timeline-content -->
    </article>
  </section>
  <!-- timeline -->
</template>

<script>
import AOS from "aos";
export default {
  mounted() {
    AOS.init();
  },
  data() {
    return {
      timeline: [
        {
          year: "1929",
          content: [
            "Beginned as Methodist Afternoon School Kuala Lumpur (MAS) as a ‘School of Second Chance’",
          ],
        },
        {
          year: "1970",
          content: [
            "The school moved into the old wing of current MCKL building",
          ],
        },
        {
          year: "1974",
          content: [
            "Renamed to Methodist High School (MHS); from a ‘school of second chance’ it evolved into a ‘Private School of Choice’",
          ],
        },
        {
          year: "1983",
          content: [
            "Offered the GCE A-level programme (University of London Examination & Assessment Council, now called Edexcel, UK)",
          ],
        },
        {
          year: "1984",
          content: ["Renamed to Methodist College Kuala Lumpur (MCKL)"],
        },
        {
          year: "1991",
          content: [
            "The school population steadily increased to 552 students, paving the way to move students by one form every subsequent year into the Sentul branch campus. ",
          ],
        },
        {
          year: "2000",
          content: [
            "WACE (Western Australian Certificate of Education) Australian Matriculation programme was introduced at MCKL",
          ],
        },
        {
          year: "2001",
          content: [
            "Methodist College encompassed both campuses until 2001 when the Sentul Campus acquired its new name – Wesley Methodist School. ",
          ],
        },
        {
          year: "2003",
          content: [
            "Introduced two new courses – Certificate in English and Diploma in Early Childhood Education.",
          ],
        },
        {
          year: "2007",
          content: [
            "New MCKL logo was created in placing emphasis on the Methodist tradition of providing education. A new college motto – Veritas Vincit Omnia (Truth Conquers All) was chosen. ",
          ],
        },
        {
          year: "2008",
          content: [
            "Ground breaking Ceremony held for extension of new block ",
          ],
        },
        {
          year: "2009",
          content: [
            "Launched the Certified Accounting Technician (CAT) programme",
          ],
        },
        {
          year: "2010",
          content: [
            "Launched Cambridge International Diploma for Teaching & Learning (CIDTL) programme’",
          ],
        },
        {
          year: "2013",
          content: [
            "Converted A-level exam board from Edexcel to Cambridge International Examination (CIE). Now known as Cambridge Assessment International Education (CAIE)",
          ],
        },
        {
          year: "2014",
          content: [
            "Kicked off the American Degree Transfer Program (ADTP), and ACCA (Association of Chartered Certified Accountants) ",
          ],
        },
        {
          year: "2017",
          content: [
            "Became the first private institution in Malaysia to offer a Diploma in Social Work programme.",
          ],
        },
        {
          year: "2019",
          content: [
            "After 13.5 years of serving Ms Moey retired as CEO, passing the torch to Ms Angela Pok. ",
          ],
        },
        {
          year: "2020",
          content: [
            "Featured on Microsoft Customer Service as Microsoft’s success story for cloud computing with 96% of the campus connected on Microsoft Teams. ",
            "ACCA@MCKL programme achieved Platinum Status Approved Learning Partner (ALP), the most prestigious level of the ALP programme.",
            "Launched Foundation in Accountancy, Diploma in Computer Science & Diploma in Information Technology",
          ],
        },
        {
          year: "2021",
          content: [
            "Launched Diploma in E Commerce & Diploma in Digital Marketing ",
          ],
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
@import "@/scss/_override.scss";
@import "bootstrap/scss/bootstrap-grid.scss";
@import "aos/src/sass/aos.scss";

$color-background: #eaeaea;

.timeline-container {
  position: relative;
  padding: 2em 0;
  &:before {
    content: "";
    position: absolute;
    top: 0;
    left: 25px;
    height: 100%;
    width: 4px;
    background: $color-orange;
  }

  @include media-breakpoint-up(lg) {
    &:before {
      left: 50%;
      margin-left: -2px;
    }
  }
}

.timeline-block {
  position: relative;
  margin: 1rem 0;
  &:after {
    content: "";
    display: table;
    clear: both;
  }
}
.timeline-block .timeline-block:first-child {
  margin-top: 0;
}
.timeline-block:last-child {
  margin-bottom: 0;
}
@include media-breakpoint-up(lg) {
  // .timeline-block {
  //   margin: 4em 0;
  // }
  .timeline-block:first-child {
    margin-top: 0;
  }
  .timeline-block:last-child {
    margin-bottom: 0;
  }
}

p.timeline-item {
  margin: 0;
}

.timeline-img {
  position: absolute;
  top: 8px;
  left: 12px;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  box-shadow: 0 0 0 4px $color-orange, inset 1px 2px 5px rgba(0, 0, 0, 0.15),
    0 3px 0 4px rgba(0, 0, 0, 0.05);
}
.timeline-img {
  background: $color-orange;
}
@include media-breakpoint-up(lg) {
  .timeline-img {
    width: 30px;
    height: 30px;
    left: 50%;
    margin-left: -15px;
    margin-top: 15px;
    /* Force Hardware Acceleration in WebKit */
    // -webkit-transform: translateZ(0);
    // -webkit-backface-visibility: hidden;
  }
}

.timeline-content {
  position: relative;
  margin-left: 60px;
  margin-right: 30px;
  margin-top: 1rem;
  background: $color-background;
  border-radius: 2px;
  padding: 1em;
  &:after {
    content: "";
    display: table;
    clear: both;
  }

  @include media-breakpoint-up(lg) {
    margin-left: 0;
    padding: 1rem;
    width: 40%;
    margin: 0 5%;
    margin-top: 1rem;
  }
}

.timeline-content__arrow:before {
  content: "";
  position: absolute;
  top: 16px;
  right: 100%;
  height: 0;
  width: 0;
  border: 7px solid transparent;
  border-right: 7px solid $color-background;

  @include media-breakpoint-up(lg) {
    top: 24px;
    left: 100%;
    border-color: transparent;
    border-left-color: $color-background;
  }
}

.timeline-content .timeline-date {
  display: inline-block;
  /* @include media-breakpoint-up(lg) {
    position: absolute;
    width: 100%;
    left: 122%;
    top: 6px;
    font-size: 16px;
    font-size: 1rem;
  } */
}

@include media-breakpoint-up(lg) {
  .timeline-block:nth-child(even) .timeline-content {
    float: right;
  }
  .timeline-block:nth-child(even) .timeline-content::before {
    top: 24px;
    left: auto;
    right: 100%;
    border-color: transparent;
    border-right-color: $color-background;
  }
  .timeline-block:nth-child(even) .timeline-content .cd-read-more {
    float: right;
  }
  .timeline-block:nth-child(even) .timeline-content .timeline-date {
    left: auto;
    right: 122%;
    text-align: right;
  }
}
</style>