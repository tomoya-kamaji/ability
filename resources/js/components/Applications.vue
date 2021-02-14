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
          <p class="card-text">{{ pivot.content }}</p>
        {{ id }}
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

export default {
  components: { ApplicationLike },
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
