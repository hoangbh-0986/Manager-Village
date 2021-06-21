<template>
  <div>
    <div class="flex justify-end w-full mb-4">
      <el-button
        class="px-4 py-2 bg-blue-400 text-white rounded hover:bg-blue-500 active:bg-blue-600"
        @click="open"
      >
        Làng nghề mới
      </el-button>
    </div>
    <el-table :data="craftVillages" style="width: 100%">
      <el-table-column prop="id" lable="#" sortable />
      <el-table-column label="Tên" width="180" prop="name"> </el-table-column>
      <el-table-column label="Số điện thoại" prop="phone" width="180">
      </el-table-column>
      <el-table-column label="Ra đời Năm" prop="create_year"> </el-table-column>
      <el-table-column
        fixed="right"
        label="Hành Động"
        align="center"
        min-width="150"
      >
        <template slot-scope="scope">
          <el-button icon="el-icon-edit" circle @click="onEdit(scope.row)" />
          <el-button
            type="danger"
            icon="el-icon-delete"
            circle
            @click="onDelete(scope.row.id)"
          />
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<script>
export default {
  props: {
    craftVillages: {
      type: Array,
      required: true,
    },
  },

  methods: {
    onDelete(id) {
      this.$confirm("Xóa làng nghề này", {
        confirmButtonText: "Xóa",
        cancelButtonText: "cancel",
        type: "warning",
      })
        .then(() => {
          return this.$emit("onDelete", id);
        })
        .catch(() => {});
    },

    onEdit(item) {
      return this.$emit("onEdit", item);
    },

    open() {
      return this.$emit("openCreate");
    },
  },
};
</script>
