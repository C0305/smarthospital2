export default {
    name: [
        { required: true, message: 'Toda marca tienen un nombre', trigger: 'blur' },
        { min: 2, message: 'La longitud debe de ', trigger: 'blur' }
    ],
    website: [
        { type: 'url', message: 'Por favor ingrese una URL correcta', trigger: 'change' }
    ],
    note: [
        { min: 5, message: 'Las notas no pueden tener solo 5 caracteres', trigger: 'blur' }
    ]
}