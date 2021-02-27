<template>
    <div class="row">
        <div class="col-md-2">
            <ul class="nav flex-column bg-light">
            <TabItem
                v-for="item in list"
                v-bind="item"
                :key="item.id"
                v-model="currentId"
            />
            </ul>
        </div>

        <div class="col-md-10 tab-content border-primary">
        <div v-show="currentId === 1">
            <h3 class="m-4">プロフィール</h3>
            <hr color="#797979">
        </div>
        <div v-show="currentId === 2">
            <h3 class="m-4">マイレビュー</h3>
            <hr color="#797979">
            <Applications
                v-for="application in applications"
                v-bind="application"
                :key="application.id"
                :authorized="authorized"
            />
        </div>
        <div v-show="currentId === 3">
            <h3 class="m-4">ブックマーク</h3>
            <hr color="#797979">
        </div>
        <div v-show="currentId === 4">
            <h3 class="m-4">フォロー</h3>
            <hr color="#797979">
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
    applications: Array,
    user: Object,
    authorized: Boolean
  },

  data() {
    return {
      currentId: 2,
      list: [
        { id: 1, label: "プロフィール" },
        { id: 2, label: "レビューしたアプリ" },
        { id: 3, label: "ブックマーク" },
        { id: 4, label: "フォロー" },
        { id: 5, label: "フォロワー" },
      ],
    };
  },

  mounted() {
  },


  computed: {
    current() {
      //jsの機能、配列の要素を探す
      consolo.log(this.applications);
      return this.list.find((el) => el.id === this.currentId) || {};
    },
  },
};
</script>
