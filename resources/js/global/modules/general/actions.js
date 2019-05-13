export default {
    bacabAsideOpenClose(context, payload){
        return new Promise((resolve,reject)=> {
            context.commit('bacabAsideOpenClose', payload)
        });
    },

    bacabFirstData(context) {
        return new Promise((resolve,reject) => {
            axios.get('/show').then( async r => {
                await context.commit('user', r.data.user);
                await context.commit('mexicoStates', r.data.mexicoStates);
                await context.commit('updateMenu', r.data.menu);
                await context.commit('routesState', r.data.routes);
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