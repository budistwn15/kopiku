    $(document).ready(function () {
        //ajax select kota tujuan
        $('select[name="province_destination"]').on('change', function () {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: '/cities/' + provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('select[name="city_destination"]').empty();
                        $('select[name="city_destination"]').append('<option selected disabled>Pilih Kota/Kabupaten</option>');
                        $.each(response, function (key, value) {
                            $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_destination"]').append('<option selected disabled>Pilih Kota/Kabupaten</option>');
            }
        });

        //ajax check ongkir
        let isProcessing = false;
        $('.btn-cek').click(function (e) {
            e.preventDefault();
            let order_code = $(this).data('id');
            let token = $("meta[name='csrf-token']").attr("content");
            let city_origin = $('select[name=city_origin]').val();
            let city_destination = $('select[name=city_destination]').val();
            let courier = $('select[name=courier]').val();
            let weight = $('#weight').val();
            let ongkir = 0;
            if (isProcessing) {
                return;
            }
            let total_pembayaran = 0;
            let total_harga = $('#total_harga').val();
            isProcessing = true;
            jQuery.ajax({
                url: "/checkout/ongkir",
                data: {
                    _token: token,
                    city_origin: 171,
                    city_destination: city_destination,
                    courier: courier,
                    weight: weight,
                },
                dataType: "JSON",
                type: "POST",
                success: function (response) {
                    isProcessing = false;
                    if (response) {
                        $('#btnPayment').removeAttr('disabled');
                        $.each(response[0]['costs'], function (key, value) {
                            document.getElementById("eksped").innerHTML = formatRupiah(value.cost[0].value, "Rp. ");
                            $('#ongkos_kirim').val(value.cost[0].value);
                            ongkir = value.cost[0].value;
                        });
                        total_pembayaran = parseInt(total_harga) + parseInt(ongkir) + 10000;
                        // $('#total_pembayaran').val(total_pembayaran);
                        document.getElementById('pembayaran_total').innerHTML = formatRupiah(total_pembayaran, "Rp. ");
                        $('#total_pembayaran').val(total_pembayaran);
                    }
                }
            });
        });

        $('#nextPayment').prop('disabled', true);



    });

function formatRupiah(angka, prefix) {
    let number_string = angka.toString().replace(/[^,\d]/g, ''),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

