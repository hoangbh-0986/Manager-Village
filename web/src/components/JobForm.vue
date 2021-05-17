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

      <el-form-item label="Year Create" prop="year_create">
        <el-input v-model="form.year_create" />
      </el-form-item>

      <el-form-item label="Ancestor" prop="ancestor">
        <el-input v-model.number="form.ancestor" />
      </el-form-item>

      <el-form-item label="Note" prop="note">
        <el-input v-model.number="form.note" />
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
        name: [
          { required: true, message: "Please input name", trigger: "blur" },
        ],
        year_create: [
          {
            required: true,
            message: "Please input create year",
            trigger: "blur",
          },
        ],
        ancestor: [
          {
            required: true,
            message: "Please input a ancestor",
            trigger: "blur",
          },
        ],
        note: [
          { required: true, message: "Please input a note", trigger: "blur" },
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
