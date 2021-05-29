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

      <el-form-item label="Năm hình thành" prop="create_year" reqired>
        <el-date-picker
          v-model="form.create_year"
          type="datetime"
          :clearable="false"
          format="yyyy/MM/dd"
          value-format="yyyy-MM-dd HH:mm:ss"
          placeholder="Select year creat"
        >
        </el-date-picker>
      </el-form-item>

       <el-form-item label="Xã phường" prop="ward_id">
          <el-select v-model="form.ward_id" placeholder="Vui lòng chọn 1 xã phường">
            <el-option 
              v-for="item in wards"
              :key="item.id"
              :label="item.name"
              :value="item.id"
            ></el-option>
          </el-select>
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
import { get } from "../api/ward";
const emptyState = () => ({
  name: "",
  email: "",
  phone: "",
});

export default {
  props: {
    title: String,
  },

  mounted() {
    get().then((response) => (this.wards = response.data.data));
  },

  data() {
    return {
      form: emptyState(),
      show: false,
      wards: null,
      rules: {
        name: [
          { required: true, message: "Tên là bắt buộc", trigger: "blur" },
        ],
        email: [
          { required: true, message: "Email là bắt buộc", trigger: "blur" },
        ],
        phone: [
          { required: true, message: "Số điện thoại là bắt buộc", trigger: "blur" },
        ],        
        create_year: [
          { required: true, message: "Năm hình thành là bắt buộc", trigger: "blur" },
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
