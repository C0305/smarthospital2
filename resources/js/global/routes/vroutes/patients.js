export default layouts => [
    {
        path: 'patients',
        component: layouts.patients,
        props: route => ({
            path: 'patients',
            back: false
        })
    }
]
