<template>
  <div id="setion-hero" class="w-100 h-40 bg-repeat flex justify-center">
    <div class="titler-header flex justify-center items-center">
      <div class="logo m-5">
        <router-link to="/">
          <img src="../assets/images/banner1.png" class="w-16 h-16" alt="" />
        </router-link>
      </div>
      <div class="slogan m-5">
        <h1 class="title-banner">
          TRANG THÔNG TIN ĐIỆN TỬ VĂN HÓA - DU LỊCH - LÀNG NGHỀ THÀNH PHỐ HÀ NỘI
        </h1>
      </div>
      <div class="contact m-5 flex flex-col">
        <div class="flex items-center mb-1">
          <img src="../assets/images/icon-hotline.png" class="h-4 mr-1" />
          <p>Hotline: 097 266 91 94</p>
        </div>
        <div class="flex justify-center items-center mt-1">
          <img src="../assets/images/icon-mail.png" class="h-4 mr-1" />
          <p>cttdt_thuongtin@hanoi.gov.vn</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
#setion-hero {
  background-image: url("../assets/images/background.png");
}
.title-banner {
  font-size: 25px;
  font-weight: 600;
  color: #0056a2;
  line-height: 35px;
}
</style>
