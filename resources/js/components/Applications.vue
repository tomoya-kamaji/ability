<template>
  <div class="card deck col-md-10 center mx-auto">
    <div class="row">
      <div class="col-md-4 d-flex align-items-center">
        <img
          :src="artworkURL512"
          class="d-block mx-auto"
          width="100"
          height="100"
        />
      </div>

      <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title">{{ trackName }}</h5>
            <hr color="#797979">
            <StarRating
                :read-only="true"
                :rating= pivot.evaluation
                :increment="0.5"
                :max-rating="5"
                :star-size="20">
            </StarRating>
            <p class="card-text">{{ pivot.content }}</p>
            <ApplicationLike
            :id="id"
            :authorized="authorized"
            >
            </ApplicationLike>
        </div>
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
    artworkURL512: String,
    trackName: String,
    pivot: Object,
    authorized: Boolean
  },

  data() {
    return {
      like: Object,
    };
  },


};
</script>
