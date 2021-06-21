import axios from "./index";

export const get = () => axios.get("/ward");
export const destroy = (wardId) => axios.delete(`/ward/${wardId}`);
export const update = (wardId, data) => axios.put(`/ward/${wardId}`, data);
export const create = (data) => axios.post("ward", data);
