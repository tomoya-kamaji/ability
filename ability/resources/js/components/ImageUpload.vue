<template>
  <div id="app">
    <upload
        :file_path = file_path
        :user = user
    />
  </div>
</template>

<script>
import Upload from './Upload.vue'
export default {
    components: {
        Upload
    },
    props: {
        file_path: {
            type: String,
            default: null
        },
        user: {
            type: Object,
        }
    },
}
</script>
