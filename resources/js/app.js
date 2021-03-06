import './bootstrap'
import Vue from 'vue'
import ApplicationLike from './components/ApplicationLike'
import FollowButton from './components/FollowButton'
import UserTab from './components/UserTab'
import ApplicationTab from './components/ApplicationTab'
import ImageUpload from './components/ImageUpload'
import StarRatingInput from './components/StarRatingInput'
import StarRatingAverage from './components/StarRatingAverage'
import StarRating from 'vue-star-rating'



const app = new Vue({
  el: '#app',
  components: {
    ApplicationLike,
    FollowButton,
    UserTab,
    ApplicationTab,
    ImageUpload,
    StarRating,
    StarRatingInput,
    StarRatingAverage
  }
})
