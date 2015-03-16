$(document).ready(function() {
    $('textarea').autosize();
    $("#product_type").change(function() {
        switch ($("#product_type").val()) {
            case '0':
                var t_text = new Array('อิฐก่อโชว์', 'อิฐมอญก่อโชว์', 'อิฐทางเท้า, กระเบื้องปูผนัง', 'ช่องลม');
                var t_value = new Array('AF', 'AC', 'AP', 'AH');
                break;
            case '1':
                var t_text = new Array('กระเบื้องดินเผา', 'กระเบื้องเคลือบ');
                var t_value = new Array('PT', 'PG');
                break;
            case '2':
                var t_text = new Array('สไตล์ไทยประเพณี', 
                    'สไตล์ไทยร่วมสมัย',
                    'สไตล์โคโรเนียล',
                    'สไตล์ตะวันออก',
                    'กระเบื้องหลังคาดินเผาไฟสูง',
                    'กระเบื้องหลังคาดินเผา สีเทาธรรมชาติ (Cloudy Roof Tiles Series)',
                    'กระเบื้องหลังคาดินเผา Silver&Golden Roof Tiles Series',
                    'กระเบื้องหลังคาดินเผาย้อนยุค Tailor Made',
                    'ตัวประกอบกระเบื้องหลังคาดินเผา Roof tile Accessories',
                    'ตัวประกอบกระเบื้องหลังคาซีเมนต์ Cement Roof tile Accessorie'
                    );
                var t_value = new Array('KV', 'KM', 'KK', 'KE', 'KH', 'KN', 'KS', 'KT', 'KA', 'KC');
                break;
            case '3':
                var t_text = new Array('Artisan Star Décor', 'กระเบื้องโบราณ');
                var t_value = new Array('D', 'CM');
                break;
        }
        $("#product_category").html("");
        $.each(t_text, function(i, item) {
            $('#product_category').append($('<option>', {
                value: t_value[i],
                text: item
            }));
        });
        var p_type_tha = $("#product_category option:selected").text();
        var p_type_eng = $("#product_category option:selected").val();
        $("#titlename_tha").val(p_type_tha);
        $("#titlename_eng").val(p_type_tha);
    });
    $("#product_category").change(function() {
        var p_type_tha = $("#product_category option:selected").text();
        var p_type_eng = $("#product_category option:selected").val();
        $("#titlename_tha").val(p_type_tha);
        $("#titlename_eng").val(p_type_tha);
    });
});