<div class="form-group row">
    <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
    <div class="col-md-6">
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
            value="{{ old('title') ?? $blog->title }}" required autocomplete="off" autofocus>

        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="body" class="col-md-4 col-form-label text-md-right">Descriptions</label>

    <div class="col-md-6">
        <textarea name="body" id="body"
            class="form-control  @error('body') is-invalid @enderror">{{ old('body') ?? $blog->body }}</textarea>
        @error('body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-danger">
            {{$submit ?? 'Update'}}
        </button>
    </div>
</div>