@push('link')
  <style>
    .ck-editor__editable {
      min-height: 100px;
    }
  </style>
@endpush
@push('script')
  <script src="{{ asset('ckeditor') }}/ckeditor.js"></script>
  <script>
    ClassicEditor
      .create(document.querySelector('#editor'), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
      })
      .then(editor => {
        window.editor = editor;
      })
      .catch(err => {
        console.error(err.stack);
      });
  </script>

  <script>
    ClassicEditor
      .create(document.querySelector('#editor1'), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
      })
      .then(editor => {
        window.editor = editor;
      })
      .catch(err => {
        console.error(err.stack);
      });
  </script>

  <script>
    ClassicEditor
      .create(document.querySelector('#editor2'), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
      })
      .then(editor => {
        window.editor = editor;
      })
      .catch(err => {
        console.error(err.stack);
      });
  </script>
@endpush
