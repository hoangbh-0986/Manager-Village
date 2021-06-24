import Vue from "vue";
import store from "@/store/index";
import VueRouter from "vue-router";
import auth from "@/middleware/auth";
import admin from "@/middleware/admin";
import guest from "@/middleware/guest";
import middlewarePipeline from "@/router/middlewarePipeline";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "home",
    // meta: { middleware: [guest] },
    component: () => import(/* webpackChunkName: "home" */ "../views/Home"),
  },
  {
    path: "/post/:post_id",
    name: "detailPost",
    // meta: { middleware: [guest] },
    component: () => import(/* webpackChunkName: "home" */ "../views/DetailPost"),
  },
  {
    path: "/product/:product_id",
    name: "detailProduct",
    // meta: { middleware: [guest] },
    component: () => import(/* webpackChunkName: "home" */ "../views/DetailProduct"),
  },
  {
    path: "/admin/ward",
    name: "ward",
    meta: { middleware: [auth, admin] },
    component: () => import(/* webpackChunkName: "abcss" */ "../views/Ward"),
  },
  {
    path: "/admin/users",
    name: "usersAdmin",
    meta: { middleware: [auth, admin] },
    component: () =>
      import(/* webpackChunkName: "abcss" */ "../views/UsersAdmin"),
  },
  {
    path: "/admin/craft-village",
    name: "craft-village",
    meta: { middleware: [auth, admin] },
    component: () =>
      import(/* webpackChunkName: "abcss" */ "../views/CraftVillage"),
  },
  {
    path: "/admin/expert",
    name: "expert",
    meta: { middleware: [auth, admin] },
    component: () => import(/* webpackChunkName: "abcss" */ "../views/Expert"),
  },
  {
    path: "/admin/posts",
    name: "posts",
    meta: { middleware: [auth, admin] },
    component: () => import(/* webpackChunkName: "abcss" */ "../views/Posts"),
  },
  {
    path: "/admin/feedback",
    name: "managerFeedback",
    meta: { middleware: [auth, admin] },
    component: () => import(/* webpackChunkName: "abcss" */ "../views/Feedback"),
  },
  {
    path: "/admin/job",
    name: "job",
    meta: { middleware: [auth, admin] },
    component: () => import(/* webpackChunkName: "abcss" */ "../views/Job"),
  },
  {
    path: "/admin/product",
    name: "product",
    meta: { middleware: [auth, admin] },
    component: () => import(/* webpackChunkName: "abcss" */ "../views/Product"),
  },
  {
    path: "/user",
    name: "user",
    meta: { middleware: [auth] },
    component: () => import(/* webpackChunkName: "user" */ "../views/User"),
  },
  {
    path: "/experts",
    name: "expertsUser",
    component: () => import(/* webpackChunkName: "user" */ "../views/UserExperts"),
  },
  {
    path: "/products",
    name: "productsUser",
    component: () => import(/* webpackChunkName: "user" */ "../views/UserProducts"),
  },
  {
    path: "/user",
    name: "user",
    meta: { middleware: [auth] },
    component: () => import(/* webpackChunkName: "user" */ "../views/User"),
  },
  {
    path: "/news",
    name: "news",
    component: () => import(/* webpackChunkName: "user" */ "../views/EventNews"),
  },
  {
    path: "/users",
    name: "users",
    meta: { middleware: [auth, admin] },
    component: () => import(/* webpackChunkName: "users" */ "../views/Users"),
  },
  {
    path: "/login",
    name: "login",
    meta: { middleware: [guest] },
    component: () => import(/* webpackChunkName: "login" */ "../views/Login"),
  },
  {
    path: "/register",
    name: "register",
    meta: { middleware: [guest] },
    component: () =>
      import(/* webpackChunkName: "register" */ "../views/Register"),
  },
  {
    path: "/reset-password",
    name: "resetPassword",
    meta: { middleware: [guest] },
    component: () =>
      import(/* webpackChunkName: "reset-password" */ "../views/ResetPassword"),
  },
  {
    path: "/forgot-password",
    name: "forgotPassword",
    meta: { middleware: [guest] },
    component: () =>
      import(
        /* webpackChunkName: "forgot-password" */ "../views/ForgotPassword"
      ),
  },
  {
    path: "/contact",
    name: "conctact",
    component: () => import(/* webpackChunkName: "home" */ "../views/Contact"),
  },
  {
    path: "/admin/post/create",
    name: "view-postsd",
    component: () =>
      import(/* webpackChunkName: "home" */ "../views/CreatePost"),
  },
  {
    path: "/:catchAll(.*)",
    name: "notFound",
    component: () =>
      import(/* webpackChunkName: "not-found" */ "../views/NotFound"),
  },
];

const router = new VueRouter({
  mode: "history",
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    } else {
      return { x: 0, y: 0 };
    }
  },
});

router.beforeEach((to, from, next) => {
  const middleware = to.meta.middleware;
  const context = { to, from, next, store };

  if (!middleware) {
    return next();
  }

  middleware[0]({
    ...context,
    next: middlewarePipeline(context, middleware, 1),
  });
});

export default router;
