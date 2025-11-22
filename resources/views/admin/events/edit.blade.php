<x-admin.layouts.master>
  <x-slot:title>
    Admin Events Edit
  </x-slot:title>
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row justify-content-end">
        <div class="col-sm-6">
          <x-admin.bread-crumbs :items="$breadCrumbs" />
        </div>
      </div>
    </div>
  </div>
  <div class="app-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="row col-md-12">
          <div class="card card-primary card-outline mb-4">
            <div class="card-header">
              <div class="card-title">Events</div>
            </div>
            <x-admin.show-errors />
            <x-base-form action="{{ route('admin.event.update', $event->id) }}" method="PUT" :media="true">
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col">
                    <label for="title" class="form-label">Title & Slug</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title"
                      value="{{ old('title', $event->title) }}" />
                  </div>
                  <div class="mb-3 col">
                    <label for="poster" class="form-label">Poster</label> <span class="text-danger">*</span>
                    <input type="file" class="form-control poster-input" id="poster" name="poster" value="" />
                    <img width="100" src="{{ asset('storage/admin/uploads/' . $event->poster) }}"
                      class="preview-img mt-2" style="height: 60px" />
                  </div>
                </div>
                {{-- other images --}}
                <div class="row">
                  <div class="mb-3 col">
                    <label for="extra_image" class="form-label">Extra Image</label><span
                      class="text-warning px-1">(optional)</span>
                    <input type="file" class="form-control extra-image" id="extra_image" name="images[]" />
                    <img width="100" src="{{ asset('storage/admin/uploads/' . $event->images[0]) }}"
                      class="preview-img mt-2" style="height: 60px" />
                  </div>
                  <div class="mb-3 col">
                    <label for="extra_image" class="form-label">Extra Image</label><span
                      class="text-warning px-1">(optional)</span>
                    <input type="file" class="form-control extra-image" id="extra_image" name="images[]" />
                    <img width="100" src="{{ asset('storage/admin/uploads/' . $event->images[1]) }}"
                      class="preview-img mt-2" style="height: 60px" />
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col">
                    <label for="tinymce-editor" class="form-label">Description</label>
                    <textarea id="tinymce-editor" name="description" placeholder="Enter Text Or Description Here....">{!! old('description') !!}
                      {!! $event->description !!}
                    </textarea>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.events') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </x-base-form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.poster-input')
          .addEventListener('change', function () {
            let preview = this.parentElement.querySelector('.preview-img');
            preview.src = URL.createObjectURL(this.files[0]);
          });
        document.querySelectorAll('.extra-image').forEach(input => {
          input.addEventListener('change', function () {
            let preview = this.parentElement.querySelector('.preview-img');
            preview.src = URL.createObjectURL(this.files[0]);
          });
        });
      });
    </script>
  @endpush
</x-admin.layouts.master>