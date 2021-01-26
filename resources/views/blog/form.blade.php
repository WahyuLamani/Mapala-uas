<div class="form-group row">
    <label for="thumbnail" class="col-md-4 col-form-label text-md-right">images</label>
    <div class="col-md-6">
        <div class="custom-file">
            <input type="file" name="thumbnail" class="custom-file-input @error('thumbnail') is-invalid @enderror"
                id="validatedCustomFile" required>
            <label class="custom-file-label" for="validatedCustomFile">Choose
                Images...</label>

            @error('thumbnail')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
    <div class="col-md-6">
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
            value="{{ old('title') ?? $blog->title }}" required autocomplete="off">

        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
    <div class="col-md-3">
        <select id="category" name="category" class="custom-select @error('category') is-invalid @enderror">
            <option selected disabled>ChooseOne</option>
            @foreach ($categories as $category)
            <option {{$category->id == $blog->category_id ? 'selected' : ''}} value="{{$category->id}}">
                {{ $category->name }}</option>
            @endforeach
        </select>

        @error('category')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-3">
        <input type="text" name="new_category" id="new_category" class="form-control" placeholder="New Categories">
    </div>
</div>

<div class="form-group row">
    <label for="body" class="col-md-4 col-form-label text-md-right">Descriptions</label>

    <div class="col-md-6">
        <textarea name="body" id="body" rows="8"
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