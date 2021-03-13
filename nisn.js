$(document).on('change','.datanisn',function () {
  var nisn = $(this).val();
  console.log(nisn);
  $.ajax({
    method: 'POST',
    url: "/sppp/pembayaran/get_nisn",
    dataType: 'JSON',
    data: {
      nisn : nisn
    },
    success:function (data) {
      // console.log(data);
      $('.nama').val(data.nama);
      
    }
  })
});
$(document).on('change','.spp',function () {
  var spp = $(this).val();
  console.log(spp);
  $.ajax({
    method: 'POST',
    url: "/sppp/pembayaran/get_spp",
    dataType: 'JSON',
    data: {
      id_spp : spp
    },
    success:function (data) {
      // console.log(data);
      $('.nominal').val(data.nominal);
      
    }
  })
})