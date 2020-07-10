<template>
  <div class="wrap-top">
    <div class="top">
      <a @click="homeClick" :class="{homeactive:ishome}">首页</a>
      <a @click="loginClick" v-if="$store.state.show" :class="{homeactive:islogin}">登录</a>
      <a @click="userClick" v-else :class="{homeactive:islogin}">{{$store.state.login}}</a>
    </div>
  </div>
</template>

<script>
export default {
  data(){
return{
  ishome:true,
  islogin:false
}
  },
  methods: {
    homeClick() {
      this.$router.replace("/home");
      this.ishome=true;
      this.islogin=false;
    },
    loginClick() {
      this.$router.replace("/login");
       this.ishome=false;
       this.islogin=true
    },
    userClick() {
      this.$router.replace("/data/" + this.$store.state.login);
      this.ishome=false;
       this.islogin=true
    }
  }
};
</script>

<style scoped>
.wrap-top {
  width: 100%;
  height: 70px;
  background-color: #8da9bf;
}
.top{
  margin-left: 270px;
}
.wrap-top a {
  display: inline-block;
  width: 70px;
  height: 100%;
  color: white;
  font-size: 16px;
  line-height: 70px;
  text-align: center;
}
.wrap-top a:hover {
  background-color: #406886;
}
.homeactive{
   background-color: #406886;
}
</style>