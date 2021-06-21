import axios from "./index";

export const get = () => axios.get("/get-users");
export const setRole = (Id) => axios.put(`/setRole/${Id}`);
