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

      <el-form-item label="Email" prop="email">
        <el-input v-model="form.email" />
      </el-form-item>

      <el-form-item label="Số điện thoại" prop="phone">
        <el-input v-model.number="form.phone" />
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

const emptyState = () => ({
  name: "",
  email: "",
  phone: "",
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
        email: [
          { required: true, message: "Email là bắt buộc", trigger: "blur" },
        ],
        phone: [
          {
            required: true,
            message: "Số điện thoại là bắt buộc",
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
