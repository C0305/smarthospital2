export default layouts => [
    {
        path: 'cmms/modelsCatalog',
        component: layouts.modelsCatalog,
        props: route => ({
            path: 'cmms/modelsCatalog',
            back: false
        })
    }
]
