import './bootstrap'
import Vue from 'vue'
import ApplicationLike from './components/ApplicationLike'
import FollowButton from './components/FollowButton'


const app = new Vue({
  el: '#app',
  components: {
    ApplicationLike,
    FollowButton,
  }
})
