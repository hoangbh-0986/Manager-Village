<template>
  <div>
    <el-table :data="feedBacks" style="width: 100%">
      <el-table-column width="50" prop="id" lable="#" sortable />
      <el-table-column label="Tên" width="150" prop="name"> </el-table-column>
      <!-- <el-table-column label="Số điện thoại" prop="phone" width="120">
      </el-table-column> -->
      <!-- <el-table-column label="Email" prop="email"> </el-table-column> -->
      <el-table-column width="250" label="Tiêu đề" prop="title"> </el-table-column>
      <el-table-column label="Nội dung" prop="content"> </el-table-column>
      <el-table-column
        fixed="right"
        label="Hành Động"
        align="center"
        min-width="50"
        max-width="100"
      >
        <template slot-scope="scope">
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
    feedBacks: {
      type: Array,
      required: true,
    },
  },

  methods: {
    onDelete(id) {
      this.$confirm("Xóa làng phản hồi này", {
        confirmButtonText: "Xóa",
        cancelButtonText: "cancel",
        type: "warning",
      })
        .then(() => {
          return this.$emit("onDelete", id);
        })
        .catch(() => {});
    },
  },
};
</script>
