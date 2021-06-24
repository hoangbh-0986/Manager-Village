<template>
  <div class="m-10">
    <el-form
      :model="ruleForm"
      status-icon
      :rules="rules"
      ref="ruleForm"
      label-width="120px"
      class="demo-ruleForm"
    >
      <el-form-item label="Tiêu đề" prop="title">
        <el-input v-model="ruleForm.title" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item label="Nội dung" prop="content">
        <vue-simplemde
          v-model="ruleForm.content"
          preview-class="markdown-body"
          ref="markdownEditor"
        />
      </el-form-item>
      <div class="flex ml-20">
        <el-form-item label="Làng nghề " prop="craft_village_id">
          <el-select
            v-model="ruleForm.craft_village_id"
            placeholder="Vui lòng chọn 1 làng nghề"
          >
            <el-option
              v-for="item in craftVillages"
              :key="item.id"
              :label="item.name"
              :value="item.id"
            ></el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="Nghề " prop="job_id">
          <el-select
            v-model="ruleForm.job_id"
            placeholder="Vui lòng chọn 1 nghề"
          >
            <el-option
              v-for="item in jobs"
              :key="item.id"
              :label="item.name"
              :value="item.id"
            ></el-option>
          </el-select>
        </el-form-item>

        <el-form-item label="Loại bài" prop="category_id">
          <el-select
            v-model="ruleForm.category_id"
            placeholder="Vui lòng chọn loại bài viết"
          >
            <el-option
              v-for="item in categories"
              :key="item.id"
              :label="item.name"
              :value="item.id"
            ></el-option>
          </el-select>
        </el-form-item>

        <el-form-item label="Nghệ Nhân" prop="expert_id">
          <el-select
            v-model="ruleForm.expert_id"
            placeholder="Vui lòng chọn nghệ nhân"
          >
            <el-option
              v-for="item in experts"
              :key="item.id"
              :label="item.name"
              :value="item.id"
            ></el-option>
          </el-select>
        </el-form-item>

        <el-form-item label="Hình ảnh" prop="image">
          <el-input type="file" v-model="ruleForm.image" class="form-control-file h-full" @change="onFileChange"></el-input>
        </el-form-item>
      </div>
      <el-form-item>
        <el-button type="primary" @click="submitForm('ruleForm')"
          >Tạo bài</el-button
        >
        <el-button @click="resetForm('ruleForm')">Reset</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>
<script>
import VueSimplemde from "vue-simplemde";
import { get, create } from "../api/post";
import { get as getCraftVillage } from "../api/craftVillage";
import { get as getCategory } from "../api/category";
import { get as getJob } from "../api/job";
import { get as getExpert } from "../api/expert";
export default {
  components: {
    VueSimplemde,
  },

  data() {
    return {
      craftVillages: [],
      wards: [],
      jobs: [],
      experts: [],
      ruleForm: {
        title: "",
        content: "",
      },
      rules: {
        title: [
          { required: true, message: "Tiêu đề là bắt buộc", trigger: "blur" },
        ],
        content: [
          { required: true, message: "Nội dung là bắt buộc", trigger: "blur" },
        ],
      },
    };
  },

  mounted() {
    getCraftVillage().then(
      (response) => (this.craftVillages = response.data.craftVillage)
    );
    getCategory().then((response) => (this.categories = response.data.categorys));
    getJob().then((response) => (this.jobs = response.data.jobs));
    getExpert().then((response) => (this.experts = response.data.experts));
  },

  methods: {
    submitForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          try {
            create(this.ruleForm);
            get().then((response) => (this.posts = response.data.post));
            this.$message({
              message: "Tạo bài viết thành công",
              type: "success",
            });
            // window.location.href = "http://app.local/admin/posts";
          } catch (e) {
            this.$message({
              message: "Đã có lỗi xảy ra",
              type: "error",
            });
          }
        } else {
          console.log("error submit!!");
          return false;
        }
      });
    },
    resetForm(formName) {
      this.$refs[formName].resetFields();
    },
    onFileChange(event) {
      this.ruleForm.image = event.target.files[0].name;
    },
  },
};
</script>

<style>
@import "~simplemde/dist/simplemde.min.css";
@import "~github-markdown-css";
</style>
