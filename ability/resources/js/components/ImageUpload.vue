<template>
  <div id="app">
    <upload v-model="picture" />
  </div>
</template>

<script>
import Upload from './Upload.vue'
export default {
    components: {
        Upload
    },
    data() {
        return {
            picture: null
        }
    }
}
</script>
