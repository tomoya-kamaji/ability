<template>
    <!-- <div v-if="pivot.evaluation === starnumber"> -->
    <div>
        <hr color="#797979" class="m-0">
        <div class="card border-0">
            <div class="row no-gutters">
                <div class="card col-md-3" style="width: 18rem;">
                    <div class="card-body">
                        <div v-if="path !== null">
                            <img :src="path" class="d-block mx-auto rounded-circle mt-3" width="100px" height="100px">
                        </div>
                        <div v-else>
                            <i class="fas fa-user-circle fa-5x d-flex align-items-center justify-content-center"></i>
                        </div>

                        <h5 class="card-title  text-center">{{ name }}</h5>
                        <ul style="list-style: none;">
                            <li>職業：エンジニア</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="card-title col-md-7 m-0">{{ pivot.title }}</h5>
                            <p class="card-title col-md-5 m-0">投稿日：{{ created_at }}</p>
                        </div>
                        <hr color="#797979">

                        <StarRating
                            :read-only="true"
                            :rating= pivot.evaluation
                            :increment="1"
                            :max-rating="5"
                            :star-size="30">
                        </StarRating>

                        <div class="row">
                            <blockquote class ="mt-3 ml-3" style="border-left: 3px solid blue;">
                                <p>このアプリの良いところはなんでしょうか？</p>
                            </blockquote>
                        </div>
                        <div class="row">
                                <p class = "ml-4 text-secondary">{{ pivot.good_point }}</p>
                        </div>
                        <div class="row">
                            <blockquote class ="mt-3 ml-3" style="border-left: 3px solid red;">
                                <p>このアプリの改善してほしいところはなんでしょうか？</p>
                            </blockquote>
                        </div>
                        <div class="row">
                            <p class = "ml-4 text-secondary">{{ pivot.improvement_point }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from 'vue-star-rating'

export default {
  components: { StarRating },
  props: {
    id: Number,
    name: String,
    path: String,
    email: String,
    email_verified_at: String,
    created_at: String,
    updated_at: String,
    starnumber: Number,
    pivot: Object,
  },

  data() {
    return {
    };
  },
  computed:{
    //   imagelink: function () {
    //     return "/storage/profile_images/" + this.id + ".jpg"
    //   }
  }


};
</script>
