<template>
  <div class="main-container">
    <toolbar></toolbar>
    <router-view> 
    </router-view>

    <app-footer></app-footer>
  </div>
</template>


<script>
import Toolbar from "./Toolbar";
import AppFooter from "./AppFooter";

export default {
  components: {
    Toolbar,
    AppFooter,
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>

<style>
.main-container {
  margin: 20px 0;
}
.login-component {
  text-align: center;
}
</style>

