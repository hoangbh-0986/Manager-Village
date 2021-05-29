<template>
  <div>
    <div class="flex justify-end w-full mb-4">
      <router-link to="/admin/post/create">
        <el-button
          class="px-4 py-2 bg-blue-400 text-white rounded hover:bg-blue-500 active:bg-blue-600"
        >
          Viết bài
        </el-button>
      </router-link>
    </div>
    <el-table :data="posts" style="width: 100%">
      <el-table-column prop="id" lable="#" sortable />
      <el-table-column label="Tiêu đề" prop="title" width="180"> </el-table-column>
      <el-table-column label="Nội dung" prop="content" />
      <el-table-column
        fixed="right"
        label="Actions"
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
    posts: {
      required: true,
    },
  },

  methods: {
    onDelete(id) {
      this.$confirm("Delete this expert ?", {
        confirmButtonText: "Delete",
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
  },
};
</script>
