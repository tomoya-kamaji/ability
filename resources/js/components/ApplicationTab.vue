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
    <div class="tab-content border-primary">
      <div v-show="currentId === 1">

      </div>
      <div v-show="currentId === 2">
        <div class="container">
            <h3 class="m-2">{{ application.trackName }}</h3>
            <hr color="#797979" class="m-0">
            <h4 class="m-4">アプリ紹介</h4>

            <div class="row">
                <p class="text-secondary mt-0 mb-5 mr-5 ml-5"  style="display: -webkit-box; -webkit-line-clamp: 10; -webkit-box-orient: vertical; overflow: hidden;">{{ application.description }}</p>
            </div>

            <div class="row">
                <p class="text-secondary mt-0 mb-5 mr-5 ml-5"  style="display: -webkit-box; -webkit-line-clamp: 10; -webkit-box-orient: vertical; overflow: hidden;">{{ application.description }}</p>
            </div>
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
    user: Object,
    authorized: Boolean
  },

  data() {
    return {
      currentId: 2,
      list: [
        { id: 1, label: "レビュー一覧" },
        { id: 2, label: "アプリ詳細" },
        { id: 3, label: "お気に入り一覧" },
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
