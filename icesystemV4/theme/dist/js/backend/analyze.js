<script>
var url = $("#base_url").val();
    $(document).ready(function(){
    if(url == 'http://aodcat.esy.es/analyze' ){ //เปลืยนด้วยเมือขึนhostจริง
     get_analyze();
    }
});
    function get_analyze(){
    var product_id = $("#product_id").val();
    console.log(product_id);
    $.ajax({
        url: url + '/load_analyze',
        type: 'POST',
        dataType: "JSON",
        data: {
            product: product_id
        },
        success: function (data) {
            $("#get_d").html(data.get_d);
            $("#get_w").html(data.get_w);
            $("#get_m").html(data.get_m);
            $("#get_type").html(data.get_type);
            $("#get_type1").html(data.get_type);
            $("#get_type2").html(data.get_type);
            $("#water").html(data.water)
            
            $('#print_analyze').attr('href',url+'/print_analyze/?get_analyze='+data.get_d+'-'+data.get_w+'-'+data.get_m+'-'+data.get_name+'-'+data.get_type);
        }
    });
}
</script>;