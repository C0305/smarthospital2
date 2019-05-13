export class BacabAjax {
    
    constructor(route, data, $this){
        this.route = route;
        this.data = data;
        this.$this = $this
    }
    
    store(action){
        return new Promise( (resolve,reject) => {
            axios.post(this.route, this.data).then(r => {
                this.$this.$message({
                    message: 'Formulario Guardado Con Exito',
                    type: 'success'
                });
                this.$this.$store.dispatch(action);
                resolve(r);
            }).catch(err => {
                console.error(err);
                this.$this.$message.error('Oops, parece que sucedio un error. Intente mas tarde');
                reject(err);
            });
        });
    }
    
    update(action){
        return new Promise( (resolve,reject) => {
            axios.put(this.route, this.data).then(r => {
                this.$this.$message({
                    message: 'Formulario Actualizado Con Exito',
                    type: 'success'
                });
                this.$this.$store.dispatch(action);
                resolve(r);
            }).catch(err => {
                console.error(err)
                this.$this.$message.error('Oops, parece que sucedio un error. Intente mas tarde');
                reject(err);
            });
        });
    }
    
    delete(action){
        this.$this.$confirm('¿Esta seguro que desar borrar este elemento?', 'Warning', {
            confirmButtonText: 'Si',
            cancelButtonText: 'Cancelar',
            type: 'warning'
        }).then(() => {
            return new Promise( (resolve,reject) => {
                axios.delete(this.route,{_method: 'delete'}).then(r => {
                    this.$this.$message({
                        message: 'Elemento Eliminado',
                        type: 'success'
                    });
                    this.$this.$store.dispatch(action);
                    resolve(r);
                }).catch(err => {
                    console.error(err)
                    this.$this.$message.error('Oops, parece que sucedio un error. Intente mas tarde');
                    reject(err);
                });
            });
        }).catch(() => {
            this.$this.$message({
                type: 'info',
                message: 'Acción cancelada'
            });
        });
    }
}