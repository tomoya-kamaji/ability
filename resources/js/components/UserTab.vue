<template>
    <div class="row">
        <div class="col-md-2 mt-3">
            <ul class="nav flex-column shadow bg-white">
            <TabItem
                v-for="item in list"
                v-bind="item"
                :key="item.id"
                v-model="currentId"
            />
            </ul>
        </div>
        <div class="col-md-10 mt-3 tab-content shadow-sm bg-white">
            <div v-show="currentId === 1">
                <h3 class="m-4">マイレビュー</h3>
                <hr color="#797979">
                <Applications
                    v-for="application in applications"
                    v-bind="application"
                    :key="application.id"
                    :authorized="authorized"
                />
            </div>
            <div v-show="currentId === 2">
                <h3 class="m-4">ブックマーク</h3>
                <hr color="#797979">
            </div>
            <div v-show="currentId === 3">
                <h3 class="m-4">フォロー</h3>
                <hr color="#797979">
            </div>
            <div v-show="currentId === 4">
                <h3 class="m-4">フォロワー</h3>
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
      currentId: 1,
      list: [
        { id: 1, label: "マイレビュー", icon:"fas fa-comment-dots" },
        { id: 2, label: "ブックマーク" , icon:"fas fa-bookmark"},
        { id: 3, label: "フォロー" , icon:"fas fa-user-plus"},
        { id: 4, label: "フォロワー", icon:"fas fa-user-check"},
      ],
    };
  },

  mounted() {
  },


  computed: {
    current() {
      //jsの機能、配列の要素を探す
      return this.list.find((el) => el.id === this.currentId) || {};
    },
  },
};
</script>
