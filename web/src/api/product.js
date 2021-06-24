import axios from "./index";

export const get = () => axios.get("/product");
export const destroy = (Id) => axios.delete(`/product/${Id}`);
export const update = (Id, data) => axios.put(`/product/${Id}`, data);
export const create = (data) => axios.post("product", data);
export const detailProduct = (Id) => axios.get(`/product/${Id}`);