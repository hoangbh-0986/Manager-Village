import axios from "./index";

export const get = () => axios.get("/post");
export const getDetail = (Id) => axios.get(`/post/${Id}`);
export const destroy = (Id) => axios.delete(`/post/${Id}`);
export const update = (Id, data) => axios.put(`/post/${Id}`, data);
export const create = (data) => axios.post("post", data);
export const getByCategory = (Id) => axios.get(`/post/category/${Id}`);
export const DetailPostJCraftVillage = (Id) => axios.get(`/post-craft_village/${Id}`);
export const DetailPostJob = (Id) => axios.get(`/post-job/${Id}`);
export const DetailPostExpert = () => axios.get("/post-expert");