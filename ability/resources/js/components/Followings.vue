<template>
  <div>
    <div class="row">
        <div class="col-md-2">
            <div v-if="path !== null">
                <img :src="path" class="d-block mx-auto align-items-center rounded-circle mt-3" width="100px" height="100px">
            </div>
            <div v-else>
                <i class="fas fa-user-circle fa-5x d-flex align-items-center justify-content-center"></i>
            </div>
        </div>
        <div class="col-md-2">
            <h3 class="mt-4 mb-0">{{ name }}</h3>
        </div>
        <div class="col-md-6">
            <h5 class="mb-1">職業：{{ profession }}</h5>
        </div>
        <div class="col-md-2 m-3">
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
    path: String,
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
