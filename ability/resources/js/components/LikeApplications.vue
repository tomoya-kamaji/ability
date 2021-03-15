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
                :rating= 3
                :increment="1"
                :max-rating="5"
                :star-size="20">
            </StarRating>
        </div>
        <div class="col-md-6">
            <p class="text-secondary mt-2 mb-0">2021/02/18</p>
            <h5 class="mb-1"></h5>
            <p class="text-secondary" style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">ここにはアプリの説明文を入れる。ここにはアプリの説明文を入れる。ここにはアプリの説明文を入れる</p>
        </div>
        <div class="col-md-2">
                <button type="button" class="btn btn-danger m-4">　　削除　　</button>
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
    trackId: Number,
    artistName: String,
    artworkURL512: String,
    trackName: String,
    created_at: String,
    updated_at: String,
    categorys_id: Number,
    authorized: Boolean,
    pivot:Object
  },

  data() {
    return {
    //   like: Object,
    };
  },


};
</script>
