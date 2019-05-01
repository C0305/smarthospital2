export default layouts => [
    {
        path: 'types',
        component: layouts.proceduresTypes,
        props: route => ({
            path: 'types',
            back: false
        })
    }
]
