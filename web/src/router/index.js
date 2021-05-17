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
    path: "/admin/ward",
    name: "admin",
    meta: { middleware: [auth] },
    component: () => import(/* webpackChunkName: "abcss" */ "../views/Ward"),
  },
  {
    path: "/admin/craft-village",
    name: "admin",
    meta: { middleware: [auth] },
    component: () => import(/* webpackChunkName: "abcss" */ "../views/CraftVillage"),
  },
  {
    path: "/admin/expert",
    name: "admin",
    meta: { middleware: [auth] },
    component: () => import(/* webpackChunkName: "abcss" */ "../views/Expert"),
  },
  {
    path: "/admin/create-post",
    name: "admin",
    // meta: { middleware: [auth] },
    component: () =>
      import(/* webpackChunkName: "abcss" */ "../views/CreatePost"),
  },
  {
    path: "/admin/job",
    name: "admin-Job",
    meta: { middleware: [auth] },
    component: () => import(/* webpackChunkName: "abcss" */ "../views/Job"),
  },
  {
    path: "/user",
    name: "user",
    meta: { middleware: [auth] },
    component: () => import(/* webpackChunkName: "user" */ "../views/User"),
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
