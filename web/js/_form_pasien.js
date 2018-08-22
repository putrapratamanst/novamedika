function myFunction() {
        $.ajax({
        url: "/pasien/max-id",
        data: {},
        success: function (result) {
            if (result){
                var nama =  $("#pasien-nama").val();
                $("#pasien-no_rm").val(nama.charAt(0)+":"+0+0+0+0+0+0+result);
            } else {
                $("#pasien-nama").val("");
            }
        }
    });
    	
}

$('#pasien-nama').keyup(function(){
    this.value = this.value.toUpperCase();
});
