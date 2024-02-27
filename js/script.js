$(document).ready(function() {
    $('#tombol-cari').hide()

    $('#keyword').on('keyup', function() {
        $('.loader').show()
        $('#container').load('ajax/siswa.php?keyword=' + $('#keyword').val())
    })
})