<script>
    $(document).ready(function(){
        swal({
            title: "Suksess",
            text :"Berhasil menambahkan pesanan",
            type: "success",
            showCancelButton:true,
            confirmButtonColor:"#63BC81",
            confirmButtonText:"Konfirmasi Pesanan",
            cancelButtonText:"Lanjutkan Memilih",
            html :true
        }, function (isConfirm){
            if (isConfirm) {
                window.location ='/cart';
            }
        });
    });
</script>
