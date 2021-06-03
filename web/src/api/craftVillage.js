import axios from "./index"

export const get = () => axios.get("/craft_village")
export const getDetail = Id => axios.get(`/craft_village/${Id}`)
export const destroy = Id => axios.delete(`/craft_village/${Id}`)
export const update = (Id, data) => axios.put(`/craft_village/${Id}`, data)
export const create = data => axios.post('craft_village', data)