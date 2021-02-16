<template>
  <div>
    <StarRating
        :value="currentRating"
        :increment="0.5"
        :max-rating="5"
        :star-size="30">
        v-model="rating"
    </StarRating>
    <input type="hidden" name="evaluation" :value="rating">
  </div>
</template>

<script>
import StarRating from 'vue-star-rating'

export default {
  components: { StarRating },
  data() {
    return {
      rating: 0,
    };
  },


};
</script>
