export default {
    bacabAsideOpenClose(context, payload){
        context.commit('bacabAsideOpenClose', payload)
    },

    async bacabFirstData(context) {
        return new Promise((resolve,reject) => {
            axios.get('/show').then( async r => {
                await context.commit('user', r.data.user);
                await context.commit('mexicoStates', r.data.mexicoStates);
                await context.commit('updateMenu', r.data.menu);
                resolve(r);
            }).catch( error => {
                reject(error);
            });
        })
    },
    bacabUpdateValue(context, payload){
        context.commit('bacabUpdateValue',payload);
    }
}