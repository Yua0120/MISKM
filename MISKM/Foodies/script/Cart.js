new Vue({
    el:'#app',
    data(){
        return{
            num:1,
        };
    },
    methods:{
        decrement(){
            this.num--;
        },
        increment(){
            this.num++;
        }
    }
});