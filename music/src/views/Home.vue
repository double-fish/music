<template>
  <div>
    <div class="wrap-content">
      <div class="lbt-content">
        <Songimg />
      </div>
      <div class="music-content">
        <div class="song-content">
          <song-list @play-music="getUrl"></song-list>
        </div>
        <div class="plaer-content">
          <Player :playing="isPlay"></Player>
        </div>
      </div>
      <div class="music-audio">
        <Audio :url="musicUrl" @is-playing="getIsPlaying"></Audio>
      </div>
    </div>
  </div>
</template>

<script>
import SongList from "../components/mainwrap/SongList";
import Player from "../components/mainwrap/Player";
import Audio from "../components/mainwrap/Audio";
import Songimg from "../components/gedan/Songimg";
export default {
  components: {
    SongList,
    Player,
    Audio,
    Songimg
  },
  data() {
    return {
      musicUrl: "",
      isPlay: false
    };
  },
  methods: {
    getUrl(url) {
      this.musicUrl = url;
    },
    getIsPlaying(is) {
      this.isPlay = is;
    }
  }
};
</script>

<style scoped>
.lbt-content {
  width: 100%;
  height: 300px;
  border-bottom: solid 1px rgba(0, 0, 0, 0.1);
  text-align: center;
  background-color: white;
}
.wrap-content {
  position: relative;
  width: 100%;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
  background-color: white;
}

.lbt-content img {
  display: inline-block;
  width: 270px;
}
.music-content {
  display: flex;
  width: 100%;
  height: 800px;
  border-bottom: solid 1px rgba(0, 0, 0, 0.1);
}
.song-content {
  width: 250px;
  height: 100%;
}
.plaer-content {
  width: 1130px;
  height: 100%;
}
.music-audio {
  display: flex;
  width: 100%;
  height: 50px;
  background-color: #f1f3f4;
}
</style>