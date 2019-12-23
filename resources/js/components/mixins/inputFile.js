export const Mixin = {
  data: function(){
    return {
      file: ''
    }
  },
	methods:{
		changeFile: function(val) {
        this.file = val;
		},
	},
}