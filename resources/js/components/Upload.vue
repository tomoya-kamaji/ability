<template>
<div>
    <label v-if="!value">
        <input ref="file" class="file-button" type="file" @change="upload" />
        <i class="fas fa-user-circle fa-3x"></i>
    </label>

    <div v-if="value" class="uploaded">
        <label class="upload-content-space user-photo">
            <input ref="file" class="file-button" type="file" @change="upload" />
            <img class="user-photo-image" :src="value" />
        </label>

        <button type="button" class="delete-button" @click="deleteImage">
            削除する
        </button>

        <ul v-if="fileErrorMessages.length > 0" class="error-messages">
            <li v-for="(message, index) in fileErrorMessages" :key="index">
                {{ message }}
            </li>
        </ul>
    </div>
</div>
</template>

<script>
 export default {
  props: {
    value: {
      type: String,
      default: null
    }
  },
  data() {
    return {
      file: null,
      fileErrorMessages: []
    }
  },
  methods: {
    async upload(event) {
      const files = event.target.files || event.dataTransfer.files
      const file = files[0]

      if (this.checkFile(file)) {
        const picture = await this.getBase64(file)
        this.$emit('input', picture)
      }
    },
    deleteImage() {
      this.$emit('input', null)
      this.$refs.file = null
    },
    getBase64(file) {
      return new Promise((resolve, reject) => {
        const reader = new FileReader()
        reader.readAsDataURL(file)
        reader.onload = () => resolve(reader.result)
        reader.onerror = error => reject(error)
      })
    },
    checkFile(file) {
      let result = true
      this.fileErrorMessages = []
      const SIZE_LIMIT = 5000000 // 5MB
      // キャンセルしたら処理中断
      if (!file) {
        result = false
      }
      // jpeg か png 関連ファイル以外は受付けない
      if (file.type !== 'image/jpeg' && file.type !== 'image/png') {
        this.fileErrorMessages.push('アップロードできるのは jpeg画像ファイル か png画像ファイルのみです。')
        result = false
      }
      // 上限サイズより大きければ受付けない
      if (file.size > SIZE_LIMIT) {
        this.fileErrorMessages.push('アップロードできるファイルサイズは5MBまでです。')
        result = false
      }
      return result
    }
  }
 }
 </script>

<style scoped>
    .file-button {
        display: none;
    }
</style>
