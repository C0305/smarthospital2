export default {
    brand_id: [
        { required: true, message: 'Es requerido seleccionar una marca', trigger: 'change' }
    ],
    name: [
        { required: true, message: 'Toda marca tienen un nombre', trigger: 'blur' },
        { min: 2, message: 'La longitud debe de ', trigger: 'blur' }
    ],
    category_id: [
        { required: true, message: 'Este dato es requerido', trigger: 'change' }
    ],
    subcategory_id: [
        { required: true, message: 'Este dato es requerido', trigger: 'change' }
    ],
    rfaac: [
        { required: true, message: 'Este dato es requerido', trigger: 'change' }
    ],
    website: [
        { type: 'url', message: 'Por favor ingrese una URL correcta', trigger: 'change' }
    ],
    voltage: [
        { required: true, message: 'Este dato es requerido', trigger: 'blur' },
    ],
}