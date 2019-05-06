<template>
    <div class="grid">
        <header>
            <bacab-header/>
            <div class="header">
                <bacab-tabs-control/>
                <hr>
            </div>
        </header>


        <bacab-side-bar/>
        <main class="main">
            <div
                    v-for="(tab, key) in tabs"
                    :key="key"
                    v-show="selected === tab.name">
                <bacab-container :ref="tab.name" v-bind="tab"/>
            </div>
        </main>
        <bacab-footer/>
    </div>
</template>

<script>
    import BacabClock from "./components/bacabClock";
    import BacabFooter from "./bacabFooter";
    import BacabHomeMainHeader from "./views/home/components/bacabHomeMainHeader";
    import BacabContainer from "./components/bacabContainer";
    import BacabTabsControl from "./components/bacabTabsControl";
    import BacabSideBar from "./bacabSideBar";
    import BacabHeader from "./bacabHeader";

    export default {
        name: "bacabDashboard",
        components: {
            BacabHeader,
            BacabSideBar,
            BacabTabsControl,
            BacabFooter,
            BacabContainer,
            BacabHomeMainHeader,
            BacabClock},
        props: {
            base: {
                type: String,
                default: () => ''
            }
        },
        data: () => ({
            selected: '',
            last: '',
            counter: 0,
            tabs: []
        }),
        methods: {
            select (tab) {
                this.last = this.selected
                this.selected = tab.name
                if (!this.last) {
                    this.last = this.selected
                }
                this.go(tab)
            },
            create (label, path) {
                this.counter++
                const name = 'tab-' + this.counter
                if (path.substring(0, 1) === '/') {
                    /* eslint-disable no-param-reassign */
                    path = path.substring(1)
                }
                return {
                    path: `${this.base}/${name}/${path}`,
                    name: name,
                    label: label
                }
            },
            add (tab) {
                this.tabs.push(tab)
            },
            close (tab, $event) {
                $event.preventDefault()
                $event.stopPropagation()
                const index = this.tabs.findIndex(item => tab.name === item.name)
                this.tabs.splice(index, 1)
                const last = this.tabs.find(item => this.last === item.name)
                if (last) {
                    this.select(last)
                }
            },
            open (path, label) {
                let tab = this.tabs.find(item => label === item.label)
                if (tab) {
                    return this.select(tab)
                }
                tab = this.create(label, path)
                this.add(tab)
                this.select(tab)
                this.go(tab)
            },
            go (tab) {
                this.$router.push(tab.path)
            }
        },
        watch: {
            $route () {
                const name = this.$route.params.tab
                const index = this.tabs.findIndex(item => name === item.name)
                if (index >= 0) {
                    this.tabs[index].path = this.$route.fullPath
                }
            },
            tabs() {
                if(this.tabs.length === 0){
                    this.open('/goals', 'Goals')
                }
            }
        },
        mounted(){

            this.open('/home', 'Home')
            /* Scripts for css grid dashboard */

            $(document).ready(() => {
                addResizeListeners();
                setSidenavListeners();
                setUserDropdownListener();
                renderChart();
                setMenuClickListener();
                setSidenavCloseListener();
            });

            // Set constants and grab needed elements
            const sidenavEl = $('.sidenav');
            const gridEl = $('.grid');
            const SIDENAV_ACTIVE_CLASS = 'sidenav--active';
            const GRID_NO_SCROLL_CLASS = 'grid--noscroll';

            function toggleClass(el, className) {
                if (el.hasClass(className)) {
                    el.removeClass(className);
                } else {
                    el.addClass(className);
                }
            }

            // User avatar dropdown functionality
            function setUserDropdownListener() {
                const userAvatar = $('.header__avatar');

                userAvatar.on('click', function(e) {
                    const dropdown = $(this).children('.dropdown');
                    toggleClass(dropdown, 'dropdown--active');
                });
            }

            // Sidenav list sliding functionality
            function setSidenavListeners() {
                const subHeadings = $('.navList__subheading'); console.log('subHeadings: ', subHeadings);
                const SUBHEADING_OPEN_CLASS = 'navList__subheading--open';
                const SUBLIST_HIDDEN_CLASS = 'subList--hidden';

                subHeadings.each((i, subHeadingEl) => {
                    $(subHeadingEl).on('click', (e) => {
                        const subListEl = $(subHeadingEl).siblings();

                        // Add/remove selected styles to list category heading
                        if (subHeadingEl) {
                            toggleClass($(subHeadingEl), SUBHEADING_OPEN_CLASS);
                        }

                        // Reveal/hide the sublist
                        if (subListEl && subListEl.length === 1) {
                            toggleClass($(subListEl), SUBLIST_HIDDEN_CLASS);
                        }
                    });
                });
            }

            // Draw the chart
            function renderChart() {
                const chart = AmCharts.makeChart( "chartdiv", {
                    "type": "serial",
                    "theme": "light",
                    "dataProvider": [ {
                        "month": "Jan",
                        "visits": 2025
                    }, {
                        "month": "Feb",
                        "visits": 1882
                    }, {
                        "month": "Mar",
                        "visits": 1809
                    }, {
                        "month": "Apr",
                        "visits": 1322
                    }, {
                        "month": "May",
                        "visits": 1122
                    }, {
                        "month": "Jun",
                        "visits": 1114
                    }, {
                        "month": "Jul",
                        "visits": 984
                    }, {
                        "month": "Aug",
                        "visits": 711
                    }, {
                        "month": "Sept",
                        "visits": 665
                    }, {
                        "month": "Oct",
                        "visits": 580
                    } ],
                    "valueAxes": [ {
                        "gridColor": "#FFFFFF",
                        "gridAlpha": 0.2,
                        "dashLength": 0
                    } ],
                    "gridAboveGraphs": true,
                    "startDuration": 1,
                    "graphs": [ {
                        "balloonText": "[[category]]: <b>[[value]]</b>",
                        "fillAlphas": 0.8,
                        "lineAlpha": 0.2,
                        "type": "column",
                        "valueField": "visits"
                    } ],
                    "chartCursor": {
                        "categoryBalloonEnabled": false,
                        "cursorAlpha": 0,
                        "zoomable": false
                    },
                    "categoryField": "month",
                    "categoryAxis": {
                        "gridPosition": "start",
                        "gridAlpha": 0,
                        "tickPosition": "start",
                        "tickLength": 20
                    },
                    "export": {
                        "enabled": false
                    }
                });
            }

            function toggleClass(el, className) {
                if (el.hasClass(className)) {
                    el.removeClass(className);
                } else {
                    el.addClass(className);
                }
            }

            // If user opens the menu and then expands the viewport from mobile size without closing the menu,
            // make sure scrolling is enabled again and that sidenav active class is removed
            function addResizeListeners() {
                $(window).resize(function(e) {
                    const width = window.innerWidth; console.log('width: ', width);

                    if (width > 750) {
                        sidenavEl.removeClass(SIDENAV_ACTIVE_CLASS);
                        gridEl.removeClass(GRID_NO_SCROLL_CLASS);
                    }
                });
            }

            // Menu open sidenav icon, shown only on mobile
            function setMenuClickListener() {
                $('.header__menu').on('click', function(e) { console.log('clicked menu icon');
                    toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
                    toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
                });
            }
1
            // Sidenav close icon
            function setSidenavCloseListener() {
                $('.sidenav__brand-close').on('click', function(e) {
                    toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
                    toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
                });
            }

            this.$store.dispatch('general/bacabFirstData').catch( error => {
                console.error(`-SH: Error al cargar los datos de inicio ${error}`)
            });
        }

    }
</script>

<style scoped>

</style>