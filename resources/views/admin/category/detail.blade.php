<div class="form-group">
    <label>Name:</label>
    <p class="form-control">{{ $category->name }}</p>
</div>
<div class="form-group">
    <label>Description:</label>
    <span class="form-control mb-4" style="height: 200px;">{!! $category->description !!}</span>
</div>
<div class="form-group">
    <label for="name">Facility:</label>
    <p class="form-control">{{ $category->facility }}</p>
</div>
