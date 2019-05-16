export default [
    {
        header: {
            name: 'Imagen',
            prop: 'image',
            width: '100px',

        },
        body:{
            type: 'image',
            prop: 'image'
        }
        
        
    },
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
            name: 'Marca',
            prop: 'brand.name',
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
            name: 'Categoría',
            prop: 'category.name',
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
            name: 'Sub Categoría',
            prop: 'subCategory.name',
            width: '350px',
            filter: {
                type: 'subCategory.name'
            }
        },
        body:{
            type: 'text',
            prop: 'subCategory.name'
        }


    },
    {
        header: {
            name: 'RFAAC',
            prop: 'rfaac',
            width: '350px',
            filter: {
                type: 'rfaac'
            }
        },
        body:{
            type: 'text',
            prop: 'rfaac'
        }


    },
    {
        header: {
            name: 'Voltage',
            prop: 'voltage',
            width: '350px',
            filter: {
                type: 'input'
            }
        },
        body:{
            type: 'text',
            prop: 'voltage'
        }


    },
    {
        header: {
            name: 'website',
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