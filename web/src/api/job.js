import axios from "./index";

export const get = () => axios.get("/job");
export const destroy = (jodId) => axios.delete(`/job/${jodId}`);
export const update = (jodId, data) => axios.put(`/job/${jodId}`, data);
export const create = (data) => axios.post("job", data);
