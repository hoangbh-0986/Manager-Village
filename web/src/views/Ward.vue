<template>
  <DashBoard>
    <List
      :wards="wards"
      @onDelete="onDelete"
      @onEdit="(item) => $refs.edit.open(item)"
      @openCreate="$refs.create.open()"
    />

    <Pagination :total="total" />

    <WardForm ref="create" title="Tạo mới xã phường" @save="create" />
    <WardForm ref="edit" title="Cập nhật xã phường" @save="onEdit" />
  </DashBoard>
</template>

<script>
import { get, create, destroy, update } from "../api/ward";
import Pagination from "@/components/Pagination.vue";
import List from "@/components/ListWard.vue";
import WardForm from "@/components/WardForm.vue";
import DashBoard from "@/components/DashBoard.vue";

export default {
  components: {
    Pagination,
    List,
    WardForm,
    DashBoard,
  },

  data() {
    return {
      wards: null,
      total: 0,
    };
  },
  mounted() {
    get().then((response) => (this.wards = response.data.data, this.total = response.data.total));
  },

  methods: {
    async create(values) {
      try {
        await create(values);
        await get().then((response) => (this.wards = response.data.data));
        this.$message({
          message: "Thêm mới thành công",
          type: "success",
        });
      } catch (e) {
        this.$message({
          message: "Đã có lỗi xảy ra",
          type: "error",
        });
      }
    },

    async onDelete(id) {
      try {
        await destroy(id);
        await get().then((response) => (this.wards = response.data.data));
        this.$message({
          message: "Xóa thành công",
          type: "success",
        });
      } catch (e) {
        this.$message({
          message: "Đã có lỗi xảy ra",
          type: "error",
        });
      }
    },

    async onEdit(values) {
      try {
        await update(values.id, values);
        await get().then((response) => (this.wards = response.data.data));
        this.$message({
          message: "Cập nhật thành công",
          type: "success",
        });
      } catch (e) {
        this.$message({
          message: "Đã có lỗi xảy ra",
          type: "error",
        });
      }
    },
  },
};
</script>
