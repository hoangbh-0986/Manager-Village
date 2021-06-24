<template>
  <el-dialog
    :title="title"
    :visible.sync="show"
    width="90%"
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
      <div class="flex">
        <el-form-item prop="craft_village_id">
          <el-select
            v-model="form.craft_village_id"
            placeholder="Vui lòng chọn 1 làng nghề"
          >
            <el-option
              v-for="item in carftVillages"
              :key="item.id"
              :label="item.name"
              :value="item.id"
            ></el-option>
          </el-select>
        </el-form-item>
        <el-form-item prop="job_id">
          <el-select
            v-model="form.craft_village_id"
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
          <el-form-item prop="expert_id">
          <el-select
            v-model="form.expert_id"
            placeholder="Vui lòng chọn Nghệ nhân"
          >
            <el-option
              v-for="item in experts"
              :key="item.id"
              :label="item.name"
              :value="item.id"
            ></el-option>
          </el-select>
        </el-form-item>
        <el-form-item prop="category_id">
          <el-select
            v-model="form.category_id"
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
      </div>

      <el-form-item>
        <el-button type="primary" @click="submitForm"> Confirm </el-button>
        <el-button @click="resetForm()"> Reset </el-button>
      </el-form-item>
    </el-form>
  </el-dialog>
</template>

<script>
import _cloneDeep from "lodash/cloneDeep";
import VueSimplemde from "vue-simplemde";
import { get } from "../api/craftVillage";
import { get as getJob } from "../api/job";
import { get as getCategory } from "../api/category";
import { get as getExpert } from "../api/expert";

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

  mounted() {
    get().then((response) => (this.carftVillages = response.data.craftVillage));
    getJob().then((response) => (this.jobs = response.data.jobs));
    getCategory().then((response) => (this.categories = response.data.categorys));
    getExpert().then((response) => (this.experts = response.data.experts));
  },

  data() {
    return {
      form: emptyState(),
      show: false,
      carftVillages: [],
      jobs: [],
      categories: [],
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
