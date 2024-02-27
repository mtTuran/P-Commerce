/*
$(document).ready(function(){
  alert('hello');

    $('.delete_product_btn').click(function(e){
      console.log('Button clicked');
        e.preventDefault();
        var id = $(this).val();

        swal({
            title: "Emin misiniz?",
            text: "Sildikten sonra bu dosyayı geri getiremezsiniz!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                  'products_id': id,
                  'delete_product_btn': true
                },
                success: function (response){
                  if (response == 200){
                    swal("Başarılı!", "Silme işlemi başarılı oldu!", "success");
                  }
                  else if(response == 500){
                    swal("Başarısız!", "Silme işlemi başarısız oldu!", "error");
                  }
                }
              });
            } else {
              swal("Silme işlemi iptal edildi!");
            }
          });
    });
    
});
*/