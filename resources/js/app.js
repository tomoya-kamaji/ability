import './bootstrap'
import Vue from 'vue'
import ApplicationLike from './components/ApplicationLike'
import FollowButton from './components/FollowButton'
import UserTab from './components/UserTab'
import StarRatingInput from './components/StarRatingInput'
import StarRating from 'vue-star-rating'



const app = new Vue({
  el: '#app',
  components: {
    ApplicationLike,
    FollowButton,
    UserTab,
    StarRating,
    StarRatingInput
  }
})
