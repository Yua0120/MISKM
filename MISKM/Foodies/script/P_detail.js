new Vue({
    el: '#app',
    data() {
        return {
            count:1
        };
    },
    methods: {
        decrement: function() {
            this.count--;
            if(this.count < 0) {
                this.count = 0;
            }
        },
        increment(){
            this.count++;
            if(this.count < 0) {
                this.count =0;
            }
        }
    }
});