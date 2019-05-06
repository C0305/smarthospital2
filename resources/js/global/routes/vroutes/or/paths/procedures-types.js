export default layouts => [
    {
        path: 'orTypes',
        component: layouts.proceduresTypes,
        props: route => ({
            path: 'orTypes',
            back: false
        })
    }
]
