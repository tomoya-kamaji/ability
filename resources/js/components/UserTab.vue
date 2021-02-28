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
            <div v-if="currentId === 1">
                <h3 class="m-4">マイレビュー</h3>
                <hr color="#797979">
                <Applications
                    v-for="application in applications"
                    v-bind="application"
                    :key="application.title"
                    :authorized="authorized"
                />
            </div>
            <div v-if="currentId === 2">
                <h3 class="m-4">ブックマーク</h3>
                <hr color="#797979">
                <!-- {{ like_applications }} -->
                <LikeApplications
                    v-for="like_application in like_applications"
                    v-bind="like_application"
                    :key="like_application.trackId"
                    :authorized="authorized"
                />
            </div>
            <div v-if="currentId === 3">
                <h3 class="m-4">フォロー</h3>
                <hr color="#797979">
                <Followings
                    v-for="following in followings"
                    v-bind="following"
                    :key="following.id"
                />

            </div>
            <div v-show="currentId === 4">
                <h3 class="m-4">フォロワー</h3>
                <hr color="#797979">
                <Followers
                    v-for="follower in followers"
                    v-bind="follower"
                    :key="follower.id"
                />

            </div>
        </div>
    </div>
</template>

<script>
import TabItem from "./TabItem.vue";
import Applications from "./Applications.vue";
import LikeApplications from "./LikeApplications.vue";
import Followings from "./Followings.vue";
import Followers from "./Followers.vue";

export default {
  components: {
      TabItem,
      Applications,
      LikeApplications,
      Followings,
      Followers
    },

  props: {
    applications: Array,
    like_applications: Array,
    followings: Array,
    followers: Array,
    user: Object,
    authorized: Boolean,
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
