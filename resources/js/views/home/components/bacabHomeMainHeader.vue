<template>
    <div class="main-header">
        <div class="main-header__intro-wrapper">
            <div class="main-header__welcome">
                <div class="main-header__welcome-title text-light">Welcome, <strong>{{ userData.name }}</strong></div>
                <div class="main-header__welcome-subtitle text-light">How are you today?</div>
            </div>
            <div class="quickview">
                <div v-if="events" class="quickview__item">
                    <div class="quickview__item-total">41</div>
                    <div class="quickview__item-description">
                        <i class="far fa-calendar-alt"></i>
                        <span class="text-light">Events</span>
                    </div>
                </div>
                <div v-if="messages" class="quickview__item">
                    <div class="quickview__item-total">64</div>
                    <div class="quickview__item-description">
                        <i class="far fa-comment"></i>
                        <span class="text-light">Messages</span>
                    </div>
                </div>
                <div v-if="weather" class="quickview__item">
                    <div class="quickview__item-total">27&deg;</div>
                    <div class="quickview__item-description">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="text-light">Austin</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    export default {
        name: "bacabHomeMainHeader",
        computed:mapState({
            userData: state => state.general.user,
            events: state => state.general.user.mainHeader.events,
            messages: state => state.general.user.mainHeader.messages,
            weather: state => state.general.user.mainHeader.weather,
        })
    }
</script>

<style scoped>

</style>