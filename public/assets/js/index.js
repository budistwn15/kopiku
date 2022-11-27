let semuaTombol = document.querySelectorAll('.btn-hapus');
semuaTombol.forEach(function (item) {
    item.addEventListener('click', konfirmasi);
})

function konfirmasi(event) {
    // Buat pesan error untuk setiap tipe tabel
    let tombol = event.currentTarget;
    let judulAlert;
    let teksAlert;
    switch (tombol.getAttribute('data-table')) {
        case 'user':
            judulAlert = 'Hapus User ' + tombol.getAttribute('data-name') + '?';
            teksAlert = 'Semua data <b>user</b> akan terhapus';
            break;
        case 'role':
            judulAlert = 'Hapus Role ' + tombol.getAttribute('data-name') + '?';
            teksAlert = 'Semua data <b>role</b> akan terhapus';
            break;
        case 'permission':
            judulAlert = 'Hapus Permission ' + tombol.getAttribute('data-name') + '?';
            teksAlert = 'Semua data <b>permission</b> akan terhapus';
            break;
        default:
            judulAlert = 'Apakah anda yakin?';
            teksAlert = 'Hapus data <b>' + tombol.getAttribute('data-name') + '</b>';
            break;
    }

    event.preventDefault();
    Swal.fire({
                title: judulAlert,
                html: teksAlert,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#6c757d',
                confirmButtonColor: '#dc3545',
                cancelButtonText: 'Tidak jadi',
                confirmButtonText: 'Ya, hapus!',
                reverseButtons: true,
})
.then((result) => {
    if (result.value) {
        tombol.parentElement.submit();
    }
})
}
