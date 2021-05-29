<template>
  <el-dialog
    :title="title"
    :visible.sync="show"
    width=90%
    @close="resetForm()"
  >
    <el-form
      ref="form"
      :rules="rules"
      :model="form"
      label-width="150px"
      label-position="left"
    >
      <el-form-item label="Tiêu đề" prop="title">
        <el-input v-model="form.title" />
      </el-form-item>

      <el-form-item label="Tác giả" prop="author_id">
        <el-input v-model="form.author_id" />
      </el-form-item>

    <el-form-item label="Nội dung" prop="content">
      <vue-simplemde
        v-model="form.content"
        preview-class="markdown-body"
        ref="markdownEditor"
      />
    </el-form-item>

      <el-form-item>
        <el-button type="primary" @click="submitForm"> Confirm </el-button>
        <el-button @click="resetForm()"> Reset </el-button>
      </el-form-item>
    </el-form>
  </el-dialog>
</template>

<script>
import _cloneDeep from "lodash/cloneDeep";
import VueSimplemde from 'vue-simplemde'

const emptyState = () => ({
  title: "",
  content: "",
  author_id: "",
});

export default {
  components: {
    VueSimplemde,
  },
  props: {
    title: String,
  },

  data() {
    return {
      form: emptyState(),
      show: false,
      rules: {
        title: [
          { required: true, message: "Tiêu đề  là bắt buộc", trigger: "blur" },
        ],
        content: [
          { required: true, message: "Nội dung là bắt buộc", trigger: "blur" },
        ],
        author_id: [
          { required: true, message: "Tác giả là bắt buộc", trigger: "blur" },
        ],
      },
    };
  },

  methods: {
    open(data) {
      if (data) {
        this.form = _cloneDeep(data);
      }

      this.show = true;
    },

    submitForm() {
      this.$refs.form.validate((valid) => {
        if (valid) {
          this.$emit("save", this.form);

          this.show = false;
        } else {
          return false;
        }
      });
    },

    resetForm() {
      this.form = emptyState();
    },
  },
};
</script>

<style>
@import "~simplemde/dist/simplemde.min.css";
@import "~github-markdown-css";
</style>
