<template>
  <div>
    <div class="row">
      <div class="col-md-2 d-flex align-items-center">
        <img
          :src="artworkURL512"
          class="shadow d-block mx-auto"
          width="100"
          height="100"
        />
      </div>
      <div class="col-md-3">
        <h3 class="mt-4 mb-0">{{ trackName }}</h3>
        <p>{{ artistName }}</p>
        <StarRating
            :read-only="true"
            :rating= pivot.evaluation
            :increment="0.5"
            :max-rating="5"
            :star-size="20">
        </StarRating>
      </div>
      <div class="col-md-4">
          <p class="text-secondary mt-2 mb-0">2021/02/18のレビュー</p>
          <h5 class="mb-1">{{ pivot.title }}</h5>
          <p class="text-secondary" style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">{{ pivot.good_point }}</p>
      </div>
      <div class="col-md-3">
          <button type="button" class="btn btn-primary">編集</button>
          <button type="button" class="btn btn-danger">削除</button>
      </div>
    </div>
    <hr color="#797979">
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
