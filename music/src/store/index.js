import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
const store =new Vuex.Store({
state:{
  login:'登录',
  show:true,
},
mutations:{
  changeLogin(state,username){
state.login=username;
  } ,
  isShow(state){
state.show=false;
  }
},
actions:{},
getters:{},
modules:{},
})
export default store