<template>
  <DashBoard>
    <List
      :posts="posts"
      @onDelete="onDelete"
      @onEdit="(item) => $refs.edit.open(item)"
    />
    <PostForm ref="create" title="Create new job" @save="create" />
    <PostForm ref="edit" title="Edit ward" @save="onEdit" />
    <Pagination :total="total" />
  </DashBoard>
</template>

<script>
import { get, create, destroy, update } from "../api/post";
import Pagination from "@/components/Pagination.vue";
import List from "@/components/ListPosts.vue";
import DashBoard from "@/components/DashBoard.vue";
import PostForm from "@/components/PostForm.vue";

export default {
  components: {
    Pagination,
    List,
    DashBoard,
    PostForm,
  },

  data() {
    return {
      posts: null,
      total: 0,
    };
  },
  mounted() {
    get().then(
      (response) => (
        (this.posts = response.data.data),
        (this.total = response.data.data.length)
      )
    );
  },

  methods: {
    async create(values) {
      try {
        await create(values);
        await get().then((response) => ((this.posts = response.data.data), (this.total = response.data.data.length)));
        this.$message({
          message: "Tạo bài viết thành công",
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
        await get().then((response) => (this.posts = response.data.data));
        this.$message({
          message: "Đã xóa bài viết",
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
        await get().then((response) => (this.posts = response.data.data));
        this.$message({
          message: "Cập nhật bài viết thành công",
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
