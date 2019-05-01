export default layouts => [
    {
        path: 'projects',
        component: layouts.projects,
        props: route => ({
            path: 'projects',
            back: false
        })
    }
]
