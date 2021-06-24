<template>
  <div>
    <Banner />
    <Header />
    <SlideShow />
    <div class="flex justify-center flex-col">
      <div class="h-full flex justify-between my-10 w-11/12">
        <div class="ml-1 body-post w-3/4 mr-5">
          <div
            class="flex border-b-2 border-fuchsia-600 items-center justify-between mr-5 mb-5"
          >
            Trang chủ > Sản Phẩm > Chi Tiết Sản Phẩm
          </div>
          <div class="flex content-between mb-10">
               <img :src="srcImage(product)" style="width: 400px;" />
                <div class="ml-10">
                    <h3> {{ product.name }} </h3>
                    <p class="border-b my-5">{{ product.craft_villages.name }}</p>
                    <p class="border-b my-5 text-red">Liên hệ tìm hiểu thêm về sản phẩm</p>
                    <p class="border-b my-5"> <span class="text-black"> Hotline: </span>{{ product.craft_villages.phone }}</p>
                    <p class="border-b my-5"> <span class="text-black"> Email:</span>{{ product.craft_villages.email }}</p>
                </div>
          </div>
          <img :src="srcImage(product)"/>

        </div>

        <div class="mr-1 title-job">
          <h1 class="my-1 title-general mb-2">Làng nghề truyền thống</h1>
          <div
            v-for="item in jobs.slice(0, 10)"
            :key="item.id"
            class="flex border-t-2 border-b-2 border-fuchsia-600 items-center justify-between py-3 cursor-pointer"
            @click="gotoPost(item)"
          >
            <p class="">{{ item.name }}</p>
            <i class="el-icon-arrow-right" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { get as getJob } from "../api/job";
import { detailProduct } from "../api/product";
import SlideShow from "@/components/SlideShowContact.vue";
import Banner from "@/components/Banner.vue";
import Header from "@/components/Header.vue";

export default {
  data() {
    return {
      dialogFormVisible: false,
      jobs: [],
      product: [],
      relatedPost: [],
    };
  },

  mounted() {
    getJob().then((response) => (this.jobs = response.data.jobs));
  },
  
  created () {
    detailProduct(this.$route.params.product_id).then((response) => (this.product = response.data));
  },

  name: "Home",
  components: {
    SlideShow,
    Banner,
    Header,
  },

  methods: {
    gotoPost(item) {
      this.$router.push({
        path: `/post/${item.id}`,
      });
    },

    srcImage(item) {
        var a =  require(`../assets/images/${item.image}`)
        
        return a
    },
  }
};
</script>
<style>
h1 {
  display: block;
  font-size: 2em;
  margin-block-start: 0.67em;
  margin-block-end: 0.67em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}
h2 {
  display: block;
  font-size: 1.5em;
  margin-block-start: 0.83em;
  margin-block-end: 0.83em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}
h3 {
  display: block;
  font-size: 1.17em;
  margin-block-start: 1em;
  margin-block-end: 1em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}
h4 {
  display: block;
  margin-block-start: 1.33em;
  margin-block-end: 1.33em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}
h5 {
  display: block;
  font-size: 0.83em;
  margin-block-start: 1.67em;
  margin-block-end: 1.67em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}
h6 {
  display: block;
  font-size: 0.67em;
  margin-block-start: 2.33em;
  margin-block-end: 2.33em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}
.title-general {
  font-size: 24px;
  color: #2f3c44;
  text-shadow: 1px 1px #cccccc;
  text-transform: uppercase;
}
.more {
  color: #2e8afe;
  font-weight: 600;
  cursor: pointer;
}

.text-black {
    font-weight: 600;
}
.text-red {
    color: #FF0000;
    font-size: 16px;
    font-weight: 600;
}
</style>
