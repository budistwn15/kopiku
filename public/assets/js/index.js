/**
 * Account Settings - Account
 */

'use strict';

document.addEventListener('DOMContentLoaded', function (e) {
    (function () {
        const deactivateAcc = document.querySelector('#formAccountDeactivation');

        // Update/reset user image of account page
        let accountUserImage = document.getElementById('uploadedAvatar');
        const fileInput = document.querySelector('.account-file-input'),
            resetFileInput = document.querySelector('.account-image-reset');

        if (accountUserImage) {
            const resetImage = accountUserImage.src;
            fileInput.onchange = () => {
                if (fileInput.files[0]) {
                    accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
                }
            };
            resetFileInput.onclick = () => {
                fileInput.value = '';
                accountUserImage.src = resetImage;
            };
        }
    })();
});

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
        case 'category':
            judulAlert = 'Hapus Kategori ' + tombol.getAttribute('data-name') + '?';
            teksAlert = 'Semua data <b>kategori</b> akan terhapus';
            break;
        case 'article':
            judulAlert = 'Hapus Artikel ' + tombol.getAttribute('data-name') + '?';
            teksAlert = 'Semua data <b>artikel</b> akan terhapus';
            break;
        case 'type':
            judulAlert = 'Hapus Tipe ' + tombol.getAttribute('data-name') + '?';
            teksAlert = 'Semua data <b>tipe</b> akan terhapus';
            break;
        case 'coffee':
            judulAlert = 'Hapus Coffee ' + tombol.getAttribute('data-name') + '?';
            teksAlert = 'Semua data <b>coffee</b> akan terhapus';
            break;
        case 'cart':
            judulAlert = 'Hapus Coffee ' + tombol.getAttribute('data-name') + '?';
            teksAlert = 'Data <b>coffee</b> akan terhapus dari keranjang';
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
