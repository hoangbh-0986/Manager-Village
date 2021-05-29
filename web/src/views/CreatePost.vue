<template>
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
    <el-form-item>
      <el-button type="primary" @click="submitForm('ruleForm')"
        >Tạo bài</el-button
      >
      <el-button @click="resetForm('ruleForm')">Reset</el-button>
    </el-form-item>
  </el-form>
</template>
<script>
import VueSimplemde from 'vue-simplemde'
import { get, create } from "../api/post";
export default {
  components: {
    VueSimplemde,
  },

  data() {
    return {
      ruleForm: {
        title: '',
        content: '',
      },
      rules: {
        title: [
          { required: true, message: "Tiêu đề là bắt buộc", trigger: "blur" },
        ],
        content: [
          { required: true, message: "Nội dung là bắt buộc", trigger: "blur" },
        ],
      }
    };
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
              window.location.href = "http://app.local/admin/posts"
            } catch (e) {
              this.$message({
                message: "Đã có lỗi xảy ra",
                type: "error",
              });
          }
        } else {
          console.log('error submit!!');
          return false;
        }
      });
    },
    resetForm(formName) {
      this.$refs[formName].resetFields();
    }
  }
}
</script>

<style>
@import "~simplemde/dist/simplemde.min.css";
@import "~github-markdown-css";
</style>
