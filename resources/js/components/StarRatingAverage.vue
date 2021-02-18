<template>
  <div>
    <StarRating
        :rating="averageReviews"
        :increment="0.1"
        :max-rating="5"
        :star-size="30"
        :read-only="true"
    >
    </StarRating>
  </div>
</template>

<script>
import StarRating from 'vue-star-rating'

export default {
  components: { StarRating },
  props: {
    averageReviews:{
      type: Number
    },
  },

  data() {
    return {
      rating: 0,
    };
  },


};
</script>
