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
      <el-form-item label="Name" prop="name">
        <el-input v-model="form.name" />
      </el-form-item>

      <el-form-item label="Email" prop="email">
        <el-input v-model="form.email" />
      </el-form-item>

      <el-form-item label="Phone Number" prop="phone">
        <el-input v-model.number="form.phone" />
      </el-form-item>

      <el-form-item label="Create Year" prop="phone">
        <el-input v-model.number="form.create_year" />
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
        name: [
          { required: true, message: "Please input name", trigger: "blur" },
        ],
        email: [
          { required: true, message: "Please input email", trigger: "blur" },
        ],
        phone: [
          { required: true, message: "Please input a number", trigger: "blur" },
        ],        
        create_year: [
          { required: true, message: "Please input a create year", trigger: "blur" },
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
