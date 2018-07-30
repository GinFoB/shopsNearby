
export default {
    shops(url) {
        return {
            getShops: (data) => axios.post(url,data),
            updateShop: ({id}) =>  axios.put(`${url}/${id}`),
            deleteShop:({id}) =>  axios.delete(`${url}/${id}`)
        }
    }
}