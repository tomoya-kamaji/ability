<template>
  <div>
    <ul class="nav nav-tabs nav-justified mt-3">
      <TabItem
        v-for="item in list"
        v-bind="item"
        :key="item.id"
        v-model="currentId"
      />
    </ul>
    <div class="tab-content">
      <div v-show="currentId === 1">
        <Applications
          v-for="application in applications"
          v-bind="application"
          :key="application.id"
          :authorized="authorized"
        />
      </div>
      <div v-show="currentId === 2">
        <h1>{{ applications[0] }}</h1>
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
    applications: Array,
    user: Object,
    authorized: Boolean
  },

  data() {
    return {
      currentId: 1,
      list: [
        { id: 1, label: "登録アプリ" },
        { id: 2, label: "人気アプリ" },
        { id: 3, label: "フォロー" },
        { id: 4, label: "フォロワー" },
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
