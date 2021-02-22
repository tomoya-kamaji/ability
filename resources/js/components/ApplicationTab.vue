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
                <ul class="category_list">
                    <li v-for="(category,index) in category_lists" :key="index">
                        <input type="checkbox"
                            :id="category"
                            :value="category"
                            v-model="preview">
                        <label v-bind:for="category">{{ category }}</label>
                    </li>
                </ul>

                <!-- <label style='display:block;'><input class="m-1" type="checkbox" v-model="checkStar" value=5>★★★★★</label>
                <label style='display:block;'><input class="m-1" type="checkbox" v-model="checkStar" value=4>★★★★</label>
                <label style='display:block;'><input class="m-1" type="checkbox" v-model="checkStar" value=3>★★★</label>
                <label style='display:block;'><input class="m-1" type="checkbox" v-model="checkStar" value=2>★★</label>
                <label style='display:block;'><input class="m-1" type="checkbox" v-model="checkStar" value=1>★</label> -->
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
        checkStar: 0,
        currentId: 1,
        category_lists: [5,4,3,2,1],
        preview: [],		// チェックボックスでチェックしたカテゴリを格納する
        list: [
            { id: 1, label: "レビュー一覧" },
            { id: 2, label: "アプリ詳細" },
            { id: 3, label: "お気に入りユーザ" },
        ],
    };
  },
  mounted() {
  },
  computed: {
    filteredApplicationReviews: function(){
        let returnReview = [];

        if(this.checkStar )
        for(let i in this.applicationreviews) {
            let applicationreview = this.applicationreviews[i];
            if(applicationreview.pivot.evaluation == this.checkStar) {
                returnReview.push(applicationreview);
            }
        }
        return returnReview;
    },

    current() {
      return this.list.find((el) => el.id === this.currentId) || {};
    },
  },
};
</script>
