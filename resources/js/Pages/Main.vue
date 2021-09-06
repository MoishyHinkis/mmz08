<template>
  <div>
    <layout>
      <div class="lightblue">
        <div class="w3-content">
          <div>
            <img src="../../images/logo.jpg" />
          </div>
        </div>
        <div class="w3-padding w3-margin">
          BSD
          <br />
          <h3>In honor of our dear customers, hello and congratulations!</h3>
          <br />
          <h5 class="w3-text-orange">
            Thank you for choosing to publish in our newspaper
          </h5>
          <br />
          <p>
            The newspaper from the east is the neighborhood newspaper of Neve
            Ya'akov - Pisgat Ze'ev - and Neve HaPisga, which has been published
            for over 20 years, and is distributed every Saturday in 12,000
            copies in the mailboxes.
          </p>
          <br />
          <h5>
            The newspaper is acceptable to all rabbis and all circles in the
            neighborhood, without exception !!
          </h5>
          <br />
          <p>
            And enters every house in the neighborhood, for the simple reason,
            who does not read - does not know the most important things:
            messages from the community director, schools, hyder, registration
            for afternoons, distribution of basket books, health funds,
            neighborhood pool, all containers and consumers in the neighborhood,
            etc. etc. .
          </p>
          <br />
          <h5>
            The newspaper counts about 100 pages a week, and over 90% of the ads
            are ads from the neighborhood.
          </h5>
          <br />
          <h4 class="w3-text-orange">
            So if you are a want newspaper that really reads it - you have come
            to the right place.
          </h4>
          <br />
          <section>
            We will be happy to provide service
            <br />
            Mimizrah system
            <br />
            Management of "Shevach Productions"
            <a href="tel:02-5836310">02-5836310</a>
          </section>
        </div>
      </div>
    </layout>
  </div>
  
</template>

<script>
import Layout from "../Shared/Layout.vue";
export default {
  components: {
    Layout,
  },
  name: "Main",
};
</script>
<style scoped>
h3,
h4,
h5 {
  color: blue;
}
.space {
  color: rgb(236, 239, 248);
}
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 10px;
  margin-bottom: auto;
  width: 20%;
}
</style>