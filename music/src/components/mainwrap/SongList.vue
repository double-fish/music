<template>
  <div class="song-list">
    <ul>
      <li v-for="(item,index) in musicList" :key="index" @click="change(index)" :class="{active:current===index}" >
        <a @click="playMusic(item.url)"  href="javascript:;">
          <span class="icon"><i class="iconfont">&#xe65a;</i></span>
           {{item.song}}  --  {{item.singer}}</a>
      </li>
    </ul>
  </div>
</template>

<script>
import { request } from "../../network/request";
export default {
  data() {
    return {
      musicList: [],
      current:'',
    };
  },

  created() {
    request({
      url: "/music.php"
    })
      .then(res => {
        /* console.log(res); */
        this.musicList = res.data.data;
      })
      .catch(err => {
        console.log(err);
      });
  },
  methods: {
    playMusic(url) {
this.$emit('play-music',url)
    },
    change(index){
      this.current=index
    }
  }
};
</script>

<style scoped>
.song-list {
  height: 100%;
  width: 100%;
  border-right: 1px solid rgba(0, 0, 0, 0.1);
  font-size: 16px;
  overflow-y: scroll;
}
.song-list::-webkit-scrollbar {
  display: none;
}

.song-list li {
  padding: 0 14px;
}
.song-list li a {
  display: block;
  width: 100%;
  height: 60px;
  line-height: 60px;
}
.song-list li:hover{
  background-color: rgb(181, 202, 226);
}
.song-list li a:hover, .song-list li a:active{
  color: black;
}
.icon i{
  font-size: 18px;
  margin-right: 8px;
}
.active{
  background-color: #cfdff1;
}
</style>