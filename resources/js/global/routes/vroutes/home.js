export default layouts => [
    {
        path: 'home',
        component: layouts.home,
        props: route => ({
            path: 'home',
            back: false
        })
    }
]
