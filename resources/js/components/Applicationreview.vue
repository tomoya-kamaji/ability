<template>
    <!-- <div v-if="pivot.evaluation === starnumber"> -->
    <div>
        <hr color="#797979" class="m-0">
        <div class="card border-0">
            <div class="row no-gutters">
                <div class="card col-md-3" style="width: 18rem;">
                    <div class="card-body">
                        <img class="d-block mx-auto rounded-circle mt-3" src="" width="150" height="150">
                        <h5 class="card-title  text-center">{{ name }}</h5>
                        <ul style="list-style: none;">
                            <li>年齢：23歳</li>
                            <li>職業：エンジニア</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <div class="row">
                            <h3 class="card-title col-md-7 m-0">レビュータイトル</h3>
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
                                <p class = "ml-4 text-secondary">{{ pivot.content }}</p>
                        </div>
                        <div class="row">
                            <blockquote class ="mt-3 ml-3" style="border-left: 3px solid red;">
                                <p>このアプリの改善してほしいところはなんでしょうか？</p>
                            </blockquote>
                        </div>
                        <div class="row">
                                <p class = "ml-4 text-secondary">{{ pivot.content }}</p>
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
    pivot: Object,
    email: String,
    email_verified_at: String,
    created_at: String,
    updated_at: String,
    starnumber: Number,
  },

  data() {
    return {
    };
  },
  computed(){
      "pivot.evaluation === starnumber"
  }


};
</script>
