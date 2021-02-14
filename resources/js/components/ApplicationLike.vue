<template>
    <button type="button" class="btn m-0 p-1 shadow-none">
      <i
        class="far -heart"
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
    id:{
      type: Number,
    },
    initialCountLikes:{
      type: Number,
    },
    authorized: {
      type: Boolean,
      default: false,
    },
  },

  data() {
    return {
      isLikedBy: Boolean,
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
      const response = await axios.put("/application/" + this.id +"/like");

      this.isLikedBy = true;
      this.countLikes = response.data.countLikes;
    },
    async unlike() {
      const response = await axios.delete("/application/" + this.id +"/like");

      this.isLikedBy = false;
      this.countLikes = response.data.countLikes;
    },
  },

  created() {
    axios.get("/" + this.id + "/count").then((response) => {
      console.log(response.data.isLiked);
      this.isLikedBy = response.data.isLiked;
      this.countLikes = response.data.countLikes;

    });
  },
};
</script>
