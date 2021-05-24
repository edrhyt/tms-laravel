$('#regency').on('change keyup', async function () {
    await getKecamatanList();
});

$('#subdistrict').on('change keyup', async () => {
    await getDesaList();
});

function getKecamatanList() {
    regency_id = $('#regency').val();
    $.ajax(`/penjualan/surat-order/tambah/kecamatan/${regency_id}`,
        {
            dataType: 'json', // type of response data
            timeout: 10000,     // timeout milliseconds
            success: function (data, status, xhr) {   // success callback function
                options = '';

                data.forEach(kec => {
                    options += `
                <option value="${kec.id}">
                ${kec.name}
                </option>`;
                });

                if ($('#regency').find('option:first').val() == 'NULL') {
                    $('#regency').find('option:first').remove();
                }

                $('#subdistrict').html('');
                $('#subdistrict').append(options);
                $('#subdistrict').trigger('change');
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback 
                alert('Error: ' + errorMessage);
            }
        });
}

function getDesaList() {
    subdistrict_id = $('#subdistrict').val();
    $.ajax(`/penjualan/surat-order/tambah/desa/${subdistrict_id}`,
        {
            dataType: 'json', // type of response data
            timeout: 10000,     // timeout milliseconds
            success: function (data, status, xhr) {   // success callback function
                options = '';

                data.forEach(des => {
                    options += `
                <option value="${des.id}">
                ${des.name}
                </option>`;
                });

                $('#village').html('');
                $('#village').append(options);
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback 
                alert('Error: ' + errorMessage);
            }
        });
}