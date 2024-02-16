<template>
  <main>
    <SideBar v-if="this.$route.path != '/'"></SideBar>
    <div>
      <HeaderComponent v-if="this.$route.path != '/'"></HeaderComponent>
      <router-view></router-view>
    </div>
  </main>  
</template>

<script>
import HeaderComponent from '../components/HeaderComponent.vue';
import SideBar from '../components/SideBar.vue';
export default {
    data() {
        return {};
    },
    components: { SideBar, HeaderComponent }
};
</script>

<style lang="scss" scoped>
  main{
    display: flex;
    flex-direction: row;
    div{
      width: 100%;
      display: flex;
      flex-direction: column;
    }
  }
</style>