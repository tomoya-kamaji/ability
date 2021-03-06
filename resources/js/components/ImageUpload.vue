<template>
  <div id="app">
    <upload v-model="picture" />
  </div>
</template>

<script>
import Upload from './ImageaUpload.vue'
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
