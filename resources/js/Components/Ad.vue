<template>
  <div>
    <div class="w3-container">
      <div class="w3-center">
        <h5>{{ ad.name }}</h5>
      </div>
      <div class="w3-border" 
     
      v-if="0==0">
        <img :src="require(`../../../storage/app/images/${ad.path}`).default" />
      </div>
      <div class="w3-border" v-else>
        <h6>imaeg do not exists</h6>
      </div>
      <div class="w3-center">
        <h5>{{ ad.footer }}</h5>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Ad",
  props: {
    ad: Object,
  },
};
</script>
