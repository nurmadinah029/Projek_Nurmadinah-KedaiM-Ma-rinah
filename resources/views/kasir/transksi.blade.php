<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Datfar Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Datfar Transaksi</h3>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Total</th>                    
                </tr>
            </thead>
            <tbody>
                    <tr>                       
                        <td></td>                        
                        <td></td>                        
                        <td></td>                     
                                            
                    </tr>
                
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data transaksi.</td>
                    </tr>                
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
