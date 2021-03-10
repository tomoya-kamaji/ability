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
      <div class="col-md-2">
        <h3 class="mt-4 mb-0">{{ trackName }}</h3>
        <p>{{ artistName }}</p>
        <StarRating
            :read-only="true"
            :rating= pivot.evaluation
            :increment="1"
            :max-rating="5"
            :star-size="20">
        </StarRating>
      </div>
      <div class="col-md-6">
          <p class="text-secondary mt-2 mb-0">投稿日を入れる</p>
          <h5 class="mb-1">{{ pivot.title }}</h5>
          <p class="text-secondary" style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">{{ pivot.good_point }}</p>
      </div>
      <div class="col-md-2">
        <a :href="edit" class="btn btn-primary m-3">　　編集　　</a>
        <button type="button" class="btn btn-danger m-3">　　削除　　</button>
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
    trackId: Number,
    artistName: String,
    artworkURL512: String,
    trackName: String,
    created_at: String,
    updated_at: String,
    categorys_id: Number,
    pivot: Object,
    authorized: Boolean,
    edit_url: String,
    delete_url: String,
  },

  data() {
    return {
      like: Object,
    };
  },
  computed:{
      edit: function () {
         return this.edit_url + '/' + this.pivot.application_id 
    }
  }


};
</script>
