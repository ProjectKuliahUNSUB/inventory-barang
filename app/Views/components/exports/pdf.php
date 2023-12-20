<script src="<?= base_url('plugins/pdfmake/pdfmake.min.js'); ?>"></script>
<script src="<?= base_url('plugins/pdfmake/vfs_fonts.js'); ?>"></script>
<script>
    var tableData = [];
    var jsonData = JSON.parse(JSON.stringify(<?= $data_table_json ?>))
    var headers = [
        'nama_barang',
        'merk_barang',
        'harga',
        ['jumlah_barang_masuk', 'nama_satuan'],
        ['jumlah_barang_keluar', 'nama_satuan'],
        ['jumlah_barang', 'nama_satuan'],
        'total_harga',
        'tanggal_update',
        'keterangan'
    ];
    var headersTitle = [
        'Barang',
        'Merk',
        'Harga',
        'Barang Masuk',
        'Barang Keluar',
        'Total Barang',
        'Total Harga',
        'Tanggal Update',
        'Keterangan'
    ];
    var tableBody = [];

    tableBody.push(headersTitle.map(header => ({text: Array.isArray(header) ? header.join(' ') : header, style: 'tableHeader'})));

    // Function to format number with commas for thousands
    function formatNumberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    jsonData.forEach(item => {
        var row = headers.map(header => {
            if (Array.isArray(header)) {
                return `${formatNumberWithCommas(item[header[0]])} (${item[header[1]]})`;
            } else {
                // Check if the header contains "harga"
                if (header.toLowerCase().includes("harga")) {
                    // Add "Rp" in front of the value and format with commas
                    return `Rp ${formatNumberWithCommas(item[header])}`;
                } else {
                    // Format the value with commas for thousands
                    return formatNumberWithCommas(item[header]);
                }
            }
        });
        tableBody.push(row);
    });


    var docDefinition = {
        pageOrientation: 'landscape',
        content: [
            {
                text: 'Laporan Inventory Barang', style: {
                    alignment: 'center',
                    fontSize: 18,
                    bold: true
                },
            },
            {
                text: 'Tanggal <?= $date_start; ?> Sampai Tanggal <?= $date_end; ?>', style: {
                    alignment: 'center',
                    fontSize: 12,
                },
            },
            '\n\n',
            {
                table: {
                    widths: ['*', '*', 'auto', 'auto', 'auto', 'auto', '*', 'auto', 'auto',],
                    body: tableBody
                },
                layout: {
                    fillColor: function (rowIndex, node, columnIndex) {
                        return (rowIndex % 2 === 0) ? '#CCCCCC' : null;
                    },
                },
            },
        ],
        styles: {
            header: {
                fontSize: 18,
                bold: true,
                margin: [0, 0, 0, 10]
            },
            subheader: {
                fontSize: 16,
                bold: true,
                margin: [0, 10, 0, 5]
            },
            tableExample: {
                margin: [0, 5, 0, 15],
                fontSize: 10,
            },
            tableOpacityExample: {
                margin: [0, 5, 0, 15],
                fillColor: 'blue',
                fillOpacity: 0.3
            },
            tableHeader: {
                bold: true,
                fontSize: 10,
                color: 'black'
            }
        },
    };
    pdfMake.createPdf(docDefinition).download(`[<?= $date_start; ?> ~ <?= $date_end; ?>]Laporan Barang.pdf`, function () {
        window.close();
    });
</script>