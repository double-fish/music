<template>
  <div id="app">
    <wrap> 
      <router-view></router-view>
    </wrap>
  </div>
</template>
<script>
import Wrap from './components/wrap/Wrap'
export default {
  components: {
  Wrap
  }
};
</script>
<style scoped>
@import "./assets/css/base.css";
</style>
