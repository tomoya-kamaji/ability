<template>
  <div>
    <ul class="nav nav-tabs nav-justified">
      <TabItem
        v-for="item in list"
        v-bind="item"
        :key="item.id"
        v-model="currentId"
      />
    </ul>

    <div class="tab-content border border-primary">
        <div v-show="currentId === 1">
            <h3 class="m-4">「{{ application.trackName }}」のレビュー</h3>
            <hr color="#797979" class="m-0">
            <div class="m-4">

                <div class="container">
                    <p class="text-primary">絞り込み</p>
                    <div class="row">
                        <div class="col-md-2 m-0">
                            <label style='display:block; color: #ffb917;' class ="mx-auto">
                                <input class="m-1" type="radio" v-model="checkStar" value=5>
                                ★★★★★
                            </label>
                        </div>
                        <div class="col-md-3 m-0 p-0">
                            <div style="height: 30px; width: 150px;" class="progress">
                                <div class="progress-bar progress-bar-striped" role="progressbar" :style="styles5" aria-valuenow="0" aria-valuemin="0" aria-valuemax="50"></div>
                            </div>
                        </div>
                    </div>

                    <row>
                        <label style='display:block; color: #ffb917;'><input class="m-1" type="radio" v-model="checkStar" value=4>
                            ★★★★<span style='color: #b3b2af'>★</span>
                        </label>
                    </row>


                    <label style='display:block; color: #ffb917;'><input class="m-1" type="radio" v-model="checkStar" value=3>
                        ★★★<span style='color: #b3b2af'>★★</span>
                    </label>
                    <label style='display:block; color: #ffb917;'><input class="m-1" type="radio" v-model="checkStar" value=2>
                        ★★<span style='color: #b3b2af'>★★★</span>
                    </label>
                    <label style='display:block; color: #ffb917;'><input class="m-1" type="radio" v-model="checkStar" value=1>
                        ★<span style='color: #b3b2af'>★★★★</span>
                    </label>
                </div>

                レビュー数：{{ applicationReview5.length }}
                レビュー総数：{{ applicationreviews.length }}
            </div>
            <Applicationreview
                v-for="(applicationreview,index) in filteredApplicationReviews"
                v-bind="applicationreview"
                :key="index"
                :starnumber="Number(checkStar)"
             />
            <hr color="#797979" class="m-0">
        </div>

        <div v-show="currentId === 2">
            <h3 class="m-4">「{{ application.trackName }}」の紹介</h3>

            <div class="row">
                <p class="text-secondary mt-0 mb-5 mr-5 ml-5"  style="display: -webkit-box; -webkit-line-clamp: 10; -webkit-box-orient: vertical; overflow: hidden;">{{ application.description }}</p>
            </div>

            <hr color="#797979" class="m-0">
            <h3 class="m-4">「{{ application.trackName }}」の新着情報</h3>
            <div class="row">
                <p class="text-secondary mt-0 mb-2 mr-5 ml-5"  style="display: -webkit-box; -webkit-line-clamp: 10; -webkit-box-orient: vertical; overflow: hidden;">{{ application.releaseNotes }}</p>
                <p class="text-secondary mt-0 mb-5 mr-5 ml-5">更新日：{{ application.currentVersionReleaseDate }}</p>
            </div>

            <hr color="#797979" class="m-0">
            <h3 class="m-4">「{{ application.trackName }}」の企業情報</h3>
            <div class="row mt-0 mb-2 mr-5 ml-5">
                <p class="text-secondary col-md-2">企業名</p>
                <p class="text-secondary col-md-10">{{ application.sellerName }}</p>
            </div>
            <div class="row  mt-0 mb-2 mr-5 ml-5">
                <p class="text-secondary col-md-2">リリース日</p>
                <p class="text-secondary col-md-10">{{ application.releaseDate }}</p>
            </div>
        </div>

        <div v-show="currentId === 3">
            <h1>Tab3 content</h1>
        </div>
    </div>
  </div>
</template>

<script>
import TabItem from "./TabItem.vue";
import Applicationreview from "./Applicationreview.vue";

export default {
  components: { TabItem, Applicationreview },

  props: {
    application: Object,
    applicationreviews: Array,
    user: Object,
    authorized: Boolean
  },

  data() {
    return {
        message:"text",
        checkStar: 0,
        currentId: 1,
        category_lists: [ 5, 4, 3, 2, 1],
        preview: [],		// チェックボックスでチェックしたカテゴリを格納する
        list: [
            { id: 1, label: "レビュー一覧" },
            { id: 2, label: "アプリ詳細" },
            { id: 3, label: "お気に入りユーザ" },
        ],
        returnReviewCount: [],
    };
  },
  computed: {
    filteredApplicationReviews(){
        let returnReview = [];
        for(let i in this.applicationreviews) {
            let applicationreview = this.applicationreviews[i];

            if(applicationreview.pivot.evaluation == this.checkStar) {
                returnReview.push(applicationreview);
            }
        }
        return returnReview;
    },

    applicationReview5() {
        return this.applicationreviews.filter(
            function (value) {
                return value.pivot.evaluation === 5
            }
        )
    },
    applicationReview4() {
        return this.applicationreviews.filter(
            function (value) {
                return value.pivot.evaluation === 4
            }
        )
    },
    applicationReview3() {
        return this.applicationreviews.filter(
            function (value) {
                return value.pivot.evaluation === 3
            }
        )
    },
    applicationReview2() {
        return this.applicationreviews.filter(
            function (value) {
                return value.pivot.evaluation === 2
            }
        )
    },
    applicationReview1() {
        return this.applicationreviews.filter(
            function (value) {
                return value.pivot.evaluation === 1
            }
        )
    },


    styles5(){
            // let width = this.message.length/this.applicationreviews * 100
            let width = this.applicationReview5.length / this.applicationreviews.length * 100
            return {
              "width": width + '%'
            }
    },

    current() {
      return this.list.find((el) => el.id === this.currentId) || {};
    },
  },
};
</script>
