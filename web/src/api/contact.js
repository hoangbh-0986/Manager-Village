import axios from "./index";

export const get = () => axios.get("/feedback");
export const destroy = (Id) => axios.delete(`/feedback/${Id}`);
export const getDetail = (Id) => axios.get(`/feedback/${Id}`);
export const create = (data) => axios.post("feedback", data);
