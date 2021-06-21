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

      <el-form-item label="Năm sinh" prop="year_of_birth" reqired>
        <el-date-picker
          v-model="form.year_of_birth"
          type="datetime"
          :clearable="false"
          format="yyyy/MM/dd"
          value-format="yyyy-MM-dd HH:mm:ss"
          placeholder="Chọn năm sinh"
        >
        </el-date-picker>
      </el-form-item>

      <el-form-item label="Năm mất" prop="year_died">
        <el-date-picker
          v-model="form.year_died"
          type="datetime"
          :clearable="false"
          format="yyyy/MM/dd"
          value-format="yyyy-MM-dd HH:mm:ss"
          placeholder="Chọn năm mất"
        >
        </el-date-picker>
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

const emptyState = () => ({
  name: "",
  year_create: "",
  ancestor: "",
  note: "",
});

export default {
  props: {
    title: String,
  },

  data() {
    return {
      form: emptyState(),
      show: false,
      rules: {
        name: [{ required: true, message: "Tên là bắt buộc", trigger: "blur" }],
        year_of_birth: [
          {
            required: true,
            message: "Năm sinh là bắt buộc",
            trigger: "blur",
          },
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
