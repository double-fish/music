<template>
  <div class="song-img">
  <ul class="img1wrap">
    <li v-for="(item,index) in img1" :key="index">
    <a href="javascript:;"> <img :src="item"></a> 
    </li>
  </ul>
  <Lbt />
  <ul class="img2wrap">
    <li v-for="(item,index) in img2" :key="index">
      <a href="javascript:;">  <img :src="item"></a>
    </li>
  </ul>
  </div>
</template>

<script>
import Lbt from "../lbt/Lbt"
export default {
components:{
  Lbt
  },
  data(){
    return{
      img1:[
        require('@/assets/img/gedan/1.jpg'),
        require('@/assets/img/gedan/2.jpg'),
        require('@/assets/img/gedan/7.jpg'),
        require('@/assets/img/gedan/4.jpg'),
        ],
        img2:[    
         require('@/assets/img/gedan/5.jpg'),
        require('@/assets/img/gedan/6.jpg'),
        require('@/assets/img/gedan/3.jpg'),
        require('@/assets/img/gedan/8.jpg'),
        ]
    }
  }
}
</script>

<style scoped>
.song-img{
width:1380px;
height: 300px;
display: flex;
margin: 0 auto;
}
.img1wrap ,.img2wrap{
display: flex;
width:330px;
 flex-wrap: wrap;
}
.song-img li{
  text-decoration: none;
  flex-direction: row;
}
.img1wrap li img,.img2wrap li img{
  display: block;
width: 140px;
margin-left:16px;
margin-bottom: 10px;
}
</style>