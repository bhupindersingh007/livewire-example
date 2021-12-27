<div class="col-lg-6 mx-auto mt-4">
    @if ($message)
        <div class="alert alert-success mb-4">{{ $message }}</div>
    @endif
    <form  wire:submit.prevent="submit">
        <label for="name" class="form-label">Name</label>
        <input type="text" wire:model="name" class="form-control mb-3" required>
        <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>