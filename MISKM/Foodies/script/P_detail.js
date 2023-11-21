new Vue({
    el: '#app',
    data() {
        return {
            count:0
        };
    },
    methods: {
        decrement(){
            this.count--;
        },
        increment(){
            this.count++;
        }
    }
});