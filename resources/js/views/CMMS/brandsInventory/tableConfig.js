export default [
    {
        header: {
            name: 'Nombre',
            prop: 'name',
            width: '350px',
            filter: {
                type: 'input'
            }
        },
        body:{
            type: 'text',
            prop: 'name'
        }
        
        
    },
    {
        header: {
            name: 'Website',
            prop: 'website',
            width: '350px',
            filter: {
                type: 'input'
            }
        },
        body:{
            type: 'text',
            prop: 'website'
        }
        
        
    },
    {
        header: {
            name: 'Acciones',
            width: '350px',
        },
        body:{
            type: 'slot',
            slot: 'actionSlot'
        }
        
    }
];