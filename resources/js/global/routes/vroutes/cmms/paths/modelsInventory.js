export default layouts => [
    {
        path: 'cmms/modelsInventory',
        component: layouts.modelsInventory,
        props: route => ({
            path: 'cmms/modelsInventory',
            back: false
        })
    }
]
