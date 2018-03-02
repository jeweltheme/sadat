export default{
    methods: {
        moment: function(date){
            //May 12, 2017
            return moment.utc(date).format('MMM DD, YYYY');
        }
    }
}