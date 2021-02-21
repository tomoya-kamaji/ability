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
            <div class="row">







            </div>
            <hr color="#797979" class="m-0">

            <div class="card border-0"> 
                <div class="row no-gutters">
                    <div class="card col-md-3" style="width: 18rem;">
                        <div class="card-body">
                            <img class="d-block mx-auto rounded-circle mt-3" src="" width="150" height="150">
                            <h5 class="card-title  text-center">{{ applicationreviews[10].name }}</h5>
                            <div class="col d-flex align-items-center justify-content-center">
                            </div>
                            <hr color="#797979">
                            <p style="display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical; overflow: hidden;"></p>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <div class="row">
                                <h3 class="card-title col-md-10 m-0">レビュータイトル</h3>
                            </div>

                            <hr color="#797979" class="m-0">

                            <div class="row">
                                <blockquote class ="mt-3 ml-3" style="border-left: 3px solid blue;">
                                    <p>このアプリの良いところはなんでしょうか？</p>
                                </blockquote>
                            </div>
                            <div class="row">
                                  <p class = "ml-4 text-secondary">{{ applicationreviews[10].pivot.content }}</p>
                            </div>
                            <div class="row">
                                <blockquote class ="mt-3 ml-3" style="border-left: 3px solid red;">
                                    <p>このアプリの改善してほしいところはなんでしょうか？</p>
                                </blockquote>
                            </div>
                            <div class="row">
                                  <p class = "ml-4 text-secondary">{{ applicationreviews[10].pivot.content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
import Applications from "./Applications.vue";

export default {
  components: { TabItem, Applications },

  props: {
    application: Object,
    applicationreviews: Array,
    user: Object,
    authorized: Boolean
  },

  data() {
    return {
      currentId: 1,
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
    current() {
      return this.list.find((el) => el.id === this.currentId) || {};
    },
  },
};
</script>
