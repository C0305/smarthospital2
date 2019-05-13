export default layouts => [
    {
        path: 'cmms/brandsInventory',
        component: layouts.modelsInventory,
        props: route => ({
            path: 'cmms/brandsInventory',
            back: false
        })
    }
]
