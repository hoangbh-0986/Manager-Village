<template>
  <div>
    <Banner />
    <Header />
    <SlideShow />
    <div class="flex justify-center">
      <div class="h-full flex justify-between my-10 w-10/12">
        <div class="ml-1 body-post">
          <div
            class="flex border-b-2 border-fuchsia-600 items-center justify-between mr-5 mb-5"
          >
            Trang chủ > Liên hệ
          </div>
          <div>
            <div class="leading-loose p-5">
              <p>
                TRANG THÔNG TIN ĐIỆN TỬ VĂN HÓA - DU LỊCH - LÀNG NGHỀ HÀ NỘI
              </p>
              <p>
                Chịu trách nhiệm nội dung: Ban vận động Hiệp hội văn hóa du lịch
                làng nghề Hà Nội
              </p>
              <p>Người đại diện: Bùi Huy Hoàng</p>
              <p>Sdt: 0964250559</p>
            </div>
            <div class="border borfer-indigo-600 p-5 m-5">
              <el-form
                ref="updatePersonalInfoForm"
                label-position="top"
                label-width="100px"
                :model="form"
              >
                <div class="flex flex-wrap content-between">
                  <el-form-item
                    :error="errors.name"
                    class="w-full px-1 text-white"
                    prop="name"
                  >
                    <el-input v-model="form.name" placeholder="Họ tên" />
                  </el-form-item>
                </div>
                <div class="flex flex-wrap">
                  <el-form-item
                    :error="errors.address"
                    class="w-full px-1"
                    prop="email"
                  >
                    <el-input v-model="form.address" placeholder="Email" />
                  </el-form-item>
                </div>
                <div class="flex flex-wrap">
                  <el-form-item
                    :error="errors.phone"
                    class="w-1/2 px-1"
                    prop="title"
                  >
                    <el-input v-model="form.phone" placeholder="Tiêu đề" />
                  </el-form-item>
                </div>
                <div class="flex flex-wrap">
                  <el-form-item
                    :error="errors.phone"
                    class="w-1/2 px-1"
                    prop="phone"
                  >
                    <el-input
                      v-model="form.phone"
                      placeholder="Số điện thoại"
                    />
                  </el-form-item>
                </div>
                <div class="flex flex-wrap">
                  <el-form-item class="w-full px-1" prop="note">
                    <el-input
                      v-model="form.note"
                      type="textarea"
                      :autosize="{ minRows: 2, maxRows: 4 }"
                      placeholder="Nội dung"
                    />
                  </el-form-item>
                </div>
              </el-form>

              <div class="dialog-footer flex justify-center mt-10">
                <el-button @click="cancel"> Bỏ đi </el-button>
                <el-button type="primary" @click="UpdateInfo">
                  Gửi liên hệ
                </el-button>
              </div>
            </div>
          </div>
        </div>

        <div class="mr-1 title-job">
          <h1 class="my-1 title-general mb-2">Làng nghề truyền thống</h1>
          <div
            v-for="item in jobs.slice(0, 10)"
            :key="item.id"
            class="flex border-t-2 border-b-2 border-fuchsia-600 items-center justify-between py-3"
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
import SlideShow from "@/components/SlideShowContact.vue";
import Banner from "@/components/Banner.vue";
import Header from "@/components/Header.vue";

export default {
  data() {
    return {
      dialogFormVisible: false,
      form: {},
      errors: {},
      jobs: [],
    };
  },

  mounted() {
    getJob().then((response) => (this.jobs = response.data.data));
  },
  name: "Home",
  components: {
    SlideShow,
    Banner,
    Header,
  },
};
</script>
<style scoped>
.body-post {
  flex-grow: 30;
}
.title-job {
  flex-grow: 1;
}
.title-general {
  font-size: 24px;
  color: #2f3c44;
  text-shadow: 1px 1px #cccccc;
  text-transform: uppercase;
}
.el-date-editor.el-input {
  width: 100%;
}
.el-dialog__body {
  padding: 0px 20px !important;
}
.el-form-item {
  margin-bottom: 20px;
}
</style>
