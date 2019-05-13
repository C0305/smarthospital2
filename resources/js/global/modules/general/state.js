export default {
    user: {
        name: 'Nombre',
        mainHeader: {
            weather: true,
            events: false,
            messages: false,
        }
    },
    menu: [
        {
            name: 'Pacientes',
            icon: 'icon  fas fa-male',
            childs: [
                {
                    name: 'Listado de Pacientes',
                    route: '/patients',
                    icon: 'fas fa-project-diagram',
                    childs: null,
                }
            ],
        },
        {
            name: 'Quirofano',
            icon: 'icon  fas fa-procedures',
            childs: [
                {
                    name: 'Listado de Procedimientos',
                    route: '/or/types',
                    icon: 'fas fa-project-diagram',
                    childs: null,
                },
                {
                    name: 'Tipo de procedimientos',
                    route: '/projects',
                    icon: 'fas fa-project-diagram',
                    childs: null,
                },
                {
                    name: 'Salas (Ubicaciónes)',
                    route: '/projects',
                    icon: 'fas fa-project-diagram',
                    childs: null,
                }
            ],
        },
        {
            name: 'Ajustes',
            icon: 'icon  fas fa-cog',
            childs: [
                {
                    name: 'Listado de Usuarios',
                    route: '/projects',
                    icon: 'fas fa-project-diagram',
                    childs: null,
                },
                {
                    name: 'Listado de Roles & Permisos',
                    route: '/projects',
                    icon: 'fas fa-project-diagram',
                    childs: null,
                },
                {
                    name: 'Ubicaciónes',
                    route: '/projects',
                    icon: 'fas fa-project-diagram',
                    childs: null,
                }
            ],
        },
    ],
    bacabNotifications: [],
    bacabUIEvents: {
        bacabAsideOpen: false,
        bacabNewNotification: false,
        reloadValue: {
            patients: 0,
            cmss:{
                brands: 0,
            }
        }
    },
    mexicoStates: [],
    routes: []
}