<template>
  <div class="example">
    <ul class="nav nav-tabs nav-justified mt-3">
      <TabItem
        v-for="item in list"
        v-bind="item"
        :key="item.id"
        v-model="currentId"
      />
    </ul>

    <div class="contents">
      <transition>
        <section class="item" :key="currentId">
          {{ current.content }}
        </section>
      </transition>
    </div>
  </div>
</template>

<script>
import TabItem from './TabItem.vue'
export default {
  components: { TabItem },
  data() {
    return {
      currentId: 1,
      list: [
        { id: 1, label: '登録アプリ', content: 'コンテンツ1' },
        { id: 2, label: '人気アプリ', content: 'コンテンツ2' },
        { id: 3, label: 'フォロー', content: 'コンテンツ3' },
        { id: 4, label: 'フォロワー', content: 'コンテンツ3' }
      ]
    }
  },
  computed: {
    current() {
      return this.list.find(el => el.id === this.currentId) || {}
    }
  }
}
</script>
