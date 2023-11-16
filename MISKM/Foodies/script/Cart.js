var price = document.getElementById("price").value;
new Vue({
    el:'#app',
    data(){
        return{
            count:1
        };
    },
    methods:{
        decrement(){
            this.count--;
        },
        increment(){
            this.count++;
        }
    },
    watch:{
        count(newValue,pldValue){
            this.total = this.count * this.price;
        }
    }
});
