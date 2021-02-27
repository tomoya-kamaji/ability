<template>
  <!-- <div class="card deck col-md-10 center mx-auto"> -->
  <div class="card">
    <div class="row">
      <div class="col-md-2 d-flex align-items-center">
        <img
          :src="artworkURL512"
          class="shadow d-block mx-auto"
          width="100"
          height="100"
        />
      </div>
      <div class="col-md-2 d-flex align-items-center">
          <div class="card-body">
            <h3 class="card-title">{{ trackName }}</h3>
            <p>{{ artistName }}</p>
            <StarRating
                :read-only="true"
                :rating= pivot.evaluation
                :increment="0.5"
                :max-rating="5"
                :star-size="20">
            </StarRating>
        </div>
      </div>
      <div class="col-md-8">
          <p class="card-text">{{ pivot.title }}</p>
          <p class="card-text">{{ pivot.good_point }}</p>
          <p class="card-text">{{ pivot.improvement_point }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import ApplicationLike from "./ApplicationLike.vue";
import StarRating from 'vue-star-rating'


export default {
  components: { ApplicationLike ,StarRating},
  props: {
    id: Number,
    artistName: String,
    artworkURL512: String,
    trackName: String,
    pivot: Object,
    authorized: Boolean,
  },

  data() {
    return {
      like: Object,
    };
  },


};
</script>
