<template>
  <DashBoard>
    <List
      :products="products"
      @onDelete="onDelete"
      @onEdit="(item) => $refs.edit.open(item)"
      @openCreate="$refs.create.open()"
    />

    <Pagination :total="total" />

    <JobForm ref="create" title="Thêm mới sản phẩm" @save="create" />
    <JobForm ref="edit" title="Cập nhật sản phẩm" @save="onEdit" />
  </DashBoard>
</template>

<script>
import { get, create, destroy, update } from "../api/product";
import Pagination from "@/components/Pagination.vue";
import List from "@/components/ListProduct.vue";
import JobForm from "@/components/ProductForm.vue";
import DashBoard from "@/components/DashBoard.vue";

export default {
  components: {
    Pagination,
    List,
    JobForm,
    DashBoard,
  },

  data() {
    return {
      products: [],
      total: 0,
    };
  },
  mounted() {
    get().then(
        (response) => (this.products = response.data.products)
    );
  },

  methods: {
    async create(values) {
      try {
        await create(values);
        await get().then(
          (response) => (
            (this.products = response.data.products), (this.total = response.data.products)
          )
        );
        this.$message({
          message: "Thêm mới sản phẩm thành công",
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
        await get().then((response) => (this.products = response.data.products));
        this.$message({
          message: "Đã xóa sản phẩm",
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
        await get().then((response) => (this.products = response.data.products));
        this.$message({
          message: "Đã cập nhật sản phẩm",
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
