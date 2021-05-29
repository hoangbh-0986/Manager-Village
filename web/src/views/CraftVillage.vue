<template>
  <DashBoard>
    <List
      :craftVillages="craftVillages"
      @onDelete="onDelete"
      @onEdit="(item) => $refs.edit.open(item)"
      @openCreate="$refs.create.open()"
    />

    <Pagination :total="total" />

    <CraftVillageForm
      ref="create"
      title="Thêm làng nghề mới"
      @save="create"
    />
    <CraftVillageForm ref="edit" title="Cập nhật làng nghề" @save="onEdit" />
  </DashBoard>
</template>

<script>
import { get, create, destroy, update } from "../api/craftVillage";
import Pagination from "@/components/Pagination.vue";
import List from "@/components/CraftVillage.vue";
import CraftVillageForm from "@/components/CraftVillageForm.vue";
import DashBoard from "@/components/DashBoard.vue";

export default {
  components: {
    Pagination,
    List,
    CraftVillageForm,
    DashBoard,
  },

  data() {
    return {
      craftVillages: [],
      total: 0,
    };
  },
  mounted() {
    get().then((response) => (this.craftVillages = response.data.craftVillage, this.total = response.data.craftVillage.length));
  },

  methods: {
    async create(values) {
      try {
        await create(values);
        await get().then((response) => (this.craftVillages = response.data.craftVillage));
        this.$message({
          message: "CLàng nghề được tạo thành công",
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
        await get().then((response) => (this.craftVillages = response.data.craftVillage));
        this.$message({
          message: "Đã xóa làng nghề",
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
        await get().then((response) => (this.craftVillages = response.data.craftVillage));
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
