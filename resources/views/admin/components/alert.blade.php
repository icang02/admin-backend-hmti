<div class="toast mr-3 mt-3" style="position: fixed; top: 0; right: 0; z-index: 999;" data-delay="4000">
  <div class="toast-header">
    <strong class="mr-auto">Notifikasi</strong>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body text-{{ session('data')['type'] }}">
    <span class="font-weight-bold">{{ session('data')['title'] }}</span>. {{ session('data')['success'] }}
  </div>
</div>

<script>
  setTimeout(() => {
    $('.toast').toast('show');
  }, 200);
</script>
