<template>
<div>
      <audio  ref='audio'  @play="play" @pause="pause" :src="url ? require(`@/${url}`) :''" class="my-audio" controls autoplay>
  </audio>
</div>

</template>

<script>
export default {
props:['url'],
data(){
return{
  isPlaying:false,

}

},
methods:{
play(){
 this.isPlaying= true;
  this.$emit('is-playing',this.isPlaying);

  
},
pause(){
this.isPlaying= false;
    this.$emit('is-playing',this.isPlaying);

},

},


}


</script>

<style scoped>

    .my-audio{
      width: 1380px;
      height: 50px;
      outline: none;
    }
    /* 旋转的动画 */


</style>