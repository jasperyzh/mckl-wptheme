<template>
  <section id="footer-before" class="footer-before py-4">
    <b-container fluid="lg">
      <b-row>
        <b-col>
          <h2 class="h5 mb-4">Friends of Methodist College Kuala Lumpur</h2>
        </b-col>
      </b-row>
      <b-row>
        <b-col lg="3">
          <h3 class="h6">Church</h3>

          <ul>
            <li v-for="(item, index) in church" :key="`church-${index}`">
              <a target="_blank" :href="item.link">{{ item.name }} </a>
              <span v-show="showSeparator(index, church)"> | </span>
            </li>
          </ul>

          <h3 class="h6">Council</h3>

          <ul>
            <li v-for="(item, index) in council" :key="`council-${index}`">
              <a target="_blank" :href="item.link">{{ item.name }} </a>
              <span v-show="showSeparator(index, council)"> | </span>
            </li>
          </ul>
        </b-col>

        <b-col lg="9">
          <h3 class="h6">Conference</h3>

          <ul>
            <li
              v-for="(item, index) in conference"
              :key="`conference-${index}`"
            >
              <a target="_blank" :href="item.link">{{ item.name }} </a>
              <span v-show="showSeparator(index, conference)"> | </span>
            </li>
          </ul>

          <h3 class="h6">School and Association</h3>

          <ul>
            <li
              v-for="(item, index) in school_association"
              :key="`school_association-${index}`"
            >
              <a target="_blank" :href="item.link">{{ item.name }} </a>
              <span v-show="showSeparator(index, school_association)"> | </span>
            </li>
          </ul>
        </b-col>
      </b-row>
    </b-container>
  </section>
</template>

<script>
export default {
  methods: {
    showSeparator(index, arr) {
      if (arr.length > 2 && arr.length - 1 != index) {
        console.log(index, arr.length);
        return true;
      }
    },
  },
  data() {
    return {
      church: [
        {
          name: "The Methodist Church in Malaysia",
          link: "http://www.methodistchurch.org.my/",
        },
      ],
      council: [
        {
          name: "Methodist Council of Education",
          link: "http://mcoe.edu.my/",
        },
      ],
      conference: [
        { name: "Chinese Annual Conference", link: "http://www.methodist.org.my/" },
        { name: "Trinity Annual Conference", link: "http://www.trac.org.my/" },
        { name: "Tamil Annual Conference", link: "https://tacmethodist.org/" },
        { name: "Sarawak Chinese Annual Conference", link: "http://sarawakmethodist.org/" },
        { name: "Sarawak Iban Annual Conference", link: "http://www.methodistchurch.org.my/index.cfm?menuid=17" },
        { name: "Sabah Provisional Annual Conference", link: "http://www.sabahmethodist.org/" },
      ],
      school_association: [
        { name: "Wesley Methodist School ", link: "http://wms.edu.my/school/" },
        { name: "Seminari Theoloji Malaysia", link: "https://stm.edu.my/" },
        { name: "KL Stedfast Association", link: "https://bbmalaysia.org/front/" },
        { name: "The Boy's Brigade in Malaysia", link: "https://bbmalaysia.org/front/" },
        { name: "The Girls' Brigade in Malaysia ", link: "http://gbmalaysia.org/" },
        { name: "Teachers' Christian Fellowship", link: "http://tcfmy.org/ws/" },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
@use "~@/scss/variable.scss" as *;

.footer-before {
  background-color: $blue;
}
h2,
h3 {
  color: $lightblue;
}
ul {
  list-style-type: none;
  margin: 0;
  margin-bottom: 0.5rem;
  padding: 0;

  display: flex;
  flex-wrap: wrap;
}
li {
  a {
    font-size: 0.75rem;
    font-weight: 400;
    color: #fff;
    &:hover,
    &:active {
      color: $orange;
      text-decoration: none;
    }
  }
}
span {
  margin: 0 4px;
  color: #fff;
}
</style>