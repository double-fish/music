<template>
  <div class="upload">  
    <form action="" target="iframe">
    <span class="fileinput-button">
      <input  type="file" id="file" />
    </span>
    <button class="upbotton" type="button" @click="upload">上传音乐</button>
    </form>
     <iframe style="display: none;" id="iframe" name="iframe"></iframe>
  </div>
 
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      fileName: "",
      name:'',
      download: false
    };
  },
  methods: {
     toName(){
      this.$emit('to-name',this.name)
      console.log(this.name);
      
    },
    // 文件上传
    upload() {
      let fileData = document.getElementById("file").files[0];
      var formData = new FormData();
      formData.append("fileData", fileData);
      axios.post('http://localhost:8082/music/src/api/upload.php',formData,
      {
       'Content-Type':'multipart/form-data'
      }).then(res=>{
        console.log(res);
        this.name=res.data.fileName;
        this.toName();
        if(res.data.code==1){
             alert('上传成功');
           }else{
             alert('上传失败')
           } 
      }).catch(err=>{
        console.log(err);
        
      })
    },
   
  }
};
</script>

<style scoped>
.upload input{
    margin-left: 90px;
}
.upload button {
  width:100px;
  height: 30px;
  background: #fff;
  border: 1px solid #dcdfe6;
  color: #606266;
  border-radius: 5px;
  text-align: center;
  margin:  10px;
  outline: none;
  padding: 0 10px;
}
.upload button:hover {
  color: #409eff;
  border-color: #c6e2ff;
  background-color: #ecf5ff;
}

</style>