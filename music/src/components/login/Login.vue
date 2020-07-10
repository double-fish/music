<template>
  <div class="login-content">
      <div class="loginWrap">
        <form>
          <div class="login">
            <div class="inp">
              <input type="text" placeholder="用户名" v-model="username" />
            </div>
            <div class="inp">
              <input type="password" placeholder="密码" v-model="password" @keyup.13="login" />
            </div>
            <div>
              <button type="button" @click="login">登录</button>
            </div>
            <label class="tips" v-if="errorFlag">{{errorMsg}}</label>
          </div>
        </form>
      </div>
    </div>
</template>

<script>
import { request } from "@/network/request";
import axios from 'axios';
import qs from 'qs';
export default {
  data() {
    return {
      username: "",
      password: "",
      errorFlag: false,
      errorMsg: ""
    };
  },

  methods: {
    login() {
      if (this.username == "" || this.password == "") {
        this.errorMsg = "请输入用户名和密码";
        this.errorFlag = true;
      } else {
        
        axios.post("http://localhost:8082/music/src/api/login.php",
          qs.stringify({
            username: this.username,
            password: this.password
          })
        )
          .then(res => {
            console.log(res);

              if (res.data.code == 1) {
                this.errorFlag = false;
                this.$store.commit("changeLogin",this.username);
                this.$store.commit("isShow");
                this.$router.replace('/data/'+this.username);
              } else {
                this.errorMsg = "账号或密码错误";
                this.password = "";
                this.errorFlag = true;
              }
          })
          .catch(err => {
            console.log(err);
          });
      }
    }
  }
};
</script>

<style scoped>
.login-content {
  position: relative;
  width: 100%;
  height: 850px;
  background: url("../../assets/img/login.jpg");
}
.loginWrap {
  width: 400px;
  height: 400px;
  position: absolute;
  background-color:#91adc2;
  border-radius: 30px;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
}
.loginWrap form {
  text-align: center;
  position: absolute;
  left: 0;
  right: 0;
  top: 100px;
  margin: auto;
}
.inp input,
.login button  {
  width: 250px;
  height: 50px;
  border-radius: 20px;
  border: 1px solid #4a6078;
  margin: 10px;
  outline: none;
  padding: 0 10px;
}
button {
  background-color: #4a6078;
  color: white;
}
button:hover {
  background-color: #142435;
  border: 1px solid #142435;
}
input::-webkit-input-placeholder {
  text-align: center;
}
.tips {
  color: #e47966;
}
</style>