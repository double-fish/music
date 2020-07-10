<template>
  <div class="player">
    <img class="disc autoRotate " :class="{playing:playing}" src="@/assets/img/p1.png" alt />
    <img class="disc autoRotate" :class="{playing:playing}" src="@/assets/img/disc.png" alt />
  </div>
</template>

<script>
export default {
  props:['playing'],
};
</script>

<style scoped>
.player {
      height: 100%;
      width: 100%;
position: relative;
    }
.disc{
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
}
@keyframes Rotate {
  from {
    transform: rotateZ(0);
  }
  to {
    transform: rotateZ(360deg);
  }
}
/* 旋转的类名 */
.autoRotate {
  animation-name: Rotate;
  animation-iteration-count: infinite;
  animation-play-state: paused;
  animation-timing-function: linear;
  animation-duration: 5s;
}
/* 是否正在播放 */
.playing 
{
  animation-play-state: running;
}
</style>