<template>
  <el-dialog
    :title="title"
    :visible.sync="show"
    width="600px"
    @close="resetForm()"
  >
    <el-form
      ref="form"
      :rules="rules"
      :model="form"
      label-width="150px"
      label-position="left"
    >
      <el-form-item label="Tên" prop="name">
        <el-input v-model="form.name" />
      </el-form-item>

    <el-form-item prop="craft_village_id" label="Làng nghề">
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

    <el-form-item label="Hình ảnh" prop="image">
        <el-input type="file" v-model="form.image" class="form-control-file h-full" @change="onFileChange"></el-input>
    </el-form-item>

      <el-form-item>
        <el-button type="primary" @click="submitForm"> Tạo </el-button>
        <el-button @click="resetForm()"> Reset </el-button>
      </el-form-item>
    </el-form>
  </el-dialog>
</template>

<script>
import _cloneDeep from "lodash/cloneDeep";
import { get } from "../api/craftVillage";

const emptyState = () => ({
  name: "",
});

export default {
  props: {
    title: String,
  },

    mounted() {
    get().then((response) => (this.carftVillages = response.data.craftVillage));
  },

  data() {
    return {
      form: emptyState(),
      show: false,
      rules: {
        name: [{ required: true, message: "Tên là bắt buộc", trigger: "blur" }],
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

    onFileChange(event) {
      this.form.image = event.target.files[0].name;
    },
  },
};
</script>
