
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Detail Menu - {{ $menu->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <h2>{{ $menu->name }}</h2>

    <div class="row">
        <div class="col-md-3">
            <img src="{{ asset('storage/menu/' . $menu->photo) }}" alt="{{ $menu->name }}" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <h4>Deskripsi</h4>
            <p>{{ $menu->description }}</p>

            <h4>Kategori</h4>
            <p>{{ $menu->category->name }}</p>

            <h4>Harga</h4>
            <p>Rp {{ number_format($menu->price, 0, ',', '.') }}</p>

            <!-- Form beli -->
            <form action="{{ route('bayar') }}" method="post" id="formBeli">
                @csrf
                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                <div class="mb-3">
                    <label for="quantity" class="form-label">Jumlah</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control" required>
                </div>
                <a href="{{ route('menu') }}" class="btn btn-danger"><-Back</a>
                <button type="button" class="btn btn-primary" id="btnBeli">Beli</button>
            </form>
        </div>
    </div>
</div>

{{-- komfirmasi pembayaran --}}
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $menu->name }} - Konfirmasi Pembayaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <p>Apakah kamu yakin ingin membeli <strong><span id="modalQty"></span></strong> porsi dengan total harga <strong>Rp <span id="modalTotal"></span></strong>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="confirmBuy">Ya, Beli</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
{{-- <script>
    const btnBeli = document.getElementById('btnBeli');
    const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
    const modalQty = document.getElementById('modalQty');
    const modalTotal = document.getElementById('modalTotal');
    const quantityInput = document.getElementById('quantity');
    const confirmBuyBtn = document.getElementById('confirmBuy');
    const formBeli = document.getElementById('formBeli');

    btnBeli.addEventListener('click', () => {
        const qty = parseInt(quantityInput.value) || 1;
        const price = {{ $menu->price }};
        const total = qty * price;

        modalQty.textContent = qty;
        modalTotal.textContent = total.toLocaleString('id-ID');

        modal.show();
    });

    confirmBuyBtn.addEventListener('click', () => {
        formBeli.submit();
    });
</script> --}}
<script>
  const isLoggedIn = @json(Auth::check());
  const btnBeli = document.getElementById('btnBeli');
  const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
  const modalQty = document.getElementById('modalQty');
  const modalTotal = document.getElementById('modalTotal');
  const quantityInput = document.getElementById('quantity');
  const confirmBuyBtn = document.getElementById('confirmBuy');
  const formBeli = document.getElementById('formBeli');

  btnBeli.addEventListener('click', () => {
      if (!isLoggedIn) {
          // Redirect ke halaman login pembeli jika belum login
          window.location.href = "{{ route('pembeli.login') }}"; // pastikan route 'login' mengarah ke login pembeli
          return;
      }

      const qty = parseInt(quantityInput.value) || 1;
      const price = {{ $menu->price }};
      const total = qty * price;

      modalQty.textContent = qty;
      modalTotal.textContent = total.toLocaleString('id-ID');

      modal.show();
  });

  confirmBuyBtn.addEventListener('click', () => {
      formBeli.submit();
  });
</script>

</body>
</html>

