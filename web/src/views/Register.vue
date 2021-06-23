<template>
  <div>
    <Banner />
    <Header />
    <div class="max-w-sm p-5 m-auto">
      <h2 class="mb-4 text-xl font-bold text-center">Đăng kí</h2>
      <RegisterForm class="p-5 bg-white border rounded shadow" />
    </div>
  </div>
</template>

<script>
import RegisterForm from "@/components/RegisterForm";
import Banner from "@/components/Banner.vue";
import Header from "@/components/Header.vue";

export default {
  name: "RegisterView",
  components: {
    RegisterForm,
    Banner,
    Header,
  },
};
</script>
