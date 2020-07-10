<template>
  <div class="wrap">
    <wrap-top />
    <div class="mainwrap">
 <slot></slot>
    </div>
   
  </div>
</template>

<script>
import WrapTop from "../mainwrap/WrapTop";
export default {
  components: {
    WrapTop,
  }
};
</script>

<style scoped>
.wrap {
  width: 100%;
}
.mainwrap{
  width: 1380px;
  margin: 0 auto;
}
</style>