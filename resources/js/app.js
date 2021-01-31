import './bootstrap'
import Vue from 'vue'
import ApplicationLike from './components/ApplicationLike'
import FollowButton from './components/FollowButton'
import UserTab from './components/UserTab'


const app = new Vue({
  el: '#app',
  components: {
    ApplicationLike,
    FollowButton,
    UserTab
  }
})
