<template>
  <div>
    <div class="flex justify-end w-full mb-4">
      <el-button
        class="px-4 py-2 bg-blue-400 text-white rounded hover:bg-blue-500 active:bg-blue-600"
        @click="open"
      >
        Tạo mới
      </el-button>
    </div>
    <el-table :data="experts" style="width: 100%">
      <el-table-column prop="id" lable="#" sortable />
      <el-table-column label="Tên" prop="name" width="180"> </el-table-column>
      <el-table-column label="Năm sinh" prop="year_of_birth" />
      <el-table-column label="Năm mất" prop="year_died"> </el-table-column>
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
    experts: {
      required: true,
    },
  },

  methods: {
    onDelete(id) {
      this.$confirm("Xóa nghệ nhân này?", {
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
