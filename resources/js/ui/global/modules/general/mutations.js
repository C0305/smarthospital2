export default {
    bacabAside(state, payload) {
        state.bacabUIEvents.bacabAsideOpen = payload;
    },
    bacabSimpleAside(state) {
        state.bacabUIEvents.bacabSimpleAsideStatus = !state.bacabUIEvents.bacabSimpleAsideStatus;
    },
    user(state, payload){
        state.user = payload;
    },
    mexicoStates(state, payload) {
        state.mexicoStates = payload;
    },
    menu(state, payload) {
        state.menu = payload;
        for(let i = 0; i < state.menu.length; i++) {
            state.menu[i].isOpen = 'subList subList--hidden';
        }
    },
    openCloseMenu(state,{payload,classs}){
        console.log(classs)
        state.menu[payload].isOpen = classs;
    },
    locale(state, payload) {
        state.locale = payload;
    },
    bacabUpdateValue(state, payload){
        switch(payload){
            case 'patients':
                state.bacabUIEvents.reloadValue.patients++;
                break;
        }
    }
}