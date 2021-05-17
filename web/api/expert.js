import axios from "./index"

export const get = () => axios.get("/expert")
export const destroy = Id => axios.delete(`/expert/${Id}`)
export const update = (Id, data) => axios.put(`/expert/${Id}`, data)
export const create = data => axios.post('expert', data)