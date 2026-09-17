@if($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
@endif
<form method="POST" enctype="multipart/form-data" action="{{ $editing ? route('admin.portfolio.images.update', $image) : route('admin.portfolio.images.store') }}">
    @csrf
    @if($editing) @method('PUT') @endif
    <div class="mb-3">
        <label class="form-label" for="event_id">Event</label>
        <select class="form-select" name="event_id" id="event_id" required>
            @foreach($events as $event)
                <option value="{{ $event->id }}" @selected(old('event_id', $image->event_id ?? null) == $event->id)>{{ $event->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label" for="image">{{ $editing ? 'Replace image (optional)' : 'Images' }}</label>
        <input class="form-control" type="file" id="image" name="{{ $editing ? 'image' : 'images[]' }}" accept="image/jpeg,image/png,image/gif" @if(!$editing) multiple required @endif>
        <div class="form-text">JPEG, PNG, or GIF. Maximum 2 MB per image.</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="title">Title</label>
        <input class="form-control" id="title" name="{{ $editing ? 'title' : 'default_title' }}" maxlength="255" value="{{ old($editing ? 'title' : 'default_title', $image->title ?? '') }}">
    </div>
    @if($editing)
        <div class="mb-3"><label class="form-label" for="description">Description</label><textarea class="form-control" id="description" name="description">{{ old('description', $image->description) }}</textarea></div>
        <div class="mb-3"><label class="form-label" for="sort_order">Sort order</label><input class="form-control" id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $image->sort_order) }}"></div>
        <div class="form-check mb-3"><input class="form-check-input" id="is_featured" name="is_featured" type="checkbox" value="1" @checked(old('is_featured', $image->is_featured))><label class="form-check-label" for="is_featured">Featured image</label></div>
    @endif
    <button class="btn btn-primary" type="submit">{{ $editing ? 'Save image' : 'Upload images' }}</button>
    <a class="btn btn-outline-secondary" href="{{ route('admin.portfolio.images.index') }}">Back to images</a>
</form>
