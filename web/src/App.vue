<template>
  <div id="app">
    <Banner />
    <Header />
    <main class="container mx-auto">
      <router-view />
    </main>
   
    <Footer />
  </div>
</template>

<script>
import Banner from "@/components/Banner.vue";
import Header from "@/components/Header.vue";
import Footer from "@/components/Footer.vue";

export default {
  name: "app",
  components: {
    Banner,
    Header,
    Footer,
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700");

.fade-enter,
.fade-leave-active {
  opacity: 0;
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}
</style>
