export default {
    bacabAsideOpenClose(context, payload){
        context.commit('bacabAsideOpenClose', payload)
    },

    bacabAside(context) {
        context.commit('bacabAside')
    },

    bacabFirstData(context) {
        axios.get('/show').then( r => {
            context.commit('user', r.data.user);
            context.commit('mexicoStates', r.data.mexicoStates);
            context.commit('menu', r.data.menu);
            context.commit('locale', r.data.locale);
        });
    },
    openCloseMenu(context, payload){
        let classes = context.state.menu[payload].isOpen;
        console.log(classes)
        if(classes  == 'subList subList--hidden'){
            context.dispatch('openCloseMenu',{index: payload, class: 'subList'})
        } else {
            context.dispatch('openCloseMenu',{payload, clas:'subList subList--hidden'})
        }
    },
    bacabUpdateValue(context, payload){
        context.commit('bacabUpdateValue',payload);
    }
}