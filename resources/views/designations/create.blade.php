<form action="{{ route('designations.store') }}" method="POST">
    @csrf
    <div>
        <label for="designation">Designation</label>
        <input type="text" name="designation" required>
    </div>
    <div>
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" required>
    </div>
    <button type="submit">Save</button>
</form>
