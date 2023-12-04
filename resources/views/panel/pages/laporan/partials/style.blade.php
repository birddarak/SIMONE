<link rel="stylesheet" type="text/css"
    href="{{ url('templates/panel') }}/node_modules/bootstrap/dist/css/bootstrap.min.css">
<style>
    @media print {

        /* Atur orientasi landscape */
        @page {
            size: legal landscape;
        }

        /* Hilangkan margin dan padding */
        body {
            margin: 0;
            padding: 0;
        }

        /* Atur elemen atau konten lain sesuai kebutuhan */
        /* Misalnya: */
        .full-page-content {
            width: 100%;
            height: 100%;
        }

        .header {
            background-color: #92D050 !important;
        }
    }


    /* tampilan ketika tidak di print */
    table {
        border-collapse: collapse;
        border: 1px solid black;
        white-space: nowrap;
        overflow-x: auto;
    }

    .text-middle {
        vertical-align: middle
    }

    .text-center {
        text-align: center
    }

    .text-left {
        text-align: left
    }

    .text-right {
        text-align: right
    }

    .program {
        background-color: #F8CBAD
    }

    .kegiatan {
        background-color: #D0CECE
    }

    .subkegiatan {
        background-color: #FFD966
    }

    td,
    th {
        border-width: 3px !important;
        border-color: black !important
    }

    th,
    td,
    p {
        font-size: 12px;
    }

    .header {
        background-color: #92D050;
    }

    .ttd {
        float: right;
        margin-right: 50px
    }
</style>