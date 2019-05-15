export default layouts => [
    {
        path: 'cmms/brandsInventory',
        component: layouts.brandsInventory,
        props: route => ({
            path: 'cmms/brandsInventory',
            back: false
        })
    }
]
