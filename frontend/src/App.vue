<template>
  <div>
    <Welcome title="APPMOVIES"/>
    <router-view></router-view>
  </div>
</template>

<script>
import Welcome from './components/Welcome.vue'

export default {
  name: 'App',
  components: {
    Welcome
  }
}
</script>
