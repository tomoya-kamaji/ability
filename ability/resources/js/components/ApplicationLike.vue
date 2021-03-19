<template>
    <button type="button" class="btn m-0 p-1 shadow-none">
        <i
        class="far fa-bookmark fa-lg"
        @click="clickLike"
        :class="{ 'text-danger': this.isLikedBy }"
        >
        {{ countLikes }}
        </i>
    </button>
</template>

<script>
export default {
  props: {
    initialId:{
      type: Number,
    },
    initialIsLikedBy: {
        type: Boolean,
        default: false,
    },
    initialCountLikes:{
        type: Number,
        default: 0,
    },
    authorized: {
      type: Boolean,
      default: false,
    },
    application:{
      type:Object,
    }
  },

  data() {
    return {
      id: this.initialId,
      isLikedBy: this.initialIsLikedBy,
      countLikes: this.initialCountLikes,
    };
  },

  methods: {
    clickLike() {
      if (!this.authorized) {
        alert("いいね機能はログイン中のみ使用できます");
        return;
      }
      this.isLikedBy ? this.unlike() : this.like();
    },

    async like() {
      if(this.id == 0){
        let response = await axios.post("/application/like",{
            trackName: this.application.trackName,
            trackId: this.application.trackId,
            artistName: this.application.artistName,
            artworkUrl512: this.application.artworkUrl512,
            categorys_id: null,
        });
        this.id = response.data.id;

        this.isLikedBy = true;
        this.countLikes = response.data.countLikes;
      }else{
        let response = await axios.put("/application/" + this.id +"/like");
        this.isLikedBy = true;
        this.countLikes = response.data.countLikes;
      }
    },

    async unlike() {
      const response = await axios.delete("/application/" + this.id +"/like");
      this.isLikedBy = false;
      this.countLikes = response.data.countLikes;
    },
  },

//   created() {
//     axios.get("/" + this.id + "/count").then((response) => {
//       console.log(response.data.isLiked);
//       this.isLikedBy = response.data.isLiked;
//       this.countLikes = response.data.countLikes;
//     });
//   },
};
</script>
