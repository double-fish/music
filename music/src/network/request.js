import axios from 'axios';
import qs from 'qs';
export function request(config) {
  const instance = axios.create({
    baseURL: 'http://localhost:8082/music/src/api',
    crossDomain: true, 
    xhrFields: {
      withCredentials: true
    },
  })
  instance.interceptors.request.use(config => {
    if (config.method === "post") {
      config.data = qs.stringify(config.data);
    }
    return config
  }, err => {
    instance.interceptors.response.use(res => {
      console.log(res);
    }, err => {
      console.log(err);
    })
  })
  return instance(config)
}

