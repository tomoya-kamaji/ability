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
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-primary">絞り込み</p>
                            <div class="row">
                                <div class="col-md-4 m-0">
                                    <label style="display:block; color: #ffb917;" class ="mx-auto">
                                        <input class="m-1" type="radio" v-model="checkStar" value=5>
                                        <span style="letter-spacing: 0.2em;">★★★★★</span>
                                    </label>
                                </div>
                                <div class="col-md-4 m-0 p-0">
                                    <div style="height: 25px; width: 130px;" class="progress">
                                        <div class="progress-bar" role="progressbar" :style="styles5"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 m-0 p-0">
                                    {{ applicationReview5.length }}件
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 m-0">
                                    <label style="display:block; color: #ffb917;">
                                        <input class="m-1" type="radio" v-model="checkStar" value=4>
                                        <span style="letter-spacing: 0.2em;">★★★★</span><span style="letter-spacing: 0.2em; color: #b3b2af">★</span>
                                    </label>
                                </div>
                                <div class="col-md-4 m-0 p-0">
                                    <div style="height: 25px; width: 130px;" class="progress">
                                        <div class="progress-bar" role="progressbar" :style="styles4"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 m-0 p-0">
                                    {{ applicationReview4.length }}件
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 m-0">
                                    <label style="display:block; color: #ffb917;"><input class="m-1" type="radio" v-model="checkStar" value=3>
                                        <span style="letter-spacing: 0.2em;">★★★</span><span style="letter-spacing: 0.2em; color: #b3b2af">★★</span>
                                    </label>
                                </div>
                                <div class="col-md-4 m-0 p-0">
                                    <div style="height: 25px; width: 130px;" class="progress">
                                        <div class="progress-bar" role="progressbar" :style="styles3"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 m-0 p-0">
                                    {{ applicationReview3.length }}件
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 m-0">
                                    <label style="display:block; color: #ffb917;"><input class="m-1" type="radio" v-model="checkStar" value=2>
                                        <span style="letter-spacing: 0.2em;">★★</span><span style="letter-spacing: 0.2em; color: #b3b2af">★★★</span>
                                    </label>
                                </div>
                                <div class="col-md-4 m-0 p-0">
                                    <div style="height: 25px; width: 130px;" class="progress">
                                        <div class="progress-bar" role="progressbar" :style="styles2"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 m-0 p-0">
                                    {{ applicationReview2.length }}件
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 m-0">
                                    <label style="display:block; color: #ffb917;"><input class="m-1" type="radio" v-model="checkStar" value=1>
                                        <span style="letter-spacing: 0.2em;">★</span><span style="letter-spacing: 0.2em; color: #b3b2af">★★★★</span>
                                    </label>
                                </div>
                                <div class="col-md-4 m-0 p-0">
                                    <div style="height: 25px; width: 130px;" class="progress">
                                        <div class="progress-bar" role="progressbar" :style="styles1"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 m-0 p-0">
                                    {{ applicationReview1.length }}件
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <h3>レビュー総数：{{ applicationreviews.length }}件</h3>
                        </div>
                    </div>
                </div>
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
            <h3 class="m-4">「{{ application.trackName }}」の紹介</h3>

            <div class="row">
                <img class="d-block mx-auto img-thumbnail" :src= application.screenshotUrls[0] width="294" height="537">

            </div>
            <img class="d-block mx-auto img-thumbnail mt-3" :src= application.screenshotUrls[1] width="294" height="537">
            <img class="d-block mx-auto img-thumbnail mt-3" :src= application.screenshotUrls[2] width="294" height="537">
            <img class="d-block mx-auto img-thumbnail mt-3" :src= application.screenshotUrls[3] width="294" height="537">
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
        checkStar: 0,
        currentId: 3,
        category_lists: [ 5, 4, 3, 2, 1],
        preview: [],		// チェックボックスでチェックしたカテゴリを格納する
        list: [
            { id: 1, label: "レビュー" },
            { id: 2, label: "アプリ詳細" },
            { id: 3, label: "アプリ画面" },
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
              "width": width + "%",
            }
    },
    styles4(){
            // let width = this.message.length/this.applicationreviews * 100
            let width = this.applicationReview4.length / this.applicationreviews.length * 100
            return {
              "width": width + "%",
            }
    },
    styles3(){
            // let width = this.message.length/this.applicationreviews * 100
            let width = this.applicationReview3.length / this.applicationreviews.length * 100
            return {
              "width": width + "%",
            }
    },
    styles2(){
            // let width = this.message.length/this.applicationreviews * 100
            let width = this.applicationReview2.length / this.applicationreviews.length * 100
            return {
              "width": width + "%",
            }
    },
    styles1(){
            // let width = this.message.length/this.applicationreviews * 100
            let width = this.applicationReview1.length / this.applicationreviews.length * 100
            return {
              "width": width + "%",
            }
    },

    current() {
      return this.list.find((el) => el.id === this.currentId) || {};
    },
  },
};
</script>
