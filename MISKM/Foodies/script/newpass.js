new Vue({
    el:'#app',
    computed:{
        isInValidPass(){
            const pass = this.pass;
            const isErr = pass.length < 8 || isNaN(Number(pass));
            return isErr;
        },
        isInValidPassW(){
            return this.pass2 != this.pass;
        }
    }
});