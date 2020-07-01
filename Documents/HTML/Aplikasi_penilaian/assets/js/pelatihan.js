/**
 * Created by sankester on 13/05/2017.
 */


function edit_pelatihan(id){

    $('#formPelatihan')[0].reset();
    $('#errors').empty();
    $('#errors').removeClass("alert");

    $.ajax({
        url : base_url + "Pelatihan/" + "getById/" + id,
        type : "GET",
        dataType: "JSON",
        success : function(data){
            $('[name="kdPelatihan"]').val(data.kdPelatihan);
            $('[name="pelatihan"]').val(data.pelatihan);

            $('[name="alamat"]').val(data.alamat);
			$('[name="telp"]').val(data.telp);

            $('#form_pelatihan').modal('show');
            $('.modal-title').text('Update Pelatihan');

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / updatse data');
        }
    });
}

function save_pelatihan() {
    var url;
    url =  base_url + "pelatihan/"+ "updatePelatihan";

    $('#errors').empty();
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formPelatihan').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            //if success close modal and reload ajax table
            if(data.valid == false){
                for (i in data) {
                    $('#errors').addClass("alert alert-danger alert-dismissable");
                    if(i !='valid'){
                        $('.alert').prepend("<p>"+data[i]+"</p>");
                    }
                }
            } else {
                $('#modal_form').modal('hide');
                location.reload();// for reload a page
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');

        }
    });
}

/* function edit_item_pelatihan(id){
    $('.modal-item-pelatihan').css('width', '70%');
    $('.modal-item-pelatihan').css('margin', '100px auto 100px auto');


    $('#formItemPelatihan')[0].reset();
    $('#errors').empty();
    $('#errors').removeClass("alert");

    $.ajax({
        url : base_url + "pelatihan/" + "getSubById/" + id,
        type : "GET",
        dataType: "JSON",
        success : function(data){
            $('[name="kdPelatihan"]').val(data.kode);
            for(var item in data.param){
                var index = parseInt(item) + 1;
                var itempelatihan = 'itemPelatihan' + index;
                var valuePelatihan = 'value' + index;
                var kdSubPelatihan = 'kdSubPelatihan' + index;
                $("input[name=" + kdSubPelatihan + "]").val(data.param[item].kdSubPelatihan);
                $("input[name=" + itempelatihan + "]").val(data.param[item].subPelatihan);
                $("input[name=" + valuePelatihan + "]").val(data.param[item].value);
            }

            $('#form_item_pelatihan').modal('show');
            $('.modal-title').text('Update Item Pelatihan');

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
        }
    });
} */

/* function save_item_pelatihan() {
    var url;
    url =  base_url + "pelatihan/"+ "updateSubPelatihan";

    $('#errors').empty();

     //ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formItemPelatihan').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            //if success close modal and reload ajax table
            if(data.valid == false){
                for (i in data) {
                    $('#errors').addClass("alert alert-danger alert-dismissable");
                    if(i !='valid'){
                        $('.alert').prepend("<p>"+data[i]+"</p>");
                    }
                }
            } else {
                $('#modal_form').modal('hide');
                location.reload();// for reload a page
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
        }
    });
} */

function hapus_pelatihan(id){
        $.ajax({
            url :  base_url + "pelatihan/" + "delete/"+id,
            type : "POST",
            dataType : "JSON",
            success : function(data){
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
}

/* function lihat_pelatihan(id){
    $('.view-detail-pelatihan').css('width', '50%');
    $('.view-detail-pelatihan').css('margin', '100px auto 100px auto');

    $('#viewKodePelatihan').text("");
    $('#viewPelatihan').text("");
    $('#viewSifat').text("");
    $('#viewBobot').text("");

    for(var i=1; i<=5; i++){
        var itempelatihan = 'viewItemPelatihan' + i;
        var valuePelatihan = 'viewValue' + i;

        $("#" + itempelatihan ).text("");
        $("#" + valuePelatihan ).text("");
    }

    $.ajax({
        url: base_url + "pelatihan/" + "detail/"+id,
        type : "POST",
        dataType : "JSON",
        success:  function(data){

            $('#viewKodePelatihan').text(' : '+ data.pelatihan.kdPelatihan);
            $('#viewPelatihan').text(' : '+data.pelatihan.pelatihan);
            $('#viewSifat').text(' : '+data.pelatihan.sifat);
            $('#viewBobot').text(' : '+data.pelatihan.bobot);

            for(var item in data.subpelatihan){
                var index = parseInt(item) + 1;
                var itempelatihan = 'viewItemPelatihan' + index;
                var valuePelatihan = 'viewValue' + index;

                $("#" + itempelatihan ).text(data.subpelatihan[item].subPelatihan);
                $("#" + valuePelatihan ).text(data.subpelatihan[item].value);


            }
            $('#view_pelatihan').modal('show');
            $('#view_pelatihan .modal-title').text('Detail Pelatihan');
        }
    });
} */

