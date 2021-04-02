<template>
    <div>
        <label v-if="!user.path">
            <input ref="file" class="file-button" type="file" @change="upload" />
            <i class="fas fa-user-circle fa-7x" style="background-color: #fff;"></i>
        </label>
        <div v-if="user.path">
            <label>
                <input ref="file" class="file-button" type="file" @change="upload" />
                <img class="rounded-circle" width="100px" height="100px" :src="profileimage" />
            </label>
            <button type="button" class="btn btn-danger m-3" @click="deleteImage">
                画像削除
            </button>
            <ul v-if="fileErrorMessages.length > 0" class="error-messages">
                <li v-for="(message, index) in fileErrorMessages" :key="index">
                    {{ message }}
                </li>
            </ul>
            {{ profileimage }}
        </div>
    </div>
</template>

<script>
 export default {
  props: {
    file_path: {
      type: String,
      default: null
    },
    user: {
      type: Object,
    },
  },
  data() {
    return {
      file_name: this.user.path,
      file: null,
      fileErrorMessages: []
    }
  },

    computed: {
        profileimage: function () {
            return this.file_path + '/' + this.file_name
        }
    },

  methods: {
    async upload(event) {
      const files = event.target.files || event.dataTransfer.files
      const file = files[0]
      console.log(file.name);

      if (this.checkFile(file)) {
        // const picture = await this.getBase64(file)

        // 画像のアップロード
        const formData = new FormData()
        formData.append('file',file)
        axios.post('/api/fileupload',formData).then(response =>{});
        this.file_name = file.name;

        // this.file_path_data = '/storage/'+ file.name;
        // this.$emit('child-event', 'test')

      }
    },

    deleteImage() {
      this.$emit('input', null)
      this.$refs.file = null
    },

    // getBase64(file) {
    //   return new Promise((resolve, reject) => {
    //     const reader = new FileReader()
    //     reader.readAsDataURL(file)
    //     reader.onload = () => resolve(reader.result)
    //     reader.onerror = error => reject(error)
    //   })
    // },

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
