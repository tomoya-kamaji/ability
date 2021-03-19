<template>
  <div>
    <div class="row">
        <div class="col-md-2 d-flex align-items-center">
            画像イメー
            <!-- <img
            :src="artworkURL512"
            class="shadow d-block mx-auto"
            width="100"
            height="100"
            /> -->

        </div>
        <div class="col-md-2">
            <h3 class="mt-4 mb-0">{{ name }}</h3>
        </div>
        <div class="col-md-6">
            <h5 class="mb-1">職業：{{ profession }}</h5>
        </div>
        <div class="col-md-2 m-3">
            <!-- <button type="button" class="btn btn-danger m-4">フォロワー</button> -->
        </div>
        </div>
        <hr color="#797979">
    </div>
</template>

<script>
import StarRating from 'vue-star-rating'

export default {
  components: { StarRating },
  props: {
    id: Number,
    name: String,
    age: String,
    email: String,
    pivot: Object,
    email_verified_at: String,
    profession: String,
    created_at: String,
    updated_at: String,
  },

  data() {
    return {
    };
  },


};
</script>
